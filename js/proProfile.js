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
}
function validateQualifications() {
    var flag=1;
    if(!validateQualificationClass()) {
        flag=0;
    }
    if(!validateQualificationType()) {
        flag=0;
    }
    if(!validateQualificationDate()) {
        flag=0;
    }
    if(flag) {
        return true;
    } else {
        return false;
    }
}
function validateExperience() {
    var flag=1;
    if(!validateExperienceCompanyName()) {
        flag=0;
    }
    if(!validateExperienceDateDifference()) {
        flag=0;
    }
    if(flag) {
        return true;
    } else {
        return false;
    }
}
function validateExperienceDateDifference() {
    var start=$("#d4").val();
    var end=$("#d5").val();
    if(start && end) {
        if(!dateDifference(start,end)) {
            $("#experienceDateDifferenceError").html("* Leaving Date Cannot Be Less Than Or Equal To Joining Date.");
            $("#experienceDateDifferenceError").css("visibility","visible");
            $("#experience_date_asterisk").css("visibility","visible");
            return false;
        } else {
            $("#experienceDateDifferenceError").html("");
            $("#experienceDateDifferenceError").css("visibility","hidden");
            $("#experience_date_asterisk").css("visibility","hidden");
            return true;
        }
    } else {
        return true;    
    }
}
function validateExperienceCompanyName() {
    var result=$("#experience_name").val();
    if(!result){
        $("#experienceNameError").html("* Company Name Cannot Be Left Empty.");
        $("#experienceNameError").css("visibility","visible");
        $("#experience_name_asterisk").css("visibility","visible");
        return false;
    } else {
        $("#experienceNameError").html("");
        $("#experienceNameError").css("visibility","hidden");
        $("#experience_name_asterisk").css("visibility","hidden");
    }
    return true;
}

function validateCertification() {
    var flag=1;
    if(!validateCertificationName()) {
        flag=0;
    }
    if(!validateCertificationYear()) {
        flag=0;
    }
    if(!validateCertificationValidity()) {
        flag=0;
    }
    if(!validateCertificationInstitute()) {
        flag=0;
    }
    if(!validateCertificationDateDifference()) {
        flag=0;
    }
    if(flag) {
        return true;
    } else {
        return false;
    }
}
function validateCertificationDateDifference() {
    var start=$("#d2").val();
    var end=$("#d3").val();
    if(start && end) {
        if(!dateDifference(start,end)) {
            $("#certificationValidityError").html("* Validity Date Cannot Be Less Than Or Equal To Certification Date.");
            $("#certificationValidityError").css("visibility","visible");
            $("#certification_validity_asterisk").css("visibility","visible");
            return false;
        } else {
            $("#certificationValidityError").html("");
            $("#certificationValidityError").css("visibility","hidden");
            $("#certification_validity_asterisk").css("visibility","hidden");
            return true;
        }
    } else {
        return true;    
    }
}
function validateCertificationInstitute() {
    var result=$("#certification_institute").val();
    if(!result){
        $("#certificationInstituteError").html("* Certification Institute Cannot Be Left Empty.");
        $("#certificationInstituteError").css("visibility","visible");
        $("#certification_institute_asterisk").css("visibility","visible");
        return false;
    } else {
        $("#certificationInstituteError").html("");
        $("#certificationInstituteError").css("visibility","hidden");
        $("#certification_institute_asterisk").css("visibility","hidden");
    }
    return true;
}
function validateCertificationValidity() {
    var result=$("#d3").val();
    if(!result){
        $("#certificationValidityError").html("* Certification Validity Cannot Be Left Empty.");
        $("#certificationValidityError").css("visibility","visible");
        $("#certification_validity_asterisk").css("visibility","visible");
        return false;
    } else {
        $("#certificationValidityError").html("");
        $("#certificationValidityError").css("visibility","hidden");
        $("#certification_validity_asterisk").css("visibility","hidden");
    }
    return true;
}
function validateCertificationYear() {
    var result=$("#d2").val();
    if(!result){
        $("#certificationYearError").html("* Certification Year Cannot Be Left Empty.");
        $("#certificationYearError").css("visibility","visible");
        $("#certification_year_asterisk").css("visibility","visible");
        return false;
    } else {
        $("#certificationYearError").html("");
        $("#certificationYearError").css("visibility","hidden");
        $("#certification_year_asterisk").css("visibility","hidden");
    }
    return true;
}
function validateCertificationName() {
    var result=$("#certification_name").val();
    if(!result){
        $("#certificationNameError").html("* Certification Name Cannot Be Left Empty.");
        $("#certificationNameError").css("visibility","visible");
        $("#cert_name_asterisk").css("visibility","visible");
        return false;
    } else {
        $("#certificationNameError").html("");
        $("#certificationNameError").css("visibility","hidden");
        $("#cert_name_asterisk").css("visibility","hidden");
    }
    return true;

}
function validateQualificationType() {
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
    return true;
}
function validateQualificationClass(){
    var result=$("#q_class").val();
    if(!result){
        $("#classError").html("* Class/Degree/Diploma Cannot Be Left Empty.");
        $("#classError").css("visibility","visible");
        $("#class_asterisk").css("visibility","visible");
        return false;
    } else {
        $("#classError").html("");
        $("#classError").css("visibility","hidden");
        $("#class_asterisk").css("visibility","hidden");
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
function validateQualificationDate() {
    var start=$("#d").val();
    var end=$("#d1").val();
    if(start && end) {
        if(!dateDifference(start,end)) {
            $("#dateError").html("* End Date Cannot Be Less Than Or Equal To Start Date.");
            $("#dateError").css("visibility","visible");
            $("#date_asterisk").css("visibility","visible");
            return false;
        } else {
            $("#dateError").html("");
            $("#dateError").css("visibility","hidden");
            $("#date_asterisk").css("visibility","hidden");
            return true;
        }
    } else {
        return true;    
    }
}
function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}

function stopUpload(success){
      var result = '';
      if (success == 1){
         result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
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
