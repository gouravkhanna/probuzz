$(document).ready(function(){
    $("#buzztable").dataTable(); 
    $("#showba11").hide();
    $("#spammanegementmenu").click(function(){ 
        $("#spammanegementdiv").slideToggle("slow");
    });
    $("#adminmanegementmenu").click(function(){ 
        $("#adminmanegementdiv").slideToggle("slow");
    });
    $("#pagemanegementmenu").click(function(){ 
        $("#pagemanegementdiv").slideToggle("slow");
    });
});

function clearSpam(a) {
    alert(a);
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#row"+a;
        $(b).slideUp("slow");
        c="#usshowmsg";
        $(c).load("index.php","controller=admin&url=updateReview&spam_id="+a+"&spam_type=0");
      //  $(c).append("Buzz Deleted<br/> Please Find it in Resolved Page");
    }
}  
function clearUserSpam(a) {
    alert(a);
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#row"+a;
        $(b).slideUp("slow");
        c="#usshowmsg";
        $(c).load("index.php","controller=admin&url=updateReview&spam_id="+a+"&spam_type=1");
      //  $(c).append("Buzz Deleted<br/> Please Find it in Resolved Page");
    }
}  
function buzzDeleteAdmin(a) {
    alert(a);
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#row"+a;
        $(b).slideUp("slow");
        c="#usshowmsg";
        $(c).load("index.php","controller=admin&url=buzzAdminDelete&spam_id="+a+"&spam_type=0");
      //  $(c).append("Buzz Deleted<br/> Please Find it in Resolved Page");
    }
}
function banUserOneDay(a) {
    alert(a);
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#row"+a;
        $(b).slideUp("slow");
        c="#usshowmsg";
        $(c).load("index.php","controller=admin&url=banUserOneDay&spam_id="+a+"&spam_type=1");
      //  $(c).append("Buzz Deleted<br/> Please Find it in Resolved Page");
    }
}
function banUserOneDayBuzz(a) {
    alert(a);
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#row"+a;
        $(b).slideUp("slow");
        c="#usshowmsg";
        $(c).load("index.php","controller=admin&url=banUserOneDay&spam_id="+a+"&spam_type=0");
      //  $(c).append("Buzz Deleted<br/> Please Find it in Resolved Page");
    }
}
function banUserOnePermanent(a) {
    alert(a);
    if(confirm("Sure You want to Delete,\n It Wont Come Back!")) {   
        b="#row"+a;
        $(b).slideUp("slow");
        c="#usshowmsg";
        $(c).load("index.php","controller=admin&url=banUserOnePermanent&spam_id="+a+"&spam_type=1");
      //  $(c).append("Buzz Deleted<br/> Please Find it in Resolved Page");
    }
}