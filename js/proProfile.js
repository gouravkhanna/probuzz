$(function() {
		$( "#accordion" ).accordion();
});
function set(val) {
    var table;
    if(val=='form1') {
        table="professional_profile";
    } else if(val=='form2') {
        table="qualifications";
    } else if(val=='form3') {
        table="resume";
    } else {
        alert ("Error Processing Data");
        return false;
    }
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('#'+val).serialize()+"&controller=proprofile&url=updateProfile&table="+table,
        success: function(msg){
            alert( msg );
            window.location.href = 'index.php?controller=proprofile&url=editView';
        }
        
    });
    return false;
    
}
function insertInto(form) {
    var table;
    var div;
    var url;
    var successUrl;
    if(form=='qual') {
        if(!validateQualifications()) {
            return false;
        }
        table="qualification";
        div="displayQual";
    } else if(form=='cert') {
        if(!validateCertification()) {
            return false;
        }
        table="certifications";
        div="displayCertifications";
    } else if(form=='exp') {
        if(!validateExperience()) {
            return false;
        }
        table="experience";
        div="displayExperience";
    }
    successUrl="fetchFrom";
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('.'+form).serialize()+"&controller=proprofile&url=insertInto&table="+table,
        success: function(msg){
            alert( msg );
            $("#"+div).load("index.php","controller=proprofile&url="+successUrl+"&table="+table);
            $('.fancybox').css({"display":"none"});
        }
    });
    return true;
}
function updateInto(form , rowId) {
    var table;
    var div;
    var url;
    var successUrl;
    if(form=='qual') {
        if(!validateQualifications()) {
            return false;
        }
        table="qualification";
        div="displayQual";
    } else if(form=='cert') {
        if(!validateCertification()) {
            return false;
        }
        table="certifications";
        div="displayCertifications";
    } else if(form=='exp') {
        if(!validateExperience()) {
            return false;
        }
        table="experience";
        div="displayExperience";
    }
    successUrl="fetchFrom";
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('.'+form).serialize()+"&controller=proprofile&url=updateInto&table="+table+"&rowId="+rowId,
        success: function(msg){
            alert( msg );
            $("#"+div).load("index.php","controller=proprofile&url="+successUrl+"&table="+table);
            $('.fancybox').css({"display":"none"});
        }
    });
    return true;
}
function deleteFrom(input,table) {
    var rowId=$(input).parent().attr("id");
    var answer=confirm("Are You Sure, You Want To Delete It ??");
    if(answer) {
        if(table=="qualification") {
            div="displayQual";
        } else if(table=="certifications") {
            div="displayCertifications";            
        } else if(table=="experience") {
            div="displayExperience";
        }
        successUrl="fetchFrom";
        $.ajax({
            type: "GET",
            url: "index.php",
            data:"controller=proprofile&url=deleteFrom&rowId="+rowId+"&table="+table,
            success: function(msg){
                alert( msg );
                $("#"+div).load("index.php","controller=proprofile&url="+successUrl+"&table="+table);
            }
        });
    }
}

function uploadResume(val) {
    $.ajax({
        type: "POST",
        url: "class/processUpload.php",
        enctype: 'multipart/form-data',
        encoding: 'multipart/form-data',
        data:$('#'+val).serialize(),
        success: function(msg){
            alert( msg );
        }
    });
    return false;
}


$(document).ready( function (){
        $("#displayQual").load("index.php","controller=proprofile&url=fetchFrom&table=qualification");
        $("#displayCertifications").load("index.php","controller=proprofile&url=fetchFrom&table=certifications");
        $("#displayExperience").load("index.php","controller=proprofile&url=fetchFrom&table=experience");
       	$('.fancybox').css({"display":"none"});
    }
);


