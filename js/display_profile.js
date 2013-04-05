$(document).ready(function(){



$("#editc").click(function()
{
$("#bigmid").css("background-color","lightgray");
$("#2").fadeTo("fast",0.1);
$("#edit_contact").show();

}
);

$("#editf").click(function()
{
$("#bigmid").css("background-color","lightgray");
$("#2").fadeTo("fast",0.1);
$("#edit_w").show();

}
);
$("#editb").click(function()
{
$("#bigmid").css("background-color","lightgray");
$("#2").fadeTo("fast",0.1);
$("#edit_b").show();

}
);

$("#edite").click(function()
{
$("#bigmid").css("background-color","lightgray");
$("#2").fadeTo("fast",0.1);
$("#edit_e").show();

}
);

$("#close").click(function()
{
$("#edit_contact").hide();
$("#2").css("opacity","5");
$("#bigmid").css("background-color","white");

}
);
$("#close5").click(function()
{
$("#new_contact").hide();
$("#2").css("opacity","5");
$("#bigmid").css("background-color","white");

}
);

$("#close1").click(function()
{

$("#edit_i").hide();
$("#2").css("opacity","1");
$("#bigmid").css("background-color","white");

}
);

$("#close2").click(function()
{

$("#edit_w").hide();
$("#2").css("opacity","1");
$("#bigmid").css("background-color","white");

}
);

$("#close3").click(function()
{

$("#edit_e").hide();
$("#2").css("opacity","1");
$("#bigmid").css("background-color","white");

}
);

$("#close4").click(function()
{

$("#edit_b").hide();
$("#2").css("opacity","1");
$("#bigmid").css("background-color","white");

}
);

$("#adde").click(function test(){
$("#tb").append("<br><b> Insitute </b><br><input type='text' ><br><b> Start Date</b><br><input type='text'  id='i'><br><b> End Date</b><br><input type='text' id='e'><br><b>University</b><br><input type='text' id='u' role='button'>");
$("#i").datepicker({
        dateFormat : 'yy-mm-dd'
    });

$("#e").datepicker({
        dateFormat : 'yy-mm-dd'
    });

});


$("#dob").datepicker({
        dateFormat : 'yy-mm-dd'
    });
$("#start_date").datepicker({
        dateFormat : 'yy-mm-dd'
    });
$("#end_date").datepicker({
        dateFormat : 'yy-mm-dd'
    });
$("#istart").datepicker({
        dateFormat : 'yy-mm-dd'
    });

$("#iend").datepicker({
        dateFormat : 'yy-mm-dd'
    });

$("#addContact").click(function(){
 
    $("#new_contact").show();
    $("#2").fadeTo("fast",0.1); 
    $("#bigmid").css("background-color","lightgray");
});
});

