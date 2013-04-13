<div id="bigmid">

<div id="showfrnddiv" class="fontsize16"><br><?php echo FRND_MESSAGE; ?><br></div><br><br>
	
	<br>
	<div id="msgbox">
	
	<img id="imgpr" src=<?php echo ROOTPATH."data/rcs/profile.jpg"; ?> height="75px" width="75px" class="ui-state-default" alt="" />
	<input id="tags" placeholder="Search Friend" class="floatr marginr10 round5" >
	<input type='hidden' name='f' id='friendz' value= > 	
 <br><br><textarea id="message_text" name="message_text" placeholder="Type your message here" row="3" cols="45"></textarea> 
<br><br> <a id="backmsg" href=<?php echo ROOTPATH."user/messages"; ?> >Back to messages</a>
<button id="submitmessage"  onclick="insertMessage()"><?php echo SEND_MESSAGE;?></button>
</div>
</div>

  <script>
  $(function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
    $( "#tags" ).autocomplete({
      source: "http://localhost/probuzz/trunk/user/loadc",
      minLength: 1,
      select: function( event, ui ) {
        log( ui.item ?
          "Selected: " + ui.item.value + " aka " + ui.item.id :
          "Nothing selected, input was " + this.value );
        $( "#friendz" ).val( ui.item.id );
       
        $( "#imgpr" ).attr( "src", ui.item.path );
      }
    });
  });
  
</script>