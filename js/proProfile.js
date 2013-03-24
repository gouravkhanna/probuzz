
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
function insertQual(val) {
    alert(val);
    if(val=='form4') {
        table="qualification";
    } else {
        alert ("Error Processing Data");
        parent.$.fancybox.close();
        
    }
    $.ajax({
        type: "GET",
        url: "index.php",
        data:$('#'+val).serialize()+"&controller=proprofile&url=insertQual&table="+table,
        success: function(msg){
            alert( msg );
            //window.location.href = 'index.php?controller=proprofile';
            parent.$.fancybox.close();
        }
    });
    
    
}

function deleteQual(input) {
    var rowId=$(input).parent().attr("id");
    //alert(rowId);
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
        
    }
);
function append(input) {
    var rowId=$(input).parent().attr("id");
    alert(rowId);
    var url="views/addUpdateQual.php?id="+rowId;
    alert(url);
    input.setAttribute("href",url);
}
