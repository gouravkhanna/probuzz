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



	



});
function buzzDelete(a) {
    alert(a);
       
    b="#buzz"+a;
    $(b).slideUp("slow");
    c="#buzzdel"+a;
    $(c).html("Buzz Deleted");
    $(c).load("index.php","controller=status&url=buzzDelete&buzz_id="+a);
}