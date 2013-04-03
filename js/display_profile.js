$(document).ready(function(){

$("#home").click(function()
{
$(".leftarrowdiv").show();
$(".leftarrowdiv2").hide();
$(".leftarrowdiv3").hide();
$(".leftarrowdiv1").hide();


}
);
$("#profile").click(function()
{
    $(".leftarrowdiv").hide();
$(".leftarrowdiv2").hide();
$(".leftarrowdiv3").hide();
$("#2.leftarrowdiv1").show();
}
);

$("#edit").click(function()
{

$(".leftarrowdiv").hide();
$(".leftarrowdiv1").hide();

}
);
$("#friend").click(function()
{
$(".leftarrowdiv").hide();
$(".leftarrowdiv1").hide();
$(".leftarrowdiv3").hide();
$("#3.leftarrowdiv2").show();

}
);
$("#pics").click(function()
{
$(".leftarrowdiv").hide();
$(".leftarrowdiv1").hide();
$(".leftarrowdiv2").hide();
$("#4.leftarrowdiv3").show();
}
);



$("#editc").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_contact").show();

}
);

$("#editf").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_w").show();

}
);
$("#editb").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_b").show();

}
);

$("#edite").click(function()
{
$("#2").fadeTo("fast",0.1);
$("#edit_e").show();

}
);

$("#close").click(function()
{
$("#edit_contact").hide();
$("#2").css("opacity","5");


}
);

$("#close1").click(function()
{

$("#edit_i").hide();
$("#2").css("opacity","5");


}
);

$("#close2").click(function()
{

$("#edit_w").hide();
$("#2").css("opacity","5");


}
);

$("#close3").click(function()
{

$("#edit_e").hide();
$("#2").css("opacity","5");


}
);

$("#close4").click(function()
{

$("#edit_b").hide();
$("#2").css("opacity","5");


}
);

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
});