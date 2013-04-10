<div id="bigmid">
<
	<input id="tags">
	<input id="tags1">
	<input type='hidden' name='f' id='friendz' value= >"
	<img id="imgpr" src="images/transparent_1x1.png" class="ui-state-default" alt="" />
 	<textarea id="message_text" name="message_text"></textarea> 
 	<button id="submitmessage" onclick="insertMessage()"><?php echo SEND_MESSAGE;?></button>

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
          $( "#tags1" ).val( ui.item.id );
        $( "#imgpr" ).attr( "src", ui.item.path );
      }
    });
  });
  
</script>