<div id="bigmid">
<div id="errorDiv">
     <?php
          if(isset($_SESSION['profile_error'])) {
               echo $_SESSION['profile_error'];
               unset($_SESSION['profile_error']);
          }
     ?>
</div>
   
<!--edit Contact code goes here-->
<div id="edit_contact" name="edit_contact" >
     <div id="editchead" ><?php echo CONTACT_INFORMATION;?><span id="close"> X</span></div>
   
   <div id="innerc">
   <?php 

          $len=count($arrData['address']);
           for ($i=0;$i<($len-1);$i++) {
       
     ?>
   <form method="get" action="" id="contactform">
    
     <b><?php echo HOUSE_NO;?> </b>  <br>
     <input type="text" id="ehno_<?php echo $i;?>" name="ehno" width="50px"
     value= "<?PHP echo $arrData['address'][$i]['house_number']; ?>" > <br>
     <b><?php echo STREET_NO;?></b>
     <br>
     <input type="text" id="estreetNo_<?php echo $i;?>"
     name="estreetNo" value= "<?PHP echo $arrData['address'][$i]['street_number']; ?>" > <br>
     <b><?php echo STREET_NAME;?></b> <br>
     <input type="text" id="estreetName_<?php echo $i;?>"
     name="estreetName" value="<?PHP echo $arrData['address'][$i]['street_name']; ?>" > <br>
     <b><?php echo PINCODE;?></b> <br>
     <input type="text" id="epincode_<?php echo $i;?>" value="<?PHP echo $arrData['address'][$i]['pincode']; ?>" name="epincode"> <br>
     <b><?php echo DISTRICT; ?></b>  <br>
     <input type="text" id="edistrict_<?php echo $i;?>" value="<?PHP echo $arrData['address'][$i]['district']; ?>" name="edistrict"><br>
     <b><?php echo CITY;?></b>  <br>
     <input type="text" id="ecity_<?php echo $i;?>"
     name="ecity" value="<?PHP echo $arrData['address'][$i]['city']; ?>" > <br>
     <b><?php echo STATE;?></b> <br>
     <input type="text" id="estate_<?php echo $i;?>" name="estate"
    value="<?PHP echo $arrData['address'][$i]['state']; ?>"  >
 <br><b><?php echo COUNTRY;?></b>  <br>
 <input type="text" id="ecountry_<?php echo $i;?>" name="ecountry" 
    value= "<?PHP echo $arrData['address'][$i]['country']; ?>" >
    <input type=hidden value="<?php  echo $arrData['address'][$i]['id']; ?>" id='neid'name ='neid'> 
     <input type=hidden value=edit_Con name=url> 
   <input type=hidden value=profile name=controller><br>
   <input type="submit" id="submitCon" value="Save Me" onclick="return validateEditAddress(<?php echo $i;?>)" name=submit > 
   <br> <br> 
  </form>
  
<?php  } ?>
</div>

 </div>
 <div id="new_contact" name="new_contact" >
     <div id="editchead" ><?php echo CONTACT_INFORMATION;?><span id="close5"> X</span></div>
   
   <div id="innerc">
   <form method="get" action="" >
    <b><?php echo HOUSE_NO;?></b>  <br><input type="text" id="nehno" name="nehno" width="50px">
   <br><b><?php echo STREET_NO;?></b>  <br> <input type="text" id="nestreetNo" name="nestreetNo">
 <br><b><?php echo STREET_NAME;?></b> <br><input type="text" id="nestreetName" name="nestreetName">
 <br><b><?php echo PINCODE;?> </b> <br><input type="text" id="nepincode" name="nepincode">
 <br><b><?php echo DISTRICT;?></b>  <br><input type="text" id="nedistrict" name="nedistrict">
 <br><b><?php echo CITY;?></b>  <br> <input type="text" id="necity" name="necity">
 <br><b><?php echo STATE;?></b> <br><input type="text" id="nestate" name="nestate">
 <br><b><?php echo COUNTRY;?></b>  <br><input type="text" id="necountry" name="necountry">
 
 
     <input type=hidden value=new_Con name=url> 
 <input type=hidden value=profile name=controller><br>
  <input type="submit" id="submitCon2" value="Save Me" name=submit  /> 

   </form>

