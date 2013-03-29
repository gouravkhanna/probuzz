function sendRequest(div) {
	alert(div.id);
	var id=div.id.split("_");
	alert(id[1]);
	$.ajax({
		type: "GET",
	    url: "index.php",
	    data:"controller=friends&url=sendRequest&friendId="+id[1],
	    success: function(msg){
	    	alert( msg );
	    }
	});
}
