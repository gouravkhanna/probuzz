function set(val) {
    if(!val.value) {
        alert("Enter Your Skills");
        val.style.backgroundColor="lightsilver";
        val.focus();
    }
    else {
        $.ajax({
            type: "POST",
            url: "class/processing.php",
            data: "property="+val.name+"&&value="+val.value,
            success: function(msg){
              alert( msg );
            }
        });
    }
}