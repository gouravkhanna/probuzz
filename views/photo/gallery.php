<?php //print_r($arrData); ?>
<div id="bigmid">GALLERY
<script src="flex/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="flex/flexslider.css" type="text/css" media="screen" />
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider();
		});
		function asas(){
alert("ASA");
			}
	</script>
	<div class="flexslider">
	    <ul class="slides">
	    <?php 
	    $i=0;
	    foreach($arrData as $val ) {
	        echo "<li>";
	        echo "<img id='imggal' align='center' src='".$val['path']."' />";
	        echo "	<p class='flex-caption'>
                <button class=floatr onclick='asas()' >asa</button></p>";

	        echo "<br/>a<br/>a<br/>a<br/>";
	        
	    
	        echo "</li>";
	    }
	    ?>
	    	<!-- <li>
	    		<img src="flex/demo-stuff/inacup_samoa.jpg" /><p class="flex-caption">Captions and cupcakes. Winning combination.</p>
	    	</li>
	    	<li>
	    		<a href="http://flex.madebymufffin.com"><img src="flex/demo-stuff/inacup_pumpkin.jpg" /></a>
	    	
	    	</li>
	    	<li>
	    		<img src="flex/demo-stuff/inacup_donut.jpg" />
	    	</li>
	    	<li>
	    		<img src="flex/demo-stuff/inacup_vanilla.jpg" />
	    	</li> -->
	    </ul>
	  </div>
<form id="form3" action="" method="POST"
		enctype="multipart/form-data">
		<div id="pLoad"></div>
		<div id="a">
			<input type="file" name="resume1[]" id="file" multiple="multiple"> 
		</div>
		<input type="submit" onsubmit="return false;">
		 
	</form>

</div>
<script type="text/javascript">
var i=1;
function addUpload()
{
	i=i+1;
	if(i<25)
	$("#a").append("<input type='file' name='resume"+i+"[]'  multiple='multiple' >New Name <input type='type' name='file"+i+"' > <br/>");
}

$("form#form3").submit(function(){

    
  //  $.post("test2.php",( $('#form3').serialize(), { 'url': '10' }));

	var formData = new FormData($(this)[0]);
	formData.append("size",i);	
    $.ajax({
        url:'index.php?controller=photo&url=upload', //window.location.pathname,
        type: 'POST',
        data: formData,//+"&url="+10,
        beforeSend:function(data){
    		$("#pLoad").html("<img src='http://localhost/probuzz/trunk/data/photo/load3.gif' alt='loading' >");		    
		},
         success: function (data) {
            $("#pLoad").html(data);
        },
        cache: false,
        contentType: false,
       processData: false
    });

    return false;
});</script>
</script>
