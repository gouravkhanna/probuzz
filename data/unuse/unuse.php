
		<div id=spdqualification>
			<label id=lxqualification><?php echo QUALIFICATION?></label> <select
				id=spqualification name=spqualification[] multiple="multiple">
				<option></option>
				<option><?php echo HIGHSCHOOL;?></option>
				<option><?php echo INTERMEDIATE;?></option>
				<option><?php echo GRADUATE;?></option>
				<option><?php echo POSTGRADUATE;?></option>
				<option><?php echo MASTERS;?></option>
				<option><?php echo DOCTORATE;?></option>
				<option value="other"><?php echo IFOTHER;?></option>
			</select>
		</div>
		
		<style>

<script type="text/javascript">
	
	//updateStatusJobAjax();
	//prejob.php
/*	function updateStatusJobAjax(status,jobId)
	{
		$.ajax({ 
     	 type: "GET",
      	 url: 'index.php',                  //the script to call to get data          
      	 data:'controller=corporatecontroller&url=updateStatusJob&status='+status+'&jobId='+jobId,
    	//data: $('#frmVote').serialize(),
     
     beforeSend: function() {
      	  
        },
        success: function(data){ 
       	     //$("#showAllSlot").append(data);
       	     $("#showAllSlot").load("index.php","url=showAllJobs");	
       	    return false;
       },

      
    });
	} */
</script>