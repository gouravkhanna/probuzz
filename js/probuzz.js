// JavaScript Document
$(document).ready(function(e) {
 	$("button,a,input[type=submit]").button();
	$("#head2").css("text-align","center");
		
	$("#head2").html("<img src='data/header/h26.jpg'  />");
	$( document ).tooltip();
//	$("#showAllSlot").load("index.php","url=showAllJobs");	
loadPreJob();
	//
	//for sliding headers
	//setInterval (headrotate, 3500);
	//,data,callback);
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
function fncreatejob()  {
    $("#mid").load("index.php","controller=corporatecontroller&url=createjobs");
    $("#midpanel").load("index.php","controller=corporatecontroller&url=createjobs");
}
/*function loadDate() {
	alert("lulu");
	$("#start_date").datepicker();
	$("#end_date").datepicker();

}*//*
$.ajax({
	url:"index.php",
	type:"get",
	data:
});*/

/* FOR UPDATING STATUS i.e active to inactive and inactive to active  */
function updateStatusJob(status,jobId) {
	$("#smsg").load("index.php","controller=corporatecontroller&url=updateStatusJob&status="+status+"&jobId="+jobId,function(){
		$("#showAllSlot").load("index.php","url=showAllJobs");
		});	
	}

function loadPreJob() {
	
}

