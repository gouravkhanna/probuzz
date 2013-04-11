<div id="bigmid">
<div id="dvmessaging">
<?php echo "<div id='showfrnddiv'><h1>" .MESSAGE." </h1><br><br></div> "; ?>
	<div id="messagepanel" class=round20></div>
<a href="<?php echo ROOTPATH."user/createMessage"; ?>" > <?php echo CREATE_MESSAGE;?></a> 
		<div id="showmessage"></div>
	<div id="messagetext">
	<br>
		<div id="sendmessage">
			<center><textarea id="message_text" name="message_text" class="marginr10" placeholder="Type your message here"></textarea></center>
			<button id="submitmessage" onclick="insertMessage()"><?php echo SEND_MESSAGE;?></button>
		</div>
	</div>
	<div id="insert"></div>
</div>
</div>
<script>


setInterval(showMessage,1000);
setInterval (showSender, 2500);

</script>