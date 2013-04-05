<div id="midpanel">
	<br /> <br />
	<div id="buzz">
		<div id="abc"></div>
		<form action="" method="get">
			Upadte Status
			<div id="statusUp" name="statusUp" class="uparrowdiv">
				<textarea rows="2" cols="68" placeholder="Wanna say something..."
					id="buzztext" name="buzztext"></textarea>
				<input type=hidden value=buzz name=url> <input type=hidden
					value=status name=controller><br> <input type="submit"
					onclick="return false" value="BUZZ" id="subuzz" name=submit>
			</div>
		</form>

		<div id="statusShow" name="statusShow">
			<div id="commentShow"></div>
		</div>
	</div>
</div>
<!-- END OF MID2 -->
<script>
$("#buzztext").click(function()
{
$("#subuzz").show();
$("#statusUp").css("height","60px");

}
);

</script>