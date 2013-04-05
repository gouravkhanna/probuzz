<!-- <div id="sendmessage"> -->

<!-- 	<textarea id="message_text" name="message_text"></textarea> -->
<!-- 	<button id="submitmessage" onclick="insertMessage()"></button>
	
<!-- </div> -->
<input id="tags">
<script>
$(function() {
    var aa = [
                         "ActionScript",
                         "AppleScript",
                         "Asp",
                         "BASIC",
                         "C",
                         
                       ];

//    $( "#tags" ).autocomplete({
 //       source: aa,//'http://localhost/probuzz/trunk/user/aac',
 $( "#tags" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "http://localhost/probuzz/trunk/user/aac",
          dataType: "jsonp",
          data: {
            featureClass: "P",
            style: "full",
            maxRows: 12,
            name_startsWith: request
          },
          success: function( data ) {
            
            }));
          }
        });
      },
        /*select: function(event, ui) {
           $('#tags').val(ui.item.first_name);
               } */
      });


    
    /*
var data1;    
    $.ajax({
        url:'index.php', //window.location.pathname,
        type: 'GET',
        data: 'controller=user&url=aac',
    //    dataType: 'json',
        	beforeSend:function(data){
        		//$("#statusShow").html("<img src='data/photo/load3.gif' alt='loading' >");		        
        			},
        	success:function(data) {
        	    alert(data);
        	    var availableTags = data.first_name;
        	//    data1=jquery.parseJSON(data);
        	    
        	  //      alert(data1);
        	    $( "#tags" ).autocomplete({
        	        source: data
        	      });
        	},
	});
   
    	
   
         */
  }); 
</script>