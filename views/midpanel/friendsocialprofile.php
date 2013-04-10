<div id="bigmid">
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

 </div>
      <div id="div_left"> 
  <div id="education" name="education" class="e ">
 
   Education
      
      <?PHP
      $len=count($arrData['education']);
  
        echo "<br><span id='su'>Studied At </span><br><hr>";
        for($i=0;$i<($len-1);$i++){
           if(empty($arrData['education'][$i]['institute'])){
           	echo "No Education to display";
           	break;
           }
           	else{
      echo "<br><span id='eu'>". $arrData['education'][$i]['institute'];
      echo ",". $arrData['education'][$i]['university'];
      echo "</span>";
       }
   }
      
       ?>
        
  </div>
  
  
  <div id="contactInfo" name="contactInfo" class="c">
       My Contact Info 
      

      <?PHP
      $len=count($arrData['address']);
      
     
      echo "<br><br> <span id='lbc'> Address </span><br><hr>";
      for ($i=0;$i<($len-1);$i++) { 
       if(empty($arrData['address'][$i]['house_number']) || empty($arrData['address'][$i]['street_name'])){
            echo"No Information to Display";
            break;
       }else{

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

   
  </div> 
  

    
   </div>
 

</div>