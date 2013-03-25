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
   
   <input type="submit" id="subCon" name="subCon" value="Save Me" />
   </form>

 </div>
 <!-- edit contact ends here    -->
 <!--  edit personal information code goes here-->
 
 
 
 <div id="edit_i" name="edit_i" >
     <div id="editihead" > My Faourites <span id="close1"> X</span></div>
   
      <form method="get" action="#">
  
    <span>Favourite Books  <textarea rows="2" cols="25"> </textarea></span> 
    <span>Favourite Movies <textarea rows="2" cols="25"> </textarea> <span>
    <span>Favourite Food <textarea rows="2" cols="25"> </textarea>  <span>
   
   <input type="submit" id="subInfo" name="subInfo" value="Save Me" />
   </form>

 </div>
 
 
 <div id="edit_w" name="edit_w" >
     <div id="editwhead" > Add Work <span id="close2"> X</span></div>
   
      <form method="get" action="#">
    Company Name <input type="text" id="companyName" name="companyName"> <br>
    start Date                                                           <br>
    End Date                                                              <br>
    Position <input type="text" id="positon" name="position"> 
  
     <input type="submit" id="subInfo" name="subInfo" value="Save Me" />
   </form>

 </div>


<div id="edit_e" name="edit_e" >
     <div id="editehead" > Add Education <span id="close3"> X</span></div>
   
      <form method="get" action="#">
  
   
   
   <input type="submit" id="subInfo" name="subInfo" value="Save Me" />
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
 <a href="#" id="editi" name="editi"> Edit </a>
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
$("#editi").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_i").show();

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
/////////////////





 </script>
</div>
