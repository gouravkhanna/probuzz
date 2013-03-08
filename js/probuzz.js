// JavaScript Document
$(document).ready(function(e) {
 	$("button,a,input[type=submit]").button();
	$("#head2").css("text-align","center");
	$("#start_date").datepicker();
	$("#end_date").datepicker();	
	$("#head2").html("<img src='data/header/h26.jpg'  />");
	//
	//for sliding headers
	//setInterval (headrotate, 3500);


});
var i=0;
function headrotate()
	{
		if(i==27) i=1;
		else i++;
		$("#head2").html("<img src='data/header/h"+i+".jpg' height=245 />");
		$("#head2").css("text-align","center");
		$( "#head2" ).effect( "slide", "", 1500);//, callback );
	}