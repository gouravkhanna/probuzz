// JavaScript Document
$(document).ready(function(e) {
 	//$("button,a,input[type=submit]").button();
	$(".juiButton").button();
	$("#head2").css("text-align","center");
	$("#head2").html("<img src='data/header/h26.jpg'  />");
	$("#dvsearch").hide();
	$("#backjob").hide();
	$( document ).tooltip();
//	$("#showAllSlot").load("index.php","url=showAllJobs");	

	//Search Bar
	$("#searchbar").keyup(function(e){
		//if esc key is pressed
		if(e.which==27) {
			$("#dvsearch").slideUp();
			$("#searchbar").val('');
		}
		
		var search=$("#searchbar").val();
		if(search=="")
		{
			$("#dvsearch").slideUp();
		}
		else {
			$("#dvsearch").slideDown();
			$.ajax({
		        url:'index.php', //window.location.pathname,
		        type: 'POST',
		        data: 'url=search&searcharg='+search,
		        	beforeSend:function(data){
		        		$("#dvsearchresult").html("<img src='data/photo/load3.gif' alt='loading' >");		        	},
		        	success:function(data) {
		        		$("#dvsearchresult").html(data);
		        	},
			});
		}
	});
	
//	Event for handling clicks on the container
	$("#container").click(function(e){
		if(e.target.id=="dvsearch" || e.target.id=="searchbar" ||e.target.id=="dvsearchresult" || e.target.id=="dvsearchoption") {
		}
		else {
			$("#dvsearch").slideUp();	
			$("#searchbar").val('');
		}
		
	});
	/* Top Jobs Dynamic Loading */
	//$("#rightpanel2").load("index.php","url=topjobs");
	
	$("#searchoptbar").click(function(e){
		n=e.target.id;
		n1=n.split("lx");
		//alert(n1[1]);
		$("#spd"+n1[1]).slideToggle();
		changeIt(1);
	});
	$("#showoption").click(function(){
		$("#searchoptbar").slideToggle(function(){
		if($("#searchoptbar").is(":visible")) {
			$("#showoption").html('Hide');
		}
		else {
			$("#showoption").html('Show');
		}
		});
		
	});
	$("#searchpeopleform").submit(function(){ $("#searchoptbar").slideUp(); });
	$("#searchoptbar input[type=checkbox]").click(function(e){
		n=e.target.id;
		//n1=n.split("ls");
		var x=$("#"+n);
		alert(x);
		var selectVal=$("#spcity").val();
		if($.inArray("other",selectVal)!=-1) {
			alert("yes");
		}
	});	
	
	$("#updateJobDiv input").focus(function(e) {
		n=e.target.id;
		n1="#dv"+n;
		$(n1).css("background-color","lightblue");
		$(n).css("border","8px green solid");
		
	});
	$("#updateJobDiv input").blur(function(e) {
		n=e.target.id;
		n1="#dv"+n;
		$(n1).css("background-color","#dfdfdf");
		
	});
	
	
	
	
	
	
	
//loadPreJob();
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
/* For Show JOb from topJobs notifications */
function fnLoadJobUser(a) {
		//$("#showspecficjob").show();
	alert(a);
	$("#midpanel").load("index.php","controller=corporatecontroller&url=showSpecficJob&jobId="+a+"&request_type=user");
	//$("#showslot").hide();
	//$("#backjob").show();
}

/* For Show JOb tab */
function fnLoadJob(a) {
		//$("#showspecficjob").show();
	$("#showspecficjob").load("index.php","controller=corporatecontroller&url=showSpecficJob&jobId="+a);
	$("#showslot").hide();
	$("#backjob").show();
}
function fnBackJob() {
	$("#showslot").show();
	$("#backjob").hide();
	$("#showspecficjob").html("");
}
function fnOnLoadJobs() {
		$("#backjob").hide();
}
