<?php
include_once 'dbAcess.php';
class corporate extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
    /*Create a Slot for Corporate User*/
    function alotSlot($arrArg = array()) {
        if ($arrArg ['id'] != "") {
            $data = array (
                    'corp_id' => strip_tags ( $arrArg ['id'] ),
                    'designation' => strip_tags ( mysql_real_escape_string ( $arrArg ['designation'] ) ) 
            );
            $result = $this->db->insert ( "jobs", $data );
            if ($result && $result->rowCount () > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    /*Show All the Slots created by the User*/
    function showSlot($arrArg = array()) {
        $cond = "";
        
        if (isset ( $arrArg ['jobId'] )) {
            $cond = " AND id='" . $arrArg ['jobId'] . "'";
        }
       
        $sql = "SELECT id,designation,type,status,
                DATE_FORMAT(created_date, '%M %D, %Y') as createddate,
                DATE_FORMAT(start_date,'%M %D, %Y') as startdate,
                DATE_FORMAT(last_date, '%M %D, %Y') as lastdate,
                start_date,last_date, location,role,area_of_work,description,
                skills_required,responsiblity,experience,contact_person,
                phone_number,keywords,qualification,number_of_vacancy,
                process_details,salary_expected,other_info,criteria,salary_range";
        /* Will check whether it is request by user or corporate */
        if (@$arrArg ['requestType'] == "user") {
            $sql .= " FROM probuzz.jobs 
                    where id='" . $arrArg ['jobId'] . "' ";
        } else {
            $sql .= " FROM probuzz.jobs where 
                    corp_id=" . "'" . $arrArg ['id'] . "'" . $cond;
        }
        $result = $this->executeSQLP ( $sql );
        return $result;
    }
    /*Update The Details anout the Slot(Project)*/
    function updateSlot($arrData = array()) {
        $data = array ();
        foreach ( $arrData as $key => $value ) {
            if ($key == "jobId") {
                $jobId = ($value);
            } else {
                 $data ["$key"] = strip_tags ( ($value) );
            }
        }
        
        $where = array (
                'id' => "$jobId" 
        );
        $result = $this->db->update ( 'jobs', $data, $where );
               
        if ($result && $result->rowCount () > 0) {
            return true;
        } else {
            return false;
        }
    }
    /*Will Update the status of the job*/
    function updateStatusJob($arrArg) {
        $status = @$arrArg ['status'] == 0 ? 1 : 0;
        $jobId = strip_tags($arrArg ['jobId']);
        $data = array (
                "status" => "$status" 
        );
        $where = array (
                'id' => "$jobId" 
        );
        $result = $this->db->update ( 'jobs', $data, $where );
        if ($result && $result->rowCount () > 0) {
            return true;
        } else {
            return false;
        }
     }
    
    /* Show the Applciant for the jobs */
    function getApplicant($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
           
            $jobId = @$arrArgs ['jobId'];
            $ob = new DbConnection ();
            $sql = "SELECT p.first_name, p.last_name, p.user_id AS id,photo.path
			FROM personal_profile p
				JOIN job_applicant ja 
				ON ja.user_id = p.user_id
				JOIN photo 
				on photo.id=p.profile_pic_id
			WHERE ja.job_id='$jobId' ";
            $data ['tables'] = "personal_profile p";
            $data ['columns'] = array (
                    'p.first_name',
                    'p.last_name',
                    'p.user_id AS id',
                    'pp.path' 
            );
            $data ['joins'] [] = array (
                    'table' => 'job_applicant ja ',
                    'type' => 'INNER',
                    'conditions' => array (
                            'p.user_id' => 'ja.user_id' 
                    ) 
            );
            $data ['joins'] [] = array (
                    'table' => 'photo pp',
                    'type' => 'INNER',
                    'conditions' => array (
                            'p.profile_pic_id' => 'pp.id' 
                    ) 
            );
            $data ['conditions'] = array (
                    'ja.job_id' => "$jobId" 
            );
            
            $result = $this->db->select ( $data );
            if ($result) {
                while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $row;
            } else {
                echo "Error!!";
            }
        }
    }
    
    /* Get the Stats of the company and particular job */
    function getAppStats($arrArg = array()) {
        if (isset ( $arrArg ['jobId'] )) {
            $result = $this->db->count ( "job_applicant", array (
                    "job_id" => $arrArg ['jobId'] 
            ) );
            $row1 = $result->fetch ( PDO::FETCH_ASSOC );
            $arrData = array (
                    "total_candidate" => $row1 ['COUNT(*)'] 
            );
            return ($arrData);
        } else {
            $result = $this->db->count ( "jobs", array (
                    "corp_id" => @$_SESSION ['id'] 
            ) );
            $row1 = $result->fetch ( PDO::FETCH_ASSOC );
            $result = $this->db->count ( "jobs", array (
                    "corp_id" => @$_SESSION ['id'],
                    "status" => '1' 
            ) );
            $row2 = $result->fetch ( PDO::FETCH_ASSOC );
            $result = $this->db->count ( "subscription", array (
                    "corp_id" => @$_SESSION ['id'],
                    "subscribe_status" => '0'
            ) );
            $row3 = $result->fetch ( PDO::FETCH_ASSOC );
            $arrData = array (
                    "total_jobs" => $row1 ['COUNT(*)'],
                    "total_active_jobs" => $row2 ['COUNT(*)'],
                    "total_subscriber" => $row3 ['COUNT(*)']
            );
            return ($arrData);
        }
    }
    /*
     * Search for the people with required qualification,City,Gender
     */
    function searchPeople($arrArg = array()) {
        /*
         * USer Must Have a valid entry in
         * personal_profile,qualifation,address,photo,experiance
         */
        $sql = "select 
			p.user_id as id,
			p.first_name,p.last_name,
			photo.path 
		from 
			personal_profile p 
			left join address a on p.user_id=a.user_id
			left join qualification q on q.user_id=p.user_id
			left join photo photo on p.profile_pic_id=photo.id
            left join users u on u.user_id=p.user_id  ";
        $cond = " ";
        // Based on City
        if (! empty ( $arrArg ['city'] )) {
            foreach ( $arrArg ['city'] as $val ) {
                if ($val != "") {
                    $val = strip_tags ( mysql_real_escape_string ( $val ) );
                    $cond .= " a.city='$val' OR ";
                }
            }
            $cond = rtrim ( $cond, "OR " );
            $cond .= ") AND (";
        }
        // Based On gender
        $val = $arrArg ['gender'];
        if ($val != "" && $val != "Both") {
            $val = strip_tags ( mysql_real_escape_string ( $val ) );
            $cond .= " p.gender='$val' ";
            $cond .= ") AND (";
        }
        // Based On Degree
        if (! empty ( $arrArg ['degree'] )) {
            foreach ( $arrArg ['degree'] as $val ) {
                if ($val != "") {
                    $val = strip_tags ( mysql_real_escape_string ( $val ) );
                    $cond .= " q.class='$val' OR ";
                }
            }
            $cond = rtrim ( $cond, "OR " );
            $cond .= ") AND (";
        }
        $cond = rtrim ( $cond, "AND (" );
        
        if ($cond != "") {
            $sql .= " where u.type='0' AND ( " . $cond . " group by id";
           // echo $sql;
            $res = $this->executeSQLP ( $sql );
            if ($res) {
                while ( $result [] = $res->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $result;
            } else {
                echo "Error!!";
                return false;
            }
        }
    }
    /*Fetch The company_name of the corporate user*/
    function fetchName($arrArg = array()) {
        if (! empty ( $arrArg )) {
            $ob = new DbConnection ();
            $sql = "select c.company_name,c.company_alias 
                    from corporate_profile as c 
                    join users as u 
                        on u.user_id=c.user_id 
                    where u.user_id=" . $arrArg ['id'] . ";";
            $res = $ob->executeSQL ( $sql );
            $row = mysql_fetch_array ( $res );
            $result ["company_name"] = @$row ['company_name'];
            $result ["company_alias"] = @$row ['company_alias'];
            return $result;
        } else {
            // echo "No Id Passed..";
            return false;
        }
    }
    /*Get The profile of the corporate user */
    function getProfile($arrArg = array()) {
        if (! empty ( $arrArg )) {
            $id = $arrArg ['id'];
            $data ['tables'] = "corporate_profile";
            $data ['conditions'] = array (
                    "user_id" => $id 
            );
            $res = $this->db->select ( $data );
            if ($res) {
                while ( $result [] = $res->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $result;
            } else {
                echo "Error!!";
                return false;
            }
        }
    }
    /*Count the number of subscriber for the paticular corporate*/
    function countSubscriber($corpId){
        if (! empty ( $corpId )) {
        $result = $this->db->count ( "subscription", array (
                "corp_id" => $corpId,
                "subscribe_status" => '0'
        ) );
        $row3 = $result->fetch ( PDO::FETCH_ASSOC );
        return $row3['COUNT(*)'];
        }
    }
    /*Will list all the jobs beong to particular
     *  corporate on corprate view page*/
    function getJobs($arrArgs=array()) {
        if (! empty ( $arrArgs )) {
            $sql = "SELECT j.id as jobid,j.designation, DATE_FORMAT(j.start_date, ";
            $sql .= "'%M %D, %Y'" . ") as startdate,DATE_FORMAT(j.last_date, '%M %D, %Y') as lastdate ";
            $sql .= ",j.location, j.experience, c.company_name ";
            $sql .= " from jobs j JOIN corporate_profile c 
				on 
					c.user_id=j.corp_id
				where
					j.status='1' 
                 ";
           $data['tables']="jobs j";
           $data['columns']=array(
               "j.id as jobid","j.designation",
               "DATE_FORMAT(j.start_date,'%M %D, %Y') as startdate",
               "DATE_FORMAT(j.last_date, '%M %D, %Y') as lastdate ",
               "j.location","j.experience","c.company_name"
                       );
           $data['conditions']=array("j.corp_id"=>$arrArgs['id']);
           $data ['joins'] [] = array (
                    'table' => 'corporate_profile c',
                    'type' => 'INNER',
                    'conditions' => array (
                            'c.user_id' => 'j.corp_id' 
                    ) 
            );
            $res = $this->db->select ( $data );
            if ($res) {
                while ( $row [] = $res->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $row;
            } else {
                return "Can't Search! TryAgain! ";
            }
        }
        //}
        
    }
        /* For Registration of the Corporate Users */
    function corporateRegistration($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            
            $companyName = $arrArgs ['company_name'];
            $userName = $arrArgs ['user_name'];
            $location = $arrArgs ['location'];
            $corpEmail = $arrArgs ['corp_email'];
            $password = md5 ( $arrArgs ['company_password'] );
            $compConfirmPass = $arrArgs ['comp_confirm_pass'];
            if (empty ( $companyName ) && empty ( $userName ) && empty ( $location ) && empty ( $corpEmail ) && empty ( $password ) && empty ( $compConfirmPass )) {
                echo "<script> alert('please fill all the values'); </script>";
            } else {
                $data = array ();
                $data ['tables'] = 'users';
                $data ['columns'] = array (
                        'user_name' 
                );
                $data ['conditions'] = array (
                        'user_name' => $userName 
                );
                $res = $this->db->select ( $data );
                $row = $res->fetch ( PDO::FETCH_ASSOC );
                if ($row ['user_name'] == $arrArgs ['user_name']) {
                    $_SESSION ['error_msg'] = "user already exist";
                    return false;
                } else {
                    
                    $this->executeSQLP ( "call insertcorpuser('$userName','$password','$companyName','$location','$corpEmail','1')" ) or die ( mysql_error () );
                    
                    $_SESSION ['error_msg'] = "Corporate User Registered !! Please Continue with Login!!";
                    return true;
                } // else
            }
        }
    }
     /*Update the profile of the corporate USer*/
    function UpdateCorpProfile($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            foreach ( $arrArgs as $key => $value ) {
                if ($key == "id") {
                    $userId = ($value);
                } else {
                    $data ["$key"] = strip_tags ( ($value) );
                }
            }
            $where = array (
                    'user_id' => "$userId" 
            );
            $result = $this->db->update ( 'corporate_profile', $data, $where );
            
            if ($result && $result->rowCount () > 0) {
                return true;
            } else {
                return false;
            }
            return true;
            
        }
    }
     
}