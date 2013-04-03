<?php
include_once 'class/dbAcess.php';

class personalprofile extends DbConnection {


function __construct()
  {
    parent::__construct ();
  }
function loadProfile($arrArgs=array()) {
 $ob=new DbConnection();
  $arrData=array("bhanu"=>"yello");
  $id=$arrArgs['id'];
  
  /*$sql=" SELECT first_name,last_name,DOB,contact_no,gender,email,
        about_myself,relationship_status,intersted_in,
        favourite_book,favourite_movies,favourite_food 
        FROM personal_profile WHERE user_id='$id' ";
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
  //$res=$ob->executeSQL($sql);
  $row=$res->fetch ( PDO::FETCH_ASSOC );
  
  /*$sql1="SELECT company_Name,current_job,position  FROM 
         experience WHERE user_id='$id'";*/
   $data ['tables'] = "experience";
    $data ['columns'] = array ('company_Name',
                               'current_job',
                                'position'
                                 );
  $data ['conditions'] = array (
                    'user_id' => "$id" 
            );
  $res1=$this->db->select ( $data );
  $row1=$res1->fetch ( PDO::FETCH_ASSOC );
  
/*  $sql2="SELECT house_number,street_number,street_name,
         city,state,district,country FROM address 
          WHERE user_id='$id'";*/
   $data ['tables'] = "address";
   $data ['columns'] = array ('house_number',
                               'street_name',
                              'street_number','city','state', 
                              'district','country'
                              );
    $data ['conditions'] = array (
                    'user_id' => "$id" 
            );
  $res2=$this->db->select ( $data );
  $row2=$res2->fetch ( PDO::FETCH_ASSOC );
  
  /*$sql3="SELECT institute ,university from qualification
          WHERE user_id='$id' ";
*/

           $data ['tables'] = "qualification";
           $data ['columns'] = array ('institute',
                                       'university'
                                    );
           $data ['conditions'] = array (
                    'user_id' => "$id" 
            );
  $res3=$this->db->select ( $data );
  $row3=$res3->fetch ( PDO::FETCH_ASSOC );       
  $arrData=array(
        'personal'=>$row, 
        'experience'=>$row1,
        'address'=>$row2,
        'education'=>$row3,
  );
  
  
    return $arrData;
}

function upCon($arrArgs=array()){
  $ob=new DbConnection();

 $id=$_SESSION['id'];
 $house_number=$arrArgs['houseNumber'];
 $street_number=$arrArgs['street_number'];
 $street_name=$arrArgs['street_name'];
 $city=$arrArgs['city'];
 $state=$arrArgs['state'];
 $country=$arrArgs['country'];
   /*$sql = "UPDATE probuzz.address SET
           house_number='$house_number', 
           street_number = '$street_number',
           street_name='$street_name',
           state='$state',
           city='$city',
           country='$country'
           WHERE user_id='$id'";*/
   
    $data = array (
              " house_number"=>"$house_number", 
           "street_number" => "$street_number",
           "street_name"=>"$street_name",
           "state"=>"$state",
           "city"=>"$city",
           "country"=>"$country"
        );
     $where = array (
                'user_id' => "$id" 
        );
    
    if($this->db->update ( 'address', $data, $where )){
      echo "updated sucessfully";
      return true;
    }
    else{


      echo "some problem is occured while updating. We will correct it soon. ";
      return  false;
    }
}



function upInfo($arrArgs=array()){
$ob=new DbConnection();
$id=$_SESSION['id'];
$favourite_book=@$arrArgs['fav_book'];
$favourite_movies=@$arrArgs['fav_movies'];
$favourite_food=@$arrArgs['fav_food'];
/*$sql="update probuzz.personal_profile set 
      favourite_book='$favourite_book',
      favourite_movies='$favourite_movies',
      favourite_food ='$favourite_food'
      where user_id='$id'";*/
 $data = array (
              " favourite_book"=>"$favourite_book",
      "favourite_movies"=>"$favourite_movies",
      "favourite_food" =>"$favourite_food"
                  );
 $where = array (
                'user_id' => "$id" 
        );
        
    if($this->db->update ( 'personal_profile', $data, $where )){
      echo "updated sucessfully";
      return true;
    }
    else{


      echo "some problem is occured while updating. We will correct it soon. ";
      return  false;
    }

}

function upbInfo($arrArgs=array()){
$ob=new DbConnection();
$id=$_SESSION['id'];
$gender=$arrArgs['gender'];
$relationship_status=$arrArgs['relationship_status'];
$dob =$arrArgs['dob'];
$intersted_in=$arrArgs['i_in'];
/*$sql="update probuzz.personal_profile set
      DOB='$dob',
      gender='$gender',
      relationship_status='$relationship_status',
      intersted_in='$intersted_in'
      where user_id='$id' ";*/
    
     $data = array (

     "DOB"=>"$dob",
      "gender"=>"$gender",
      "relationship_status"=>"$relationship_status",
      "intersted_in"=>"$intersted_in"
      );
      $where = array (
                'user_id' => "$id" 
        );
        
    if($this->db->update ( 'personal_profile', $data, $where )){
      echo "updated sucessfully";
      return true;
    }
    else{


      echo "some problem is occured while updating. We will correct it soon. ";
      return  false;
    }




}




function up_E($arrArgs=array()){
$ob=new DbConnection();
$id=$_SESSION['id'];
$institute=$arrArgs['institute'];
$start_year=$arrArgs['start_year'];
$end_year=$arrArgs['end_year'];
$university=$arrArgs['university'];
/*$sql="update probuzz.qualification set
       institute='$institute',
       start_year='$start_year',
        end_year='$end_year',
        university='$university'
        where user_id='$id'";
        echo $sql;*/
  
   $data = array (
          "institute"=>"$institute",
       "start_year"=>"$start_year",
        "end_year"=>"$end_year",
        "university"=>"$university"
                  );

    $where = array (
                'user_id' => "$id" 
        );
        
    if($this->db->update ( 'qualification', $data, $where )){
      echo "updated sucessfully";
      return true;
    }
    else{


      echo "some problem is occured while updating. We will correct it soon. ";
      return  false;
    }

}

}




?>