<div id="messagepanel">
</div>
<div id="showmessage"></div>
<div id="messagetext">
<div id="sendmessage">
<textarea id="message_text" name="message_text" ></textarea>
<button id="submitmessage" onclick="insertMessage()"></button>
</div>
</div>
<div id="insert">
</div>	
<script>
setInterval(showMessage,1000);
setInterval (showSender, 2500);

</script>