$(document).ready(function(){
    setInterval(loadDComment,10000);
    $("body input[type=text]").keyup(function(e){
        //if esc key is pressed
   //     alert("A");
        if(e.which==13) {
            alert(e.target.id);
        }
    });
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
    $("#abc").html("<br/>").show();
    $("#abc").load("index.php","controller=status&url=buzzUpdate&buzztext="+buzztext);//.fadeOut("veryslow");
    $("#statusShow").load("index.php","controller=status&url=displaybuzz");
});






});
function loadDComment() {
    var a=$("#buzz_id").val();
   // alert(a);
    var x="#dvcomment"+a;
    $(x).load("index.php","controller=status&url=displaycomment&buzz_id="+a);
}
function setComment(a){
    var b="#comment"+a; // comment id
    var z=$(b).val();
    var x="#dvcomment"+a;

                $.ajax({
                    url:'index.php', //window.location.pathname,
                    type: 'GET',
                    data: 'controller=status&url=comment&buzz_id='+a+'&comment_text='+z,
                        beforeSend:function(data){
                        $(x).html("<img src='data/photo/load3.gif' alt='loading' >");                   },
                        success:function(data) {
                            //load buzz after Insert
                           $(x).load("index.php","controller=status&url=displaycomment&buzz_id="+a);
                        },
                });
    }
function buzzDelete(a) {
    alert(a);
       
    b="#buzz"+a;
    $(b).slideUp("slow");
    c="#buzzdel"+a;
    $(c).html("Buzz Deleted");
    $(c).load("index.php","controller=status&url=buzzDelete&buzz_id="+a);
}