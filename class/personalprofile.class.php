<?php
include_once 'class/dbAcess.php';

/*
 * personalprofile class
 * This class is the model class performing all the Functionality related to Personal Profile.
*/
class personalprofile extends DbConnection {
    
    /*
	 * constructor of the personalprofile class calls the parents constructor
	 * and thus enabling the class to perform database connectivity.
	*/
    function __construct() {
        parent::__construct ();
    }
    
    /*
     * loadProfile()
     * This method loads all the details of the Personal Profile.
    */
    function loadProfile($arrArgs = array()) {
    
        $arrData = array ();
        $id = $arrArgs ['id'];
        
        /*
         * $sql=" SELECT first_name,last_name,DOB,contact_no,gender,email, about_myself,relationship_status,intersted_in, favourite_book,favourite_movies,favourite_food FROM personal_profile WHERE user_id='$id' ";
         */
        $data ['tables'] = "personal_profile ";
        $data ['columns'] = array (
                'first_name',
                'last_name',
                'DOB',
                'contact_no',
                'gender',
                'email',
                'about_myself',
                'relationship_status',
                'intersted_in',
                'favourite_book',
                'favourite_movies',
                'favourite_food' 
        );
        $data ['conditions'] = array (
                'user_id' => "$id" 
        );
        $res = $this->db->select ( $data );
        // $res=$ob->executeSQL($sql);
        $row = $res->fetch ( PDO::FETCH_ASSOC );
        
        /*
         * $sql1="SELECT company_Name,current_job,position FROM experience WHERE user_id='$id'";
         */
        $data ['tables'] = "experience";
        $data ['columns'] = array (
                'company_Name',
                'current_job',
                'position' 
        );
        $data ['conditions'] = array (
                'user_id' => "$id" 
        );
        $res1 = $this->db->select ( $data );
        $row1 = $res1->fetch ( PDO::FETCH_ASSOC );
        
        /*
         * $sql2="SELECT house_number,street_number,street_name, city,state,district,country FROM address WHERE user_id='$id'";
         */
        $data ['tables'] = "address";
        $data ['columns'] = array (
                'house_number',
                'street_name',
                'street_number',
                'city',
                'state',
                'pincode',
                'district',
                'country' ,
                'id'
        );
        $data ['conditions'] = array (
                'user_id' => "$id" 
        );
        $res2 = $this->db->select ( $data );
        while ($row2[] = $res2->fetch ( PDO::FETCH_ASSOC ))
        {
            
            
        }
        
        /*
         * $sql3="SELECT institute ,university from qualification WHERE user_id='$id' ";
         */
        
        $data ['tables'] = "qualification";
        $data ['columns'] = array (
                'institute',
                'university',
                 'id'
        );
        $data ['conditions'] = array (
                'user_id' => "$id" 
        );
        $res3 = $this->db->select ( $data );
       while ($row3[] = $res3->fetch ( PDO::FETCH_ASSOC )){
        
        
       }
        $arrData = array (
                'personal' => $row,
                'experience' => $row1,
                'address' => $row2,
                'education' => $row3 
        );
       
        return $arrData;
    }
    
    /*
     * upCon()
     * This method updates the Contact Information of the Users Personal Profile.
    */
    function upCon($arrArgs = array()) {

        $ob = new DbConnection ();
        $id = $_SESSION ['id'];
                $msg="";
       /* $flag=true;
        if(gettype($arrArgs['pincode'])!="integer") {
            $msg.="Pincode Value Not Integer";
            $flag=false;
        }
        if(!$flag) {
            $_SESSION['profile_error']=$msg;    
            return false;
        }*/
        $house_number = strip_tags($arrArgs ['houseNumber']);
        $street_number = strip_tags($arrArgs ['street_number']);
        $street_name = strip_tags($arrArgs ['street_name']);
        $city = strip_tags($arrArgs ['city']);
        $state = strip_tags($arrArgs ['state']);
        $country = strip_tags($arrArgs ['country']);
        $pincode=strip_tags($arrArgs['pincode']);
        $district=strip_tags($arrArgs['district']);
        $i=$arrArgs['i'];
        /*
         * $sql = "UPDATE probuzz.address SET house_number='$house_number', street_number = '$street_number', street_name='$street_name', state='$state', city='$city', country='$country' WHERE user_id='$id'";
         */
        
        $data = array (
                " house_number" => "$house_number",
                "street_number" => "$street_number",
                "street_name" => "$street_name",
                "state" => "$state",
                "city" => "$city",
                "country" => "$country", 
                "pincode"=>"$pincode",
                "district"=>"$district",
            
        );
      
        $where = array (
                'user_id' => "$id",
                "id"=>"$i",
        );
        
        if ($this->db->update ('address',$data, $where )) {
            echo "updated sucessfully";
            return true;
        } else {
            
            echo "some problem is occured while updating. We will correct it soon. ";
            return false;
        }
    }

   /* function delete_contact($arrArgs=array())
    {
       $i=$arrArgs['i'];
        $where = array (
                'id' => "$i", 
        );
         if ($this->db->update ( 'address',$where )) {
            echo "Deleted sucessfully";
        }
    }*/
   
    /*
     * upInfo()
     * This method updates the favourites Information of the Users Personal Profile
    */
    function upInfo($arrArgs = array()) {
        $ob = new DbConnection ();
        $id = $_SESSION ['id'];
        $favourite_book = strip_tags(@$arrArgs ['fav_book']);
        $favourite_movies =strip_tags( @$arrArgs ['fav_movies']);
        $favourite_food =strip_tags( @$arrArgs ['fav_food']);
        /*
         * $sql="update probuzz.personal_profile set favourite_book='$favourite_book', favourite_movies='$favourite_movies', favourite_food ='$favourite_food' where user_id='$id'";
         */
        $data = array (
                "favourite_book" => "$favourite_book",
                "favourite_movies" => "$favourite_movies",
                "favourite_food" => "$favourite_food" 
        );
        $where = array (
                'user_id' => "$id" 
        );
        
        if ($this->db->update ( 'personal_profile', $data, $where )) {
            echo "updated sucessfully";
            return true;$ob = new DbConnection ();
        } else {
            
            echo "some problem is occured while updating. We will correct it soon. ";
            return false;
        }
    }
    
