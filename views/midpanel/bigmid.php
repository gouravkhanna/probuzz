<div id="bigmid">
<br /> <br /> <br /> <br /> <br /> <br /> 

<div id="1" class="leftarrowdiv" >
Home
</div>

<!--edit Contact code goes here-->
<div id="edit_contact" name="edit_contact" >
     <div id="editchead" >Contact Information <span id="close"> X</span></div>
   
   <form method="get" action="">
   <ul>
   
  <li>  House No : <input type="text" id="ehno" name="ehno"
     value= <?PHP echo $arrData['address']['house_number']  ?>  /></li>
 <li>  Street No : <input type="text" id="estreetNo"
  name="estreetNo" value= <?PHP echo $arrData['address']['street_number']  ?> /></li>
   <li>Street Name:<input type="text" id="estreetName"
    name="estreetName" value=<?PHP echo $arrData['address']['street_name']  ?>  /></li>
   <li>City  <input type="text" id="ecity"
    name="ecity" value=<?PHP echo $arrData['address']['city']  ?>  /></li>
   <li>State  <input type="text" id="estate" name="estate"
    value=<?PHP echo $arrData['address']['state']  ?>  /></li>
   <li>Country <input type="text" id="ecountry" name="ecountry" 
    value= <?PHP echo $arrData['address']['country']  ?>  /></li>
   
   <input type=hidden value=editCon name=url> 
 <input type=hidden value=profile name=controller><br>
   <input type="submit" id="submitCon" value="Save Me" name=submit  />
   </form>

 </div>
 <!-- edit contact ends here    -->
 <!--  edit personal information code goes here-->
 
 
 
 <div id="edit_i" name="edit_i" >
     <div id="editihead" > My Faourites <span id="close1"> X</span></div>
   
      <form method="get" action="#">
  
    <span>Favourite Books <br> <textarea rows="2" cols="25" id="fav_book" name="fav_book" > 
    <?PHP echo $arrData['personal']['favourite_book'];?>

    </textarea></span> <br>
    <span>Favourite Movies <br><textarea rows="2" cols="25" id="fav_mv" name="fav_mv">
 <?PHP echo $arrData['personal']['favourite_movies'];?>
     </textarea> <span>
    <span>Favourite Food <textarea rows="2" cols="25" id="fav_food" name="fav_food"> 
 <?PHP echo $arrData['personal']['favourite_food'];?>
    </textarea>  <span>
   
        <input type=hidden value=editInfo name=url> 
       <input type=hidden value=profile name=controller><br>
 
   <input type="submit" id="subInfo" name=submit value="Save Me" />
   </form>

 </div>
 
 
 <div id="edit_w" name="edit_w" >
     <div id="editwhead" > Add Work <span id="close2"> X</span></div>
   
      <form method="get" action="#">
    Company Name <input type="text" id="companyName" name="companyName"> <br>
    start Date    <input type="text" id="start_date" name="start_date">                                                       <br>
    End Date        <input type="text" id="end_date" name="end_date">                                                       <br>
    Position     <input type="text" id="positon" name="position"> 
       <input type=hidden value=wUp name=url> 
       <input type=hidden value=profile name=controller><br>
     <input type="submit" id="subInfo" name=submit value="Save Me" />
   </form>

 </div>

  <div id="edit_b" name="edit_b" >
     <div id="editbhead" > Basic Info <span id="close4"> X</span></div>
   
      <form method="get" action="#">
      Gender <select id="gender" name="gender">
            <option>  Male</option>
            <option> Female </option>
            <option>  Gay   </option>
            <option> Lesbian</option>
            <option>Not to mention </option>



    </select>

    <br>DOB<input type="text" id="dob" name="dob" >
    <br>Relationship Status  <select id="relationship" name="relationship">
   <option>Single</option>
   <option> Commited</option>
   <option>Prefer Not to Say</option>
    </select>
  <br>Intersted In <input type="text" id="i_in" name="i_in"> 
    <input type=hidden value=basicInfoUp name=url> 
       <input type=hidden value=profile name=controller><br>
     <input type="submit" id="bInfo" name=submit value="Save Me" />
   </form>

 </div>


<div id="edit_e" name="edit_e" >
     <div id="editehead" > Add Education <span id="close3"> X</span></div>
   
      <form method="get" action="#">
  
     Institute<input type="text" id="institute" name="institute"><br>
     Start Date <input type="text" id="istart" name="istart"><br>
     End Date <input type=" text" id="iend" name="iend"><br>
     University <input type="text" id="university" name="university"><br>   
    <input type=hidden value=edu_up name=url> 
       <input type=hidden value=profile name=controller><br>
   <input type="submit" id="eInfo" name="eInfo" value="Save Me" />
   </form>

 </div>


 
 <!--    edit personal information ends here-->
 
 
<div id="2" class="leftarrowdiv"> 
   My profile
   <div id="me" name="me" class="m">
   About Me
   <div id="details" >

   <div id="" > <?PHP  echo $arrData['personal']['first_name']." "
                            .$arrData['personal']['last_name'];

                       echo " &nbsp; Lives in &nbsp". $arrData['address']['city'];
                       echo "<br>  Attented &nbsp ". $arrData['education']['institute'];



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
      echo "<br>Studied At <br>";
      echo "<br>". $arrData['education']['institute'];
      echo ",". $arrData['education']['university'];
   }


       ?>


    <a href="#" id="edite" name="edite"> Edit </a>
  </div>
  
  
  <div id="work" name="work" class="w">
  
    <span>  Work  </span>
   <div>
    <?PHP 
     echo "<br>Currently Working At <br>";
	   echo $arrData['experience']['company_Name'] ;
     echo "<br><br> Position <br>";   
	    echo $arrData['experience']['position'] ;
	
	?>
     <br>
    <a href="#" id="editw" name="editw"> Edit </a>
    </div>
  
  </div>
  
<div id="basicInfo" name="basicInfo" class="b">

             Basic Information
          <div>
          <?PHP  echo "<br>Gender".$arrData['personal']['gender'] ;  
		         echo "<br>Birthday ".$arrData['personal']['DOB'] ;  
				 echo "<br>Relationship Status ".$arrData['personal']['relationship_status'] ;  
		         echo "<br>Intrested In ".$arrData['personal']['intersted_in'] ;  
		  
		  
		    ?>
          
          
           </div>
 <a href="#" id="editb" name="editb"> Edit </a>
  </div>
    
   <div id="contactInfo" name="contactInfo" class="c">
       My Contact Info 
      
      <?PHP 
        echo "<br> Lives in </br><br>";
        echo $arrData['address']['house_number'];
       echo ",". $arrData['address']['street_name'];
        echo "". $arrData['address']['district'];
        echo "<br>". $arrData['address']['city'];
        echo " ,".$arrData['address']['country'];



    ?>
  <br>
     <a href="#" id="editc" name="editc"> Edit </a>
  </div> 
  
  <div id="myfav" name="myfav" class="m">
    My Favourites


    <?PHP 
      echo "<br>".$arrData['personal']['favourite_book'];
      echo "<br>".$arrData['personal']['favourite_movies']; 
       echo "<br>".$arrData['personal']['favourite_food']; 


    ?>

    <br>
       <a href="#" id="editf" name="editf"> Edit </a>
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
$("#edit_i").show();

}
);
$("#editb").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_b").show();

}
);

$("#editw").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_w").show();

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