</div>

 </div>
 <!-- edit contact ends here    -->

 <!--  edit Favourites code goes here-->
  
 
 <div id="edit_w" name="edit_w" >
     <div id="editwhead" ><?php echo MY_FAVOURITES;?><span id="close2"> X</span></div>
     <div id="innerw">
    <form method="post" action="#">
  
  <b>  <?php echo FAVOURITE_BOOKS;?></b> <textarea rows="2" cols="35" id="fav_book" name="fav_book" > 
    <?PHP echo $arrData['personal']['favourite_book'];?>
    </textarea> <br>
   <br> <br>  <b> <?php echo FAVOURITE_MOVIES;?></b><br> <textarea rows="2" cols="35" id="fav_mv" name="fav_mv">
 <?PHP echo $arrData['personal']['favourite_movies'];?>
     </textarea><br> 
   <br>  <b>  <?php echo FAVOURITE_FOOD;?></b> <br> <textarea rows="2" cols="35" id="fav_food" name="fav_food"> 
 <?PHP echo $arrData['personal']['favourite_food'];?>
    </textarea> 
   
       <input type=hidden value=editInfo name=url> 
       <input type=hidden value=profile name=controller><br>
 <br><br>
   <input type="submit" id="subInfo" name=submit value="Save Me" />
   </form>
 </div>
 </div>
  <!-- edit favourite ends here    -->
 <!--  edit basic info code goes here-->
  <div id="edit_b" name="edit_b" >
     <div id="editbhead" > <?php echo BASIC_INFORMATION;?> <span id="close4"> X</span></div>
   <div id="innerb">
      <form method="post" action="#">
      <b> <?php echo GENDER;?></b> <select id="gender" name="gender">
            <option>  <?php echo MALE;?></option>
            <option> <?php echo FEMALE;?> </option>
            <option>  <?php echo GAY;?>   </option>
            <option> <?php echo LESBIAN;?></option>
            <option><?php echo NOT_TO_MENTION;?></option>



    </select>
<br><br> <b>
<?php echo RELATIONSHIP_STATUS;?></b><select id="relationship" name="relationship">
   <option><?php echo SINGLE;?></option>
   <option> <?php echo COMMITED;?></option>
   <option><?php echo PREFER_NOT_TO_SAY;?></option>
    </select>
    <br><br> <b><?php echo DOB;?></b><input type="text" class="personal_datepicker" id="dob" name="dob"
          value="<?PHP echo $arrData['personal']['DOB'] ;?>">
   
  <br><br> <b><?php echo INTERSTED_IN;?></b> <input type="text" id="i_in" name="i_in"
                    value= <?PHP echo $arrData['personal']['intersted_in'] ;?>
                      > 
    <input type=hidden value=basicInfoUp name=url> 
       <input type=hidden value=profile name=controller><br>
       <br><br>
     <input type="submit" id="bInfo" name=submit value="Save Me" />
   </form>
</div>
 </div>

 <!-- edit basic info ends here    -->
  <!-- Add Education code here   -->
<div id="edit_e" name="edit_e" >
     <div id="editehead" > <?php echo ADD_EDUCATION;?> <span id="close3"> X</span></div>
   <div id="innere">
    <?php 

          $len=count($arrData['education']);
          for ($i=0;$i<($len-1);$i++) {
       
     ?>
    <form method="post" action="#">
  
    <b> <?php echo INSTITUTE;?></b><br><input type="text" id="institute_<?php echo $i;?>" name="institute"
                value=<?PHP echo $arrData['education'][$i]['institute'];?>
              ><br>
    <b> <?php echo START_DATE;?></b> <br><input class="personal_datepicker" type="text" id="istart_<?php echo $i;?>" name="istart"><br>
     <b><?php echo END_DATE;?> </b><br><input class="personal_datepicker" type="text" id="iend_<?php echo $i;?>" name="iend"><br>
     <b><?php echo UNIVERSITY;?></b><br> <input type="text" id="university_<?php echo $i;?>" name="university"
                value=<?PHP echo $arrData['education'][$i]['university'];?> >
          <input type=hidden value="<?php  echo $arrData['education'][$i]['id']; ?>" id='eeid'name ='eeid'> 
       <input type=hidden value=edu_up name=url> 
       <input type=hidden value=profile name=controller><br>
   <input type="submit" onclick="return validateEditEducation(<?php echo $i;?>)" id="eInfo" name="eInfo" value="Save Me" />
   <br><br><br>
   </form>
  <?php  } ?> 
   
</div>
 </div>

  <div id="new_education" name="new_education" >
     <div id="editehead" ><?php echo ADD_EDUCATION;?><span id="close6"> X</span></div>
      <div id="innere">
   <form method="get" action="" name="newE" >
    <b> <?php echo INSTITUTE;?></b><br> <input type="text" id="newinstitute" name="newinstitute"><br>
   <b> <?php echo START_DATE;?></b> <br><input type="text" class="personal_datepicker" id="newistart" name="newistart"><br>
     <b><?php echo END_DATE;?> </b><br><input type="text" class="personal_datepicker" id="newiend" name="newiend"><br>
     <b><?php echo UNIVERSITY;?></b><br> <input type="text" id="newuniversity" name="newuniversity">
      <input type=hidden value=new_Education name=url> 
 <input type=hidden value=profile name=controller><br>
  <input type="submit" id="submitCon1" value="Save Me" name=submit  /> 

   </form>

