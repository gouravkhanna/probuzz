// JavaScript Document
function onlySpacesA(input,msg) {
	input="#"+input;
	str=$(input).val();
	temp=str.replace(/\s/g,"");
	if(temp.length<1) {
		$(input).css("background-color","#cff993");
		$(input).val('');
		$(input).attr("placeholder",msg);
		$(input).focus();
		return true;
	   }  else {
			 return false;
	}
}

function correctDate(input,msg) {
    input="#"+input;
    str=$(input).val();
    reg=/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/;
    if(!reg.test(str)) {        
	$(input).css("background-color","#cff993");
	$(input).val('');
	$(input).attr("placeholder",msg);
	$(input).focus();
	return false;
   
    }  else {
	return true;
    }
}
$(document).ready(function(e) {
    
    /*Menu Toggle*/
    $("#gallerymenu").click(function(){ 
        $("#gallerymenudiv").slideToggle("slow");
    });
	/*jobs.php*/
   function filterWhiteSpace(input) {
        input="#"+input;
        str=$(input).val();
        $(input).val(str.replace(/\s\s+/g," "));
   }
  function dateDifference1(input1,input2,msg) {
        input1="#"+input1;
        input2="#"+input2;
        start=$(input1).val();
        end=$(input2).val();
        diff=(new Date(end).getTime()-new Date(start).getTime())/(1000 * 3600 * 24);
        if(diff>0) {
            return true;
        } else {
            $(input2).css("background-color","#cff993");
            $(input2).val('');
            $(input2).attr("placeholder",msg);
            $(input2).focus();
            return false;
        }
    }
  /*Create Job form validation*/
	$("#createjobform").submit(function(){
	    filterWhiteSpace("designation");
        filterWhiteSpace("location");
        filterWhiteSpace("role");
        filterWhiteSpace("experience");
        filterWhiteSpace("responsiblity");
        filterWhiteSpace("criteria");
        filterWhiteSpace("area_of_work");
        filterWhiteSpace("skills_required");
        filterWhiteSpace("contact_person");
        filterWhiteSpace("keywords");
        filterWhiteSpace("process_details");
        filterWhiteSpace("other_info");
        filterWhiteSpace("salary_range");

        
        if(onlySpacesA("designation","Designation Can't Be Empty.")==true) {
            return false;
        }
        if(onlySpacesA("start_date","Start Date Can't Be Empty")) {
            return false;
        }   
        
        if(!correctDate("start_date","Invalid Format For Start Date")) {
            return false;
        }
        if(!correctDate("last_date","Invalid Format For Last Date")) {
            return false;
        }
        if(onlySpacesA("last_date","Last Date Can't be empty")) {
            return false;
        }
        if(!dateDifference1("start_date","last_date","Last Date Can't Be Less Than Or Equal To Start Date.")) {
            return false;
        }
        if($("#phone_number").val().length<8 || $("#phone_number").val().length>12) {
            if($("#phone_number").val().length!=0) {
                setErrorMessage("#phone_number","Phone Number Must be Of 8-12 Digit")
                return false;
            }               
         }
        return true;
	});
	/*Alots slot form validation*/
    $("#formalotslot").submit(function(){
        filterWhiteSpace("designation");
        if(onlySpacesA("designation","Designation Can't Be Empty.")==true) {
            return false;
        }
       
        if(!$("#alotslotcheck").is(":checked")) {
            alert("You Must Accept TERMS AND CONDITION To Proceed.");
            return false;
        }
        return true;
    });
    /*Validation of Corporate PRofile*/
	$("#updateCorporateProfile").submit(function(){
	    filterWhiteSpace("company_name");
	    if(onlySpacesA("company_name","Company Name Can't Be Empty.")==true) {
            return false;
        }
	    if($("#phone_number").val().length<8 || $("#phone_number").val().length>12) {
	        if($("#phone_number").val().length!=0) {
	            setErrorMessage("#phone_number","Phone Number Must be Of 8-12 Digit")
	            return false;
	        }	            
	     }
	   return true;
	});
	

    
	$(".juiButton").button();
	
	$("#dvsearch").hide();
	$("#backjob").hide();
	$("#dabackbutton").hide();
	$( document ).tooltip();
	showSender();
	$("#sendmessage").hide();
	//setInterval (showMessage,1000);

	//Search Bar
	$("#searchbar").keyup(function(e){
		//if esc key is pressed
		if(e.which==27) {
			$("#dvsearch").slideUp();
			$("#searchbar").val('');
		}
		filterWhiteSpace("searchbar");
		var search=$("#searchbar").val();
		
		if(search=="" || search==" ")
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
		        		$("#dvsearchresult").html("<img src='http://localhost/probuzz/trunk/data/photo/load3.gif' alt='loading' >").end();		        	},
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
	
	
	
	/* JOBS>php*/
	$("#updateJobDiv input,#updateJobDiv textarea").focus(function(e) {
		n1="#fs"+e.target.id;
		$(n1).css("background-color","lightblue");
	//	$(n1).css("border","8px green solid");
	});
	$("#updateJobDiv input,#updateJobDiv textarea").blur(function(e) {
		n1="#fs"+e.target.id;
		$(n1).css("background-color","white");
	});
	
	
	/*SEarch JOb php*/ 
	$("#sjbackbutton").hide();
	$("#formsearchjob").submit(function(e){
		

			$.ajax({
		        url:'index.php', //window.location.pathname,
		        type: 'GET',
		        data: $(this).serialize()+'&url=showSearchJobs&controller=user',
		        	beforeSend:function(data){
		        		$("#sjsearchres").html("<img src='http://localhost/probuzz/trunk/data/photo/load3.gif' alt='loading' >");		    
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

});
var i=0;
function headrotate()
	{
		if(i==27) i=1;
		else i++;
		$("#head2").html("<img src='http://localhost/probuzz/trunk/data/header/h"+i+".jpg' height=245 />");
		$("#head2").css("text-align","center");
		$( "#head2" ).effect( "slide", "", 1500);//, callback );
	}
function fncreatejob()  {
    $("#mid").load("index.php","controller=corporatecontroller&url=createjobs");
    $("#midpanel").load("index.php","controller=corporatecontroller&url=createjobs");
}

/* FOR UPDATING STATUS i.e active to inactive and inactive to active  */
	function updateStatusJob(status,jobId) {
	var x="#buttonstatus"+jobId;
		$(x).html("<img src='data/photo/load5.gif' height=30 width=100>");
		$("#smsg").load("index.php","controller=corporatecontroller&url=updateStatusJob&status="+status+"&jobId="+jobId).fadeIn("fast").fadeOut(2000);	
		$("#showAllSlot").delay(1000).load("index.php","url=showAllJobs");
	}
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
    $("#showbuzzbackbtn").show();
    $("#topjobview").show();
    $("#topjobview").load("index.php","controller=corporatecontroller&url=showSpecficJob&jobId="+a+"&request_type=user");
    $("#buzz").hide();
}
function showbuzzback() {
    $("#showbuzzbackbtn").hide();
    $("#topjobview").hide();
    $("#buzz").show();
    
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
	$("#showspecficjob").load("index.php","controller=corporatecontroller&url=showSpecficJob&jobId="+a);
	$("#dvshowslot").hide();
	$("#showslot").hide();
	$("#backjob").show();
}
function fnBackJob() {
    $("#dvshowslot").show();
	$("#showslot").show();
	$("#backjob").hide();
	$("#showspecficjob").html("");
}
function fnOnLoadJobs() {
		$("#backjob").hide();
}
/*Send messege from user to reciver*/
function insertMessage() {
var message_text=$("#message_text").val();
	a=$("#friendz").val();
	if(onlySpacesA("message_text","Message Can't Be Empty.")==true) {
         return false;
     }
	$.ajax({
		type:"POST",
		url:'index.php',
		data: "controller=user&url=insertMessage&message_text="+message_text+"&friend_id="+a,
		  success: function(data){ 
			  $("#insert").html(data).fadeOut("slow");
			  $("#message_text").val("");
			  showMessage();
			  
		  }
	});
}
/*Display the list of the senders*/
function showSender() {
	
	$.ajax({
		type:"POST",
		url:'index.php',
		data: "controller=user&url=showSender",
		beforeSend:function(data){
    		$("#dvsearchresult").html("<img src='data/photo/load3.gif' alt='loading' >");		        	},
    	success: function(data){ 
			  $("#messagepanel").html(data);
			  
	  }
	});
	
}
/*Display the message of the particulkar user*/
function showMessage(a) {
	
	if(a==undefined) {
		a=$("#friendz").val();
	}
	if(a!=undefined && a!="") {
		$.ajax({
			type:"POST",
			url:'index.php',
			data: "controller=user&url=getMessage&friend_id="+a,
			beforeSend:function(data){
        		$("#dvsearchresult").html("<img src='data/photo/load3.gif' alt='loading' >");		        	},
        	
			success: function(data){ 
			  $("#showmessage").html(data);
			  $("#sendmessage").fadeIn();
			  $("#insert").load("index.php","controller=user&url=messageSeen&friend_id="+a);
	  
	}
	});
	}
}

/////////////////////////////////////////////////////////////
function jsCheckNumber(id) {
	if(id!=undefined) {
		var value=$("#"+id).val();
		if(isNaN(value)) {
			$("#"+id).css("background-color","#cff993");
			$("#"+id).val('');
			$("#"+id).attr('placeholder','Please Enter a Numeric Value');
			return false;
		}
		else {
			$("#"+id).css("background-color","white");
		}
	}
}
/////////////////////////////////////////////////////////////////
/**Handle The Subscription Request*/
function addSubscription(a){
  $("#divsubstatus").load("index.php","controller=subscribe&url=addSubscription&corp_id="+a);
  $("#subscriptionbtn").hide();
  $("#unsubscriptionbtn").show();
  
}
function removeSubscription(a){
  $("#divsubstatus").load("index.php","controller=subscribe&url=removeSubscription&corp_id="+a);
  $("#subscriptionbtn").show();
  $("#unsubscriptionbtn").hide();
 }
