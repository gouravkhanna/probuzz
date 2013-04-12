$(document).ready(function(){
    $("#buzztable").dataTable();
    $("#buzztablem").dataTable();
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
    $("#contactusmanegementmenu").click(function(){ 
        $("#contactusmanegementdiv").slideToggle("slow");
    });
    $("#usermanegementmenu").click(function(){ 
        $("#usermanegementdiv").slideToggle("slow");
    });
    $("#addAdminSubmit").click(function () {
        if(!validateNewAdmin()) {
            return false;
        }
        return true;
    });
    
});
function activate(input,rowId) {
    var status=$(input).val();
    $.ajax({
        type: "GET",
        url: "index.php",
        data:"controller=admin&url=activateAccount&rowId="+rowId+"&status=0",
        success: function(msg){
            alert(msg);
            $(input).val("Deactivate");
            $(input).attr("onclick","deactivate(this,"+rowId+")");
            $("#status_"+rowId).html("Active");
        }
    });

}
function deactivate(input,rowId) {
    var status=$(input).val();
    $.ajax({
        type: "GET",
        url: "index.php",
        data:"controller=admin&url=deactivateAccount&rowId="+rowId+"&status=4",
        success: function(msg){
            alert(msg);
            $(input).val("Activate");
            $(input).attr("onclick","activate(this,"+rowId+")");
            $("#status_"+rowId).html("Inactive");
        }
    });
    
}
function validateNewAdmin() {
    if(!$("#user_name").val()) {
        setErrorMessage("#user_name","This Field Cannot Be Left Empty");
        return false;
    } else {
        $("#user_name").css("background-color","white");
    }
    var temp=$("#user_name").val();
    if(temp.length<6) {
        setErrorMessage("#user_name","User Name Should Be Atleast 6 characters");
        return false;
    } else {
        $("#password").css("background-color","white");
    }
    if(!$("#password").val()) {
        setErrorMessage("#password","This Field Cannot Be Left Empty");
        return false;
    } else {
        $("#password").css("background-color","white");
    }
    var temp=$("#password").val();
    if(temp.length<6) {
        setErrorMessage("#password","Password Too Short,atleast 6 characters");
        return false;
    } else {
        $("#password").css("background-color","white");
    }
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$("#addAdminForm").serialize()+"&controller=admin&url=addAdminAccount",
        success: function(msg){
            $("#password").val("");
            $("#user_name").val("");
            $("#displayResult").html(msg);
        }
    });
    return true;
}
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
function markRead(a) {
    alert(a);
    b="#row"+a;
    $(b).slideUp("slow");
    c="#usshowmsg";
    $(c).load("index.php","controller=admin&url=updateFeedback&read_id="+a);

}