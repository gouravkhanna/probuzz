<div id="bigmid">

   
<!--edit Contact code goes here-->
<div id="edit_contact" name="edit_contact" >
     <div id="editchead" >Contact Information <span id="close"> X</span></div>
   
   <div id="innerc">
   <?php 

          $len=count($arrData['address']);
           for ($i=0;$i<($len-1);$i++) {
       
     ?>
   <form method="get" action="" id="contactform">
    
     <b>House No </b>  <br><input type="text" id="ehno" name="ehno" width="50px"
     value= <?PHP echo $arrData['address'][$i]['house_number']  ?>>
   <br><b>Street No</b>  <br> <input type="text" id="estreetNo"
  name="estreetNo" value= <?PHP echo $arrData['address'][$i]['street_number']  ?> >
 <br><b>Street Name</b> <br><input type="text" id="estreetName"
    name="estreetName" value=<?PHP echo $arrData['address'][$i]['street_name']  ?>>
    <br><b>Pincode </b> <br><input type="text" id="epincode" name="epincode">
 <br><b>District</b>  <br><input type="text" id="edistrict" name="edistrict">
 <br><b>City</b>  <br> <input type="text" id="ecity"
    name="ecity" value=<?PHP echo $arrData['address'][$i]['city']  ?> >
 <br><b>State  </b> <br><input type="text" id="estate" name="estate"
    value=<?PHP echo $arrData['address'][$i]['state']  ?>  >
 <br><b>Country</b>  <br><input type="text" id="ecountry" name="ecountry" 
    value= <?PHP echo $arrData['address'][$i]['country']  ?> >
    <input type=hidden value=<?php  echo $arrData['address'][$i]['id']; ?> id='neid'name ='neid'> 
     <input type=hidden value=edit_Con name=url> 
   <input type=hidden value=profile name=controller><br>
   <input type="submit" id="submitCon" value="Save Me" name=submit > 
   <br> <br> 
  </form>
  
<?php  } ?>
</div>

 </div>
 <div id="new_contact" name="new_contact" >
     <div id="editchead" >Contact Information <span id="close5"> X</span></div>
   
   <div id="innerc">
   <form method="get" action="" >
    <b>House No </b>  <br><input type="text" id="nehno" name="nehno" width="50px">
   <br><b>Street No</b>  <br> <input type="text" id="nestreetNo" name="nestreetNo">
 <br><b>Street Name</b> <br><input type="text" id="nestreetName" name="nestreetName">
 <br><b>Pincode </b> <br><input type="text" id="nepincode" name="nepincode">
 <br><b>District</b>  <br><input type="text" id="nedistrict" name="nedistrict">
 <br><b>City</b>  <br> <input type="text" id="necity" name="necity">
 <br><b>State  </b> <br><input type="text" id="nestate" name="nestate">
 <br><b>Country</b>  <br><input type="text" id="necountry" name="necountry">
 
 
     <input type=hidden value=new_Con name=url> 
 <input type=hidden value=profile name=controller><br>
  <input type="submit" id="submitCon1" value="Save Me" name=submit  /> 

   </form>

</div>

 </div>
 <!-- edit contact ends here    -->

 <!--  edit Favourites code goes here-->
  
 
 <div id="edit_w" name="edit_w" >
     <div id="editwhead" >My Faourites<span id="close2"> X</span></div>
     <div id="innerw">
    <form method="post" action="#">
  
  <b>  Favourite Books</b> <textarea rows="2" cols="35" id="fav_book" name="fav_book" > 
    <?PHP echo $arrData['personal']['favourite_book'];?>
    </textarea> <br>
   <br> <br>  <b> Favourite Movies</b><br> <textarea rows="2" cols="35" id="fav_mv" name="fav_mv">
 <?PHP echo $arrData['personal']['favourite_movies'];?>
     </textarea><br> 
   <br>  <b>  Favourite Food</b> <br> <textarea rows="2" cols="35" id="fav_food" name="fav_food"> 
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
     <div id="editbhead" > Basic Info <span id="close4"> X</span></div>
   <div id="innerb">
      <form method="post" action="#">
      <b> Gender</b> <select id="gender" name="gender">
            <option>  Male</option>
            <option> Female </option>
            <option>  Gay   </option>
            <option> Lesbian</option>
            <option>Not to mention </option>



    </select>
<br><br> <b>
Relationship Status</b><select id="relationship" name="relationship">
   <option>Single</option>
   <option> Commited</option>
   <option>Prefer Not to Say</option>
    </select>
    <br><br> <b>DOB</b><input type="text" id="dob" name="dob" value=
           <?PHP echo $arrData['personal']['DOB'] ;?>
            >
   
  <br><br> <b>Intersted In</b> <input type="text" id="i_in" name="i_in"
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
     <div id="editehead" > Add Education <span id="close3"> X</span></div>
   <div id="innere">
    <?php 

          $len=count($arrData['education']);
          for ($i=1;$i<($len-1);$i++) {
       
     ?>
    <form method="post" action="#">
  
    <b> Institute </b><br><input type="text" id="institute" name="institute"
                value=<?PHP echo $arrData['education'][$i]['institute'];?>
              ><br>
    <b> Start Date</b> <br><input type="text" id="istart" name="istart"><br>
     <b>End Date </b><br><input type="text" id="iend" name="iend"><br>
     <b>University</b><br> <input type="text" id="university" name="university"
                value=<?PHP echo $arrData['education'][$i]['university'];?> 
                >
             
       <input type=hidden value=edu_up name=url> 
       <input type=hidden value=profile name=controller><br>
   <input type="submit" id="eInfo" name="eInfo" value="Save Me" />
   <br><br><br>
   </form>
  <?php  } ?> 
   
</div>
 </div>

  <div id="new_education" name="new_education" >
     <div id="editehead" >Add Education <span id="close6"> X</span></div>
      <div id="innere">
   <form method="get" action="" name="newE" >
    <b> Insitute</b><br> <input type="text" id="newinstitute" name="newinstitute"><br>
   <b> Start Date</b> <br><input type="text" id="newistart" name="newistart"><br>
     <b>End Date </b><br><input type="text" id="newiend" name="newiend"><br>
     <b>University</b><br> <input type="text" id="newuniversity" name="newuniversity">
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
     About Me 
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

             Basic Information
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
 
   Education
      
      <?PHP
      $len=count($arrData['education']);
if(empty($arrData['address'])){
        echo "<br><br> <span id='lbc'> No Education To Display</span><br>";
      }
    
      else
      {
        echo "<br><span id='su'>Studied At </span><br><hr>";
        for($i=0;$i<($len-1);$i++){
      
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
       My Contact Info 
      

      <?PHP
      $len=count($arrData['address']);
       if(empty($arrData['address'])){
        echo "<br><br> <span id='lbc'> No Address To Display</span><br><hr>";
      }
      else{
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
     }
    ?>
  <br><br>
   <input type="button" id="addContact" value="Add more contact">
 
     <a href="#" id="editc" name="editc"> Edit </a>
  </div> 
  
 </div> 

   <div id="work" name="work" class="w">
  
     My Favourites <br> 

    <?PHP 
    if( empty($arrData['personal']['favourite_book'])
     || empty($arrData['personal']['favourite_movies'])
     || empty($arrData['personal']['favourite_food'])
      ) {
       
       echo "No information to display";
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



