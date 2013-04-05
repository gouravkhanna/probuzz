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

$("#buzzloadmore").hover(function(){
    loadMore();
});

//update Buzz
$("#subuzz").click(function(){

var buzztext=$("#buzztext").val();
      $("#abc").load("index.php","controller=status&url=buzzUpdate&buzztext="+buzztext);//.fadeOut("veryslow");
      $("#statusShow").load("index.php","controller=status&url=displaybuzz");
      $("#buzztext").val(" ");
   //   $("#buzztext").prop("placeholder","Updated Status");
});

var i=8;

});
function loadMore() {
 //   $("#statusShow").load("index.php","controller=status&url=displaybuzz");
//alert(i);
    $.ajax({
        url:'index.php', //window.location.pathname,
        type: 'GET',
        data: 'controller=status&url=displaybuzz&limit='+i,
            beforeSend:function(data){
            //$(x).html("<img src='data/photo/load3.gif' alt='loading' >");                   
            },
            success:function(data) {
                $("#statusShow").append(data);
                i=i+8;
            },
    });
}
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
                            $(b).val(" ");
                           $(x).load("index.php","controller=status&url=displaycomment&buzz_id="+a);
                        },
                });
    }
function buzzDelete(a) {
   
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#buzz"+a;
        $(b).slideUp("slow");
        c="#buzzdel"+a;
        $(c).html("Buzz Deleted").delay(2000).fadeOut("slow");
        $(c).load("index.php","controller=status&url=buzzDelete&buzz_id="+a);
    }
}

function commentDelete(a) {
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) { 
        b="#cmmnt"+a;
        $(b).slideUp("slow");
        c="#commentdel"+a;
        $(c).html("Comment Deleted").delay(2000).fadeOut("slow");
        $(c).load("index.php","controller=status&url=commentDelete&comment_id="+a);
    }
}