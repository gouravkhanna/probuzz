$(document).ready(function(){

	
	function loadBuzz(){
// load div on page load
$.ajax({
		        url:'index.php', //window.location.pathname,
		        type: 'GET',
		        data: 'controller=status&url=displaybuzz',
		        	beforeSend:function(data){
		        		$("#statusShow").html("<img src='data/photo/load3.gif' alt='loading' >");		        	},
		        	success:function(data) {
		        		$("#statusShow").html(data);
		        	},
			});
};

loadBuzz();
$("#subuzz").click(function(){

var buzztext=$("#buzztext").val();
$("#abc").load("index.php","controller=status&url=buzz&buzztext="+buzztext);
$("#statusShow").load("index.php","controller=status&url=displaybuzz");
});


$(".submit").click(function(){

//var comment_text=$("")

});
	/*	$.ajax({
		        url:'index.php', //window.location.pathname,
		        type: 'POST',
		        data: 'url=search&searcharg='+search,
		        	beforeSend:function(data){
		        	//	$("#dvsearchresult").html("<img src='data/photo/load3.gif' alt='loading' >");		        	},
		        	success:function(data) {
		        	//	$("#dvsearchresult").html(data);
		        	},
			});
*/



});