</div>

 </div>
 
 
 
<!--    Add education code ends here-->
 <!--  Main div for   -->
 
<div id="2" class="leftarrowdiv1"> 
   
   <div id="me" name="me" class="m">
     <?php echo ABOUT_ME;?>
   <div id="details" >

   <div id="spp" > 
    <?PHP  
          echo $arrData['personal']['first_name']." "
          .$arrData['personal']['last_name'] ;
                        
     echo " <span id='sspp'> <b>  Lives in </b>  </span> &nbsp <span id='t'>". $arrData['address'][0]['city'];
          
     echo " <br> <b> Attented </b></span> <span id='t'>". $arrData['education'][0]['institute'];
     echo "</span>"; 
     echo "<br>  Tagline <span id='t'>" .$arrData['personal']['about_myself'];
     echo "</span>";  

       ?>

   </div>
   </div>
   </div>
   <div id="basicInfo" name="basicInfo" class="b">

             <?php echo BASIC_INFORMATION;?>
          <div>
          <?PHP  echo "<br> <span id='lb'> Gender</span>
                 <span id='rb'>".$arrData['personal']['gender'] ;  
             echo "</span>";
             echo "<br><span id='lb'>Birthday</span> 
              <span id='rb'>".$arrData['personal']['DOB'] ;  
          echo "</span>";
         echo "<br><span id='lb'>Relationship Status</span>
              <span id='rb'> ".$arrData['personal']['relationship_status'] ;  
       echo "</span>";
             echo "<br><span id='lb'>Intrested In</span> 
              <span id='rb'>".$arrData['personal']['intersted_in'] ;  
       echo "</span>";
      
        ?>
          
      </div>
 <a href="#" id="editb" name="editb"> Edit </a>
 </div>
      <div id="div_left"> 
  <div id="education" name="education" class="e ">
 
   <?php echo EDUCATION;?>
      
      <?PHP
      $len=count($arrData['education']);
        
        echo "<br><span id='su'>Studied At </span><br><hr>";
        for($i=0;$i<($len-1);$i++){
         if($arrData['education'][$i]==NULL){
          echo "<br><br> <span id='lbc'> No Education To Display</span><br>";
          break;
         }else
      {
      echo "<br><span id='eu'>". $arrData['education'][$i]['institute'];
      echo ",". $arrData['education'][$i]['university'];
      echo "</span>";
   }
      }
       ?>
        <br><br>
   <input type="button" id="addEducation" value="Add more contact">
    <a href="#" id="edite" name="edite"> Edit </a>
  </div>
  
  
  <div id="contactInfo" name="contactInfo" class="c">
       <?php echo CONTACT_INFO;?> 
      

      <?PHP
      $len=count($arrData['address']);
      
     
      echo "<br><br> <span id='lbc'> Address </span><br><hr>";
      for ($i=0;$i<($len-1);$i++) { 
        echo "<br>";        
       echo "<span id='rbc'>";
       echo $arrData['address'][$i]['house_number'];
       echo ",". $arrData['address'][$i]['street_name'];
       echo "". $arrData['address'][$i]['district'];
       echo  $arrData['address'][$i]['city'];
       echo " ,".$arrData['address'][$i]['country'];
       echo "<br></span>";
         }
  
    ?>
  <br><br>
   <input type="button" id="addContact" value="Add more contact">
 
     <a href="#" id="editc" name="editc"> Edit </a>
  </div> 
  
 </div> 

   <div id="work" name="work" class="w">
  
     <?php echo MY_FAVOURITES;?> <br> 

    <?PHP 
    if( empty($arrData['personal']['favourite_book'])
     || empty($arrData['personal']['favourite_movies'])
     || empty($arrData['personal']['favourite_food'])
      ) {
       
       echo NO_INFO_TO_DISPLAY;
    }  
    else{
    echo "<br> <span id='lb'>Read </span> <span id='rb'>".$arrData['personal']['favourite_book'];
      echo "</span><br>";
      echo "<span id='lb'> Movies </span>
            <span id='rb'> ".$arrData['personal']['favourite_movies']; 
       echo "</span><br>";
       echo " <span id='lb'> Food </span><span id='rb'>".$arrData['personal']['favourite_food']; 
        echo "</span><br>";
  }
    ?>

    <br>
       <a href="#" id="editf" name="editf"> Edit </a>
  
  </div> 
  

    
   </div>
 


<!-- main div for  ends here  -->



