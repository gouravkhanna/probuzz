// JavaScript Document
$(document).ready(function(e) {
 	//$("button,a,input[type=submit]").button();
	$(".juiButton").button();
	$("#head2").css("text-align","center");
	$("#head2").html("<img src='data/header/h26.jpg'  />");
	$("#dvsearch").hide();
	$("#backjob").hide();
	$("#dabackbutton").hide();
	$( document ).tooltip();
	showSender();
	setInterval(showMessage,1000);
	setInterval (showSender, 2500);
	$("#sendmessage").hide();
	//setInterval (showMessage,1000);
	
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
	/* Search People*/
	$("#searchoptbar").click(function(e){
		n=e.target.id;
		n1=n.split("lx");
		//alert(n1[1]);
		$("#spd"+n1[1]).slideToggle();
		
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
	/*textbox show on chekboz click (NOT DONE)*/
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
	
	
	/* JOBS>php*/
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
	
	
	/*SEarch JOb php*/ 
	$("#sjbackbutton").hide();
	$("#formsearchjob").submit(function(e){
		

			$.ajax({
		        url:'index.php', //window.location.pathname,
		        type: 'GET',
		        data: $(this).serialize()+'&url=showSearchJobs&controller=user',
		        	beforeSend:function(data){
		        		$("#sjsearchres").html("<img src='/data/photo/load3.gif' alt='loading' >");		    
					},
		        	success:function(data) {
		        			$("#sjsearchres").html(data).fadeIn("fast");
						
		        	},
			});
		});
	$("#sjbackbutton").click(function() {
		$("#sjsearchres").show();
		$("#sjjob").hide();
		$("#sjbackbutton").hide();
		$("#sjappstatus").hide();
		
	});
	
	/*Loading 	table on createjobs */
	$("#showAllSlot").load("index.php","url=showAllJobs");
	
	
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
	var x="#buttonstatus"+jobId;
		$(x).html("<img src='data/photo/load5.gif' height=30 width=100>");
		$("#smsg").load("index.php","controller=corporatecontroller&url=updateStatusJob&status="+status+"&jobId="+jobId).fadeIn("fast").fadeOut(5000).delay(1000);	
		$("#showAllSlot").delay(1000).load("index.php","url=showAllJobs");
		  
	}	
/*function updateStatusJob(status,jobId) {
	$("#smsg").load("index.php","controller=corporatecontroller&url=updateStatusJob&status="+status+"&jobId="+jobId,function(){
		$("#showAllSlot").load("index.php","url=showAllJobs");
		});	
	}*/
/*Load Jobs and status on display application*/ 
	function fnLoadJobUser2(a) {
		//check the status of the job and show button or message accordingly
		$("#sjappstatus").show();
		//load the details of the job the divison
		$("#sjjob").show();
		$("#sjjob").load("index.php","controller=corporatecontroller&url=showSpecficJob&jobId="+a+"&request_type=user");
		$("#sjsearchres").hide();
		$("#sjbackbutton").show();
		
	}
	
/* For Show JObs from  search for user $ searchjob.php*/
	function fnLoadJobSearch(a) {
		//check the status of the job and show button or message accordingly
		$("#sjappstatus").show();
		$("#sjappstatus").load("index.php","controller=user&url=loadAppStatus&jobId="+a);
		//load the details of the job the divison
		$("#sjjob").show();
		$("#sjjob").load("index.php","controller=corporatecontroller&url=showSpecficJob&jobId="+a+"&request_type=user");
		$("#sjsearchres").hide();
		$("#sjbackbutton").show();
		
	}
	/* Called when user Apply forparticular job */
	function fncapplyJob(a) {
		
		$("#sjappstatus").load("index.php","controller=user&url=applyJob&jobId="+a);
	}

/* For Show JOb from topJobs notifications */
function fnLoadJobUser(a) {
		//$("#showspecficjob").show();
	alert(a);
	$("#midpanel").load("index.php","controller=corporatecontroller&url=showSpecficJob&jobId="+a+"&request_type=user");
	//$("#showslot").hide();
	//$("#backjob").show();
}
/* get the applicants for the particular job in showapplicant*/
function fnLoadApplicants(a) {
	$("#dabackbutton").show();
	$("#dashowapplicant").show();
	$("#dashowapplicant").load("index.php","controller=corporatecontroller&url=getApplicant&jobId="+a);
	$("#daalljobs").hide();
}
function dabackbutton() {
	$("#dabackbutton").hide();
	$("#dashowapplicant").hide();
	$("#daalljobs").show();
}

/* For Show JOb tab */
function fnLoadJob(a) {
		//$("#showspecficjob").show();
	alert(a);
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

function insertMessage() {
var message_text=$("#message_text").val();
	a=$("#friendz").val();
	$.ajax({
		type:"POST",
		url:'index.php',
		data: "controller=user&url=insertMessage&message_text="+message_text+"&friend_id="+a,
		  success: function(data){ 
			  $("#insert").html(data);
			  $("#message_text").val("");
			  showMessage();
	  }
	});
}

function showSender() {
	
	$.ajax({
		type:"POST",
		url:'index.php',
		data: "controller=user&url=showSender",
		  success: function(data){ 
			  $("#messagepanel").html(data);
			  
	  }
	});
	
}
function showMessage(a) {
	
	if(a==undefined) {
		a=$("#friendz").val();
	}
	if(a!=undefined && a!="") {
		$.ajax({
			type:"POST",
			url:'index.php',
			data: "controller=user&url=getMessage&friend_id="+a,
			success: function(data){ 
			  $("#showmessage").html(data);
			  $("#sendmessage").fadeIn();
			  $("#insert").load("index.php","controller=user&url=messageSeen&friend_id="+a);
	  
	}
	});
	}
}
