
<div id="bigmid">Upload New Photo
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
	var formData = new FormData($(this)[0]);
	formData.append("size",i);	
    $.ajax({
        url:'index.php?controller=photo&url=upload', //window.location.pathname,
        type: 'POST',
        data: formData,//+"&url="+10,
        beforeSend:function(data){
    		$("#pLoad").html("<img src='http://probuzz.com/data/photo/load3.gif' alt='loading' >");		    
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