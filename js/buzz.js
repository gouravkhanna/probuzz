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
//for single link page
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
   alert(a);
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#buzz"+a;
        $(b).slideUp("slow");
        c="#buzzdel"+a;
        $(c).html("Buzz Deleted");
        $(c).load("index.php","controller=status&url=buzzDelete&buzz_id="+a);
    }
}
function preConfirm(input,msg) {
    $(input).html(msg);
    $(input).append("are you sure <button>Yes</button><button>No</button>");
}
function commentDelete(a) {
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) { 
        b="#cmmnt"+a;
        $(b).slideUp("slow");
        c="#commentdel"+a;
        $(c).html("Comment Deleted").fadeOut("slow");
        $(c).load("index.php","controller=status&url=commentDelete&comment_id="+a);
    }
}
function buzzUnLike(a) {
    b="#buzzlike"+a;
    $(b).load("index.php","controller=status&url=buzzUnLike&buzz_id="+a);
    btn1="#buzzlikebtn"+a;
    btn2="#buzzunlikebtn"+a;
    $(btn2).hide();
    $(btn1).show();
    
}
function buzzLike(a) {
   // alert(a);
    b="#buzzlike"+a;
    $(b).load("index.php","controller=status&url=buzzLike&buzz_id="+a);
  
    btn1="#buzzlikebtn"+a;
    btn2="#buzzunlikebtn"+a;
    $(btn1).hide();
    $(btn2).show();
}
function markBuzzSpam(a) {
    // alert(a);
    if(confirm("Sure You want to Mark Spam,\n Review may Take time!")) { 
        c="#buzzdel"+a;
        $(c).html("Are You Sure!");
        alert(a);
        $(c).load("index.php","controller=status&url=markBuzzSpam&buzz_id="+a);
      }   
 }
function markUserSpam(a) {
    alert(a);
    if(confirm("Sure You want to Mark Spam,\n Review may Take time!")) {
        c="#spamuser";
        $(c).html("Are You Sure!");
        $(c).load("index.php","controller=user&url=markUserSpam&spam_id="+a);
      }   
 }

