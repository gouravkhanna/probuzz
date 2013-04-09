function openBox() {
	$('.fancybox').css({"display":"block"}).hide().fadeIn("slow");
    $('.box').slideDown("slow");
    $('.fancybox').css({"z-index":"999999"});
}
function sendRequest(input) {
	alert("sendimg");
	var id=input.id.split("_");
	$.ajax({
		type: "GET",
	    url: "index.php",
	    data:"controller=friends&url=sendRequest&friendId="+id[1],
	    success: function(msg){
			alert(msg);
			location.reload();
	    }
	});
}
function acceptRequest(input) {
	var id=input.id.split("_");
	$.ajax({
		type: "GET",
	    url: "index.php",
	    data:"controller=friends&url=acceptRequest&friendId="+id[1],
	    success: function(msg){
			$("#friendRequest"+id[1]).html("Friend Request Accepted").fadeOut(2000);//location.reload();
		 }
	});
	
}
function declineRequest(input) {
	var id=input.id.split("_");
	$.ajax({
		type: "GET",
	    url: "index.php",
	    data:"controller=friends&url=declineRequest&friendId="+id[1],
	    success: function(msg){
			location.reload();
	    }
	});
}
function removeFriend(input) {
	var id=input.id.split("_");
	var answer=confirm("Are you sure?");
	if(answer) {
		$.ajax({
			type: "GET",
			url: "index.php",
			data:"controller=friends&url=removeFriend&friendId="+id[1],
			success: function(msg){
				location.reload();
			}
		});	
	}
	
}