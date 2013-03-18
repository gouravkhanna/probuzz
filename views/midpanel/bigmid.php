<div id="bigmid">
<br /> <br /> <br /> <br /> <br /> <br /> 

<div id="1" class="leftarrowdiv" >
Home
</div>


<div id="edit_edu" name="edit_edu" class="ee">
     <div id="editchead">Contact Information</div>
   
   <form method="get" action="#">
    House No : <input type="text" id="hno" name="hno" value=""  />
   Street No : <input type="text" id="streetNo" name="streetNo" value=""  />
   Street Name:<input type="text" id="streetName" name="streetName" value=""  />
   City  <input type="text" id="city" name="city" value=""  />
   State  <input type="text" id="state" name="state" value=""  />
   Country <input type="text" id="country" name="country" value=""  />
   PinCode <input type="text" id="pincode" name="pincode" value=""  />
   </form>
  
 </div>
 
<div id="2" class="leftarrowdiv"> 
   My profile
   <div id="me" name="me" class="m">
   About My self
   </div>
   
   
   
  <div id="education" name="education" class="e ">
 
   Education
    <a href="#" id="edit" name="edit"> Edit </a>
  </div>
  
  
  <div id="work" name="work" class="w">
  
   Work
  
  </div>
  
<div id="basicInfo" name="basicInfo" class="b">

My Info
  </div>
    
   <div id="contactInfo" name="contactInfo" class="c">
   My Contact Info 
    
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



$("#edit").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_edu").show();

}
);
 </script>
</div>