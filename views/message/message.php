<div id="bigmid">
<div id="dvmessaging">
	<div id="messagepanel" class=round20></div>
<a href="<?php echo ROOTPATH."user/createMessage"; ?>" > CREATE A MESSAGE </a> 
		<div id="showmessage"></div>
	<div id="messagetext">
		<div id="sendmessage">
			<textarea id="message_text" name="message_text"></textarea>
			<button id="submitmessage" onclick="insertMessage()">SEND A MESSAGE</button>
		</div>
	</div>
	<div id="insert"></div>
</div>
</div>
<script>


setInterval(showMessage,1000);
setInterval (showSender, 2500);

</script>