    /*
     * upbInfo()
     * This method updates the relationship status, dob and other Personal Information of the User.
    */
    function upbInfo($arrArgs = array()) {
        $ob = new DbConnection ();
        $id = $_SESSION ['id'];
        $gender =strip_tags($arrArgs ['gender']);
        $relationship_status = strip_tags($arrArgs ['relationship_status']);
        
        $dob = strip_tags($arrArgs ['dob']);
        $intersted_in = strip_tags($arrArgs ['i_in']);
        /*
         * $sql="update probuzz.personal_profile set DOB='$dob', gender='$gender', relationship_status='$relationship_status', intersted_in='$intersted_in' where user_id='$id' ";
         */
        
        $data = array (
                
                "DOB" => "$dob",
                "gender" => "$gender",
                "relationship_status" => "$relationship_status",
                "intersted_in" => "$intersted_in" 
        );
        $where = array (
                'user_id' => "$id" 
        );
        
        if ($this->db->update ( 'personal_profile', $data, $where )) {
            echo "updated sucessfully";
            return true;
        } else {
            
            echo "some problem is occured while updating. We will correct it soon. ";
            return false;
        }
    }

    /*
     * insertabout()
     * This method updates the user name and the about me information of the User.
    */
    function insertabout($arrArgs = array()){
        $ob = new DbConnection ();
        $id = $_SESSION ['id'];
        $tagline =strip_tags($arrArgs ['about_myself']);
        $first_name =strip_tags($arrArgs ['fname']);
        $last_name=strip_tags($arrArgs ['lname']);
        $data = array (
                "about_myself" => "$tagline",
                "first_name"=>"$first_name",
                "last_name"=>"$last_name"
        );
        $where = array (
                'user_id' => "$id" 
        );
 
        if ($this->db->update ( 'personal_profile', $data, $where )) {
            echo "updated sucessfully";
            return true;
        } else {
            
            echo "some problem is occured while updating. We will correct it soon. ";
            return false;
        }
    }
    
    /*
     * insertCon()
     * This method creates a new Contact Detail of the User.
    */
    function insertCon($arrArgs = array()){
        
        $id = $_SESSION ['id'];
        
       /* if(!is_int($arrArgs['pincode'])) {
            $_SESSION['profile_error']="Pincode Can Only Be Integer";
            return false;
        }*/
        $house_number = strip_tags($arrArgs ['houseNumber']);
        $street_number = strip_tags($arrArgs ['street_number']);
        $street_name = strip_tags($arrArgs ['street_name']);
        $city = strip_tags($arrArgs ['city']);
        $state = strip_tags($arrArgs ['state']);
        $country = strip_tags($arrArgs ['country']);
        $pincode=strip_tags($arrArgs['pincode']);
        $district=strip_tags($arrArgs['district']);
        $data = array (
                "house_number" => "$house_number",
                "street_number" => "$street_number",
                "street_name" => "$street_name",
                "state" => "$state",
                "city" => "$city",
                "country" => "$country" ,
                "pincode"=>"$pincode",
                "district"=>"$district",
                'user_id' => "$id" 
        );
       
       
     $result=$this->db->insert("address",$data); 
     if($result && $result->rowCount() > 0) {
         return true;
     } else {
         return false;
     }

    }
    /*
     * insert_Education
     * This method creates a new Entry for the Education of the User.
    */
    function insert_Education($arrArgs = array()){
        $ob = new DbConnection ();
        $id = $_SESSION ['id'];
        $institute = strip_tags($arrArgs ['institute']);
        $start_year = strip_tags($arrArgs ['start_year']);
        $end_year = strip_tags($arrArgs ['end_year']);
        $university = strip_tags($arrArgs ['university']);
        $data = array (
                "institute" => "$institute",
                "start_year" => "$start_year",
                "end_year" => "$end_year",
                "university" => "$university",
                "user_id"=>"$id", 
        );
    
         
        if ($this->db->insert ( 'qualification', $data)) {
        echo "inserted sucessfully";
        return true;
        } else {
        
        echo "some problem is occured while updating. We will correct it soon. ";
        return false;
        } 
    }
    
    /*
     * up_E()
     * This method updates the Education Details of the User.
    */
    function up_E($arrArgs = array()) {
        $ob = new DbConnection ();
        $id = $_SESSION ['id'];
        $institute = strip_tags($arrArgs ['institute']);
        $start_year = strip_tags($arrArgs ['start_year']);
        $end_year = strip_tags($arrArgs ['end_year']);
        $university = strip_tags($arrArgs ['university']);
        $i=$arrArgs['id'];
        /*
         * $sql="update probuzz.qualification set institute='$institute', start_year='$start_year', end_year='$end_year', university='$university' where user_id='$id'"; echo $sql;
         */
        
        $data = array (
                "institute" => "$institute",
                "start_year" => "$start_year",
                "end_year" => "$end_year",
                "university" => "$university" 
        );
        
        $where = array (
                'user_id' => "$id" ,
                'id'=>"$i"
        );
        
        if ($this->db->update ( 'qualification', $data, $where )) {
            echo "updated sucessfully";
            return true;
        } else {
            
            echo "some problem is occured while updating. We will correct it soon. ";
            return false;
        }
    }
}

?>