function openFancyBox(table,rowId) {
    if(table=="qualification") {
        div="displayQual";
    } else if(table=="certifications") {
        div="displayCertifications";
    } else if(table=="experience") {
        div="displayExperience";
    }
    if(rowId!=-1) {
        //alert( rowId);
        $(".box").load("index.php","controller=proprofile&url=getFancyBoxContent&rowId="+rowId+"&table="+table);

    } else {
        //alert("New record");
        $(".box").load("index.php","controller=proprofile&url=getFancyBoxContent&table="+table);
    }
    $('.fancybox').css({"display":"block"}).hide().fadeIn("slow");
    $('.box').slideDown("slow");
    $('.fancybox').css({"z-index":"999999"});
}

function closeFancy() {
    $('.fancybox').css({"display":"none"});
    $('.fancybox1').css({"display":"none"});
}
function validateQualifications() {
    if(!$("#q_class").val()) {
        setErrorMessage("#q_class","This Field Can't Be Empty.")
        return false;
    }
    if(onlySpacesA("q_class")) {
        setErrorMessage("#q_class","Only Spaces Not Allowed.");
        return false;                            
    }
    var result=$("#q_type").val();
    if(result=="0"){
        $("#typeError").html("* Please Select Qualification type.");
        $("#typeError").css("visibility","visible");
        $("#type_asterisk").css("visibility","visible");
        return false;
    } else {
        $("#typeError").html("");
        $("#typeError").css("visibility","hidden");
        $("#type_asterisk").css("visibility","hidden");
    }
    if(!$("#d").val()) {
        setErrorMessage("#d","This Field Can't Be Empty.")
        return false;
    }
    if(!correctDate("d","Date Format Invalid(yyyy-mm-dd)")) {
        return false;
    }
    if(!$("#d1").val()) {
        setErrorMessage("#d1","This Field Can't Be Empty.")
        return false;
    }
    if(!correctDate("d1","Date Format Invalid(yyyy-mm-dd)")) {
        return false;
    }
    var start=$("#d").val();
    var end=$("#d1").val();
    if(!dateDifference(start,end)) {
        setErrorMessage("#d1","End Date Can't Be Less Than Start Date");
        return false;
    }
    return true;
}
function validateExperience() {
    if(!$("#experience_name").val()) {
        setErrorMessage("#experience_name","This Field Can't Be Empty.")
        return false;
    }
    if(onlySpacesA("experience_name")) {
        setErrorMessage("#experience_name","Only Spaces Not Allowed.");
        return false;                            
    }
       if(!$("#experience_position").val()) {
        setErrorMessage("#experience_position","This Field Can't Be Empty.")
        return false;
    }
    if(onlySpacesA("experience_position")) {
        setErrorMessage("#experience_position","Only Spaces Not Allowed.");
        return false;                            
    }
    if(!$("#d4").val()) {
        setErrorMessage("#d4","This Field Can't Be Empty.")
        return false;
    }
    if(!correctDate("d4","Date Format Invalid(yyyy-mm-dd)")) {
        return false;
    }
    var start=$("#d4").val();
    var end=$("#d5").val();
    if(end) {
        if(!dateDifference(start,end)) {
            setErrorMessage("#d5","End Date Can't Be Less Than Start Date");
            return false;
        }            
    }
    
    return true;
}


function validateCertification() {
    if(!$("#certification_name").val()) {
        setErrorMessage("#certification_name","This Field Can't Be Empty.")
        return false;
    }
    if(onlySpacesA("certification_name")) {
        setErrorMessage("#certification_name","Only Spaces Not Allowed.");
        return false;                            
    }
    if(!$("#certification_institute").val()) {
        setErrorMessage("#certification_institute","This Field Can't Be Empty.")
        return false;
    }
    if(onlySpacesA("certification_institute")) {
        setErrorMessage("#certification_institute","Only Spaces Not Allowed.");
        return false;                            
    }
    if(!$("#d2").val()) {
        setErrorMessage("#d2","This Field Can't Be Empty.")
        return false;
    }
    if(!correctDate("d2","Date Format Invalid(yyyy-mm-dd)")) {
        return false;
    }
    if(!$("#d3").val()) {
        setErrorMessage("#d3","This Field Can't Be Empty.")
        return false;
    }
    if(!correctDate("d3","Date Format Invalid(yyyy-mm-dd)")) {
        return false;
    }
    var start=$("#d2").val();
    var end=$("#d3").val();
    if(!dateDifference(start,end)) {
        setErrorMessage("#d3","Validity Date Can't Be Less Than Start Date");
        return false;
    }
    return true;
}

function dateDifference(start,end) {
	diff=(new Date(end).getTime()-new Date(start).getTime())/(1000 * 3600 * 24);
	if(diff>0) {
		return true;
	} else {
		return false;
	}
}

function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}
function stopUpload(success){
      var result = '';
      result = "<span class='msg'>"+success+"<\/span><br/><br/>";
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="" value="Upload" /><\/label>';
      document.getElementById('f1_upload_form').style.visibility = 'visible';      
      return true;   
}

function setErrorMessage(id,message) {
    $(id).val("");
    $(id).attr("placeholder",message);
    $(id).css("background-color","#cff993");
    $(id).focus();
}
$(document).ready(function () {
    $("#displaySecurityQuestionAnswers").load("index.php","controller=user&url=fetchSecurityQuestions");
    $("#setSecurityQuestion").click(function(){
        if(!$("#securityQuestion").val()) {
            setErrorMessage("#securityQuestion","This Field Cannot Be Left Empty");
            return false;
        } else {
            $("#securityQuestion").css("background-color","white");
        }
        if(onlySpacesA("securityQuestion")) {
            setErrorMessage("#securityQuestion","Only Spaces Are Not Allowed");
            return false;
        } else {
            $("#old_password").css("background-color","white");    
        }
        if(!$("#securityAnswer").val()) {
            setErrorMessage("#securityAnswer","This Field Cannot Be Left Empty");
            return false;
        } else {
            $("#securityAnswer").css("background-color","white");
        }
        if(onlySpacesA("securityAnswer")) {
            setErrorMessage("#securityAnswer","Only Spaces Are Not Allowed");
            return false;
        } else {
            $("#securityAnswer").css("background-color","white");    
        }
        $.ajax({
            type: "GET",
            url: "index.php",
            data:$("#securityQuestionForm").serialize()+"&controller=user&url=setupSecurityQuestion",
            success: function(msg){
                $("#securityQuestion").val("");
                $("#securityAnswer").val("");
                $("#displaySecurityQuestionAnswers").load("index.php","controller=user&url=fetchSecurityQuestions");
                
            }
        });
        return true;
    });
    $("#userSettingsSubmit").click(function () {
        if(!$("#old_password").val()){
            setErrorMessage("#old_password","This Field Cannot Be Left Empty");
            return false;
        } else {
            $("#old_password").css("background-color","white");
        }
        if(onlySpacesA("old_password")) {
            setErrorMessage("#old_password","Only Spaces Are Not Allowed");
            return false;
        } else {
            $("#old_password").css("background-color","white");    
        }
        if(!$("#new_password").val()) {
            setErrorMessage("#new_password","This Field Cannot Be Left Empty");
            return false;
        } else {
            $("#new_password").css("background-color","white");
        }
        if(onlySpacesA("new_password")) {
            setErrorMessage("#new_password","Only Spaces Are Not Allowed");
            return false;
        } else {
            $("#new_password").css("background-color","white");    
        }
        var temp=$("#new_password").val();
        if(temp.length<6) {
            setErrorMessage("#new_password","Password Too Short");
            return false;
        } else {
            $("#new_password").css("background-color","white");
        }
        if($("#new_password_confirm").val()!=$("#new_password").val()) {
            setErrorMessage("#new_password_confirm","Typed Password Does Not Match");
            return false;
        } else {
            $("#new_password_confirm").css("background-color","white");
        }
        $.ajax({
            type: "GET",
            url: "index.php",
            data:$("#userSettingsForm").serialize()+"&controller=user&url=changePassword",
            success: function(msg){
                //alert( msg );
                $("#userSettingsResponse").html(msg);
            }
        });
        return true;
    });
    
});
