
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
            //window.location.href = 'index.php?controller=proprofile';
        }
        
    });
    return false;
    
}
function insertQual(form) {
    
    table="qualification";
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('.'+form).serialize()+"&controller=proprofile&url=insertQual&table="+table,
        success: function(msg){
            alert( msg );
            $("#displayQual").load("index.php","controller=proprofile&url=fetchQual");
            $('.fancybox').css({"display":"none"});
        }
    });
}
function insertCert(form) {
    
    table="certifications";
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('.'+form).serialize()+"&controller=proprofile&url=insertCert&table="+table,
        success: function(msg){
            alert( msg );
            $("#displayCertifications").load("index.php","controller=proprofile&url=fetchCertifications");
            $('.fancybox').css({"display":"none"});
        }
    });
}
function updateQual(form , rowId) {
    //alert(form+ " " +rowId);
    table="qualification";
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('.'+form).serialize()+"&controller=proprofile&url=updateQual&table="+table+"&rowId="+rowId,
        success: function(msg){
            alert( msg );
            $("#displayQual").load("index.php","controller=proprofile&url=fetchQual");
            $('.fancybox').css({"display":"none"});
        }
    });
}
function updateCert(form , rowId) {
    //alert(form+ " " +rowId);
    table="certifications";
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('.'+form).serialize()+"&controller=proprofile&url=updateCert&table="+table+"&rowId="+rowId,
        success: function(msg){
            alert( msg );
            $("#displayCertifications").load("index.php","controller=proprofile&url=fetchCertifications");
            $('.fancybox').css({"display":"none"});
        }
    });
    
}
function deleteQual(input) {
    var rowId=$(input).parent().attr("id");
    alert(rowId);
    var answer=confirm("Are You Sure, You Want To Delete It ??");
    if(answer) {
        $.ajax({
            type: "GET",
            url: "index.php",
            data:"controller=proprofile&url=deleteQual&rowId="+rowId,
            success: function(msg){
                alert( msg );
                var toHide="#mainQualDisplay"+rowId;
                $(toHide).hide();
            }
        });    
    }
}
function deleteCert(input) {
    var rowId=$(input).parent().attr("id");
    alert(rowId);
    var answer=confirm("Are You Sure, You Want To Delete It ??");
    if(answer) {
        $.ajax({
            type: "GET",
            url: "index.php",
            data:"controller=proprofile&url=deleteCert&rowId="+rowId,
            success: function(msg){
                alert( msg );
                var toHide="#mainCertDisplay"+rowId;
                $(toHide).hide();
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
        $("#displayQual").load("index.php","controller=proprofile&url=fetchQual");
        $("#displayCertifications").load("index.php","controller=proprofile&url=fetchCertifications");
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
function openCertFancyBox (rowId) {
    if(rowId!=-1) {
        alert( rowId);
        $(".box").load("index.php","controller=proprofile&url=getCertFancyBoxContent&rowId="+rowId);

    } else {
        alert("New record");
        $(".box").load("index.php","controller=proprofile&url=getCertFancyBoxContent");
    }
    $('.fancybox').css({"display":"block"}).hide().fadeIn("slow");
    $('.box').slideDown("slow");
    $('.fancybox').css({"z-index":"999999"});
}

function openFancyBox(rowId) {
    if(rowId!=-1) {
        alert( rowId);
        $(".box").load("index.php","controller=proprofile&url=getFancyBoxContent&rowId="+rowId);

    } else {
        alert("New record");
        $(".box").load("index.php","controller=proprofile&url=getFancyBoxContent");
    }
    $('.fancybox').css({"display":"block"}).hide().fadeIn("slow");
    $('.box').slideDown("slow");
    $('.fancybox').css({"z-index":"999999"});
}

function closeFancy() {
    $('.fancybox').css({"display":"none"});
}
