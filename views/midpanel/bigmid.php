<div id="bigmid">
<br /> <br /> <br /> <br /> <br /> <br /> 

<div id="1" class="leftarrowdiv" >
Home
</div>

<!--edit Contact code goes here-->
<div id="edit_contact" name="edit_contact" >
     <div id="editchead" >Contact Information <span id="close"> X</span></div>
   
   <div id="innerc">
   <form method="post" action="">
   
   
    <b>House No </b>  <br><input type="text" id="ehno" name="ehno" width="50px"
     value= <?PHP echo $arrData['address']['house_number']  ?>  />
   <br><b>Street No</b>  <br> <input type="text" id="estreetNo"
  name="estreetNo" value= <?PHP echo $arrData['address']['street_number']  ?> />
 <br><b>Street Name</b> <br><input type="text" id="estreetName"
    name="estreetName" value=<?PHP echo $arrData['address']['street_name']  ?>  />
 <br><b>City</b>  <br> <input type="text" id="ecity"
    name="ecity" value=<?PHP echo $arrData['address']['city']  ?>  />
 <br><b>State  </b> <br><input type="text" id="estate" name="estate"
    value=<?PHP echo $arrData['address']['state']  ?>  />
 <br><b>Country</b>  <br><input type="text" id="ecountry" name="ecountry" 
    value= <?PHP echo $arrData['address']['country']  ?>  />
   
   <input type=hidden value=edit_Con name=url> 
 <input type=hidden value=profile name=controller><br>
   <input type="submit" id="submitCon" value="Save Me" name=submit  />
   </form>
</div>
 </div>
 <!-- edit contact ends here    -->
 <!--  edit personal information code goes here-->
 
 

 
 
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


<div id="edit_e" name="edit_e" >
     <div id="editehead" > Add Education <span id="close3"> X</span></div>
   <div id="innere">
      <form method="post" action="#">
  
    <b> Institute </b><br><input type="text" id="institute" name="institute"
                value=<?PHP echo $arrData['education']['institute'];?>
               ><br>
    <b> Start Date</b> <br><input type="text" id="istart" name="istart"><br>
     <b>End Date </b><br><input type="text" id="iend" name="iend"><br>
     <b>University</b><br> <input type="text" id="university" name="university"
                value=<?PHP echo $arrData['education']['university'];?> 
                 ><br>   
    <input type=hidden value=edu_up name=url> 
       <input type=hidden value=profile name=controller><br>
   <input type="submit" id="eInfo" name="eInfo" value="Save Me" />
   </form>
</div>
 </div>


 
 <!--    edit personal information ends here-->
 
 
<div id="2" class="leftarrowdiv"> 
   My profile
   <div id="me" name="me" class="m">
     About Me 
   <div id="details" >

   <div id="spp" > 
    <?PHP  
                             echo $arrData['personal']['first_name']." "
                            .$arrData['personal']['last_name'] ;
                        
       echo " <span id='sspp'> <b>  Lives in </b>  </span> &nbsp <span id='t'>". $arrData['address']['city'];
          
       echo " <br> <b> Attented </b></span> <span id='t'>". $arrData['education']['institute'];
       echo "</span>"; 
        echo "<br>  Tagline <span id='t'>" .$arrData['personal']['about_myself'];
         echo "</span>";  

       ?>

   </div>
   </div>
   </div>
   
   
   
  <div id="education" name="education" class="e ">
 
   Education
      
      <?PHP
      if($arrData['education']['institute']==NULL)
      {

          echo "<br> <br>Add Education";

      }
      else
      {
      echo "<br><span id='su'>Studied At </span><br>";
      echo "<br><span id='eu'>". $arrData['education']['institute'];
      echo ",". $arrData['education']['university'];
      echo "</span>";
   }


       ?>


    <a href="#" id="edite" name="edite"> Edit </a>
  </div>
  
  
  <div id="work" name="work" class="w">
  
    My Favourites <br>


    <?PHP 
      echo "<br> <span id='lb'>Read </span> <span id='rb'>".$arrData['personal']['favourite_book'];
      echo "</span><br>";
      echo "<span id='lb'> Movies </span>
            <span id='rb'> ".$arrData['personal']['favourite_movies']; 
       echo "</span><br>";
       echo " <span id='lb'> Food </span><span id='rb'>".$arrData['personal']['favourite_food']; 
        echo "</span><br>";

    ?>

    <br>
       <a href="#" id="editf" name="editf"> Edit </a>
  
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
    
   <div id="contactInfo" name="contactInfo" class="c">
       My Contact Info 
      
      <?PHP 
        echo "<br><br> <span id='lb'> Lives in </span><span id='rb'> ";
        echo $arrData['address']['house_number'];
       echo ",". $arrData['address']['street_name'];
        echo "". $arrData['address']['district'];
        echo "<br>". $arrData['address']['city'];
        echo " ,".$arrData['address']['country'];
         echo "</span>";


    ?>
  <br><br>
     <a href="#" id="editc" name="editc"> Edit </a>
  </div> 
  
 
</div>



 
<div id="4" class="leftarrowdiv">
My pics
</div>




<script>

$("#home").click(function()
{
$(".leftarrowdiv").hide();
$("#1.leftarrowdiv").show();
}
);
$("#profile").click(function()
{
$(".leftarrowdiv").hide();
$("#2.leftarrowdiv").show();
}
);

$("#edit").click(function()
{

$(".leftarrowdiv").hide();
$("#3.leftarrowdiv").show();
}
);
$("#friend").click(function()
{
$(".leftarrowdiv").hide();
$("#4.leftarrowdiv").show();
}
);
$("#pics").click(function()
{
$(".leftarrowdiv").hide();
$("#4.leftarrowdiv").show();
}
);



$("#editc").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_contact").show();

}
);

$("#editf").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_w").show();

}
);
$("#editb").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_b").show();

}
);

$("#edite").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_e").show();

}
);

$("#close").click(function()
{
$("#edit_contact").hide();
$("#2").css("opacity","5");


}
);

$("#close1").click(function()
{

$("#edit_i").hide();
$("#2").css("opacity","5");


}
);

$("#close2").click(function()
{

$("#edit_w").hide();
$("#2").css("opacity","5");


}
);

$("#close3").click(function()
{

$("#edit_e").hide();
$("#2").css("opacity","5");


}
);

$("#close4").click(function()
{

$("#edit_b").hide();
$("#2").css("opacity","5");


}
);

$("#dob").datepicker({
        dateFormat : 'yy-mm-dd'
    });
$("#start_date").datepicker({
        dateFormat : 'yy-mm-dd'
    });
$("#end_date").datepicker({
        dateFormat : 'yy-mm-dd'
    });
$("#istart").datepicker({
        dateFormat : 'yy-mm-dd'
    });

$("#iend").datepicker({
        dateFormat : 'yy-mm-dd'
    });
/////////////////





 </script>
</div>
