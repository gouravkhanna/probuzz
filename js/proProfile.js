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
        table="qualification";
        div="displayQual";
    } else if(form=='cert') {
        table="certifications";
        div="displayCertifications";
    } else if(form=='exp') {
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
}
function updateInto(form , rowId) {
    var table;
    var div;
    var url;
    var successUrl;
    if(form=='qual') {
        table="qualification";
        div="displayQual";
    } else if(form=='cert') {
        table="certifications";
        div="displayCertifications";
    } else if(form=='exp') {
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
function append(input) {
    var rowId=$(input).parent().attr("id");
    alert(rowId);
    var url="views/addUpdateQual.php?id="+rowId;
    alert(url);
    input.setAttribute("href",url);
}

function openFancyBox(table,rowId) {
    if(table=="qualification") {
        div="displayQual";
    } else if(table=="certifications") {
        div="displayCertifications";
    } else if(table=="experience") {
        div="displayExperience";
    }
    if(rowId!=-1) {
        alert( rowId);
        $(".box").load("index.php","controller=proprofile&url=getFancyBoxContent&rowId="+rowId+"&table="+table);

    } else {
        alert("New record");
        $(".box").load("index.php","controller=proprofile&url=getFancyBoxContent&table="+table);
    }
    $('.fancybox').css({"display":"block"}).hide().fadeIn("slow");
    $('.box').slideDown("slow");
    $('.fancybox').css({"z-index":"999999"});
}

function closeFancy() {
    $('.fancybox').css({"display":"none"});
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
