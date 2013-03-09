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
        type: "POST",
        url: "class/processing.php",
        data: $('#'+val).serialize()+ "&table="+table,
        success: function(msg){
            alert( msg );
        }
    });
    return false;
}

function upload() {
    
}