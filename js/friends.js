function sendRequest(input) {
	var id=input.id.split("_");
	$.ajax({
		type: "GET",
	    url: "index.php",
	    data:"controller=friends&url=sendRequest&friendId="+id[1],
	    success: function(msg){
	    	//alert(msg);
	    	$("#friendShipStatus").html(msg);
	    }
	});
}
function acceptRequest(input) {
	var id=input.id.split("_");
	alert("accepting :"+id[1]);
	$.ajax({
		type: "GET",
	    url: "index.php",
	    data:"controller=friends&url=acceptRequest&friendId="+id[1],
	    success: function(msg){
	    	//alert(msg);
	    	$("#friendShipStatus").html(msg);
	    }
	});
	
}
function declineRequest(input) {
	var id=input.id.split("_");
	alert("declining :"+id[1]);
	$.ajax({
		type: "GET",
	    url: "index.php",
	    data:"controller=friends&url=declineRequest&friendId="+id[1],
	    success: function(msg){
	    	//alert(msg);
	    	$("#friendShipStatus").html(msg);
	    }
	});
}