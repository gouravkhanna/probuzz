
<html lang="en">
<head>
<meta charset="utf-8" />
<title>jQuery UI Tabs - Tabs at bottom</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="f2.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#tabs" ).tabs();
// fix the classes
$( ".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav > *" )
.removeClass( "ui-corner-all ui-corner-top" )
.addClass( "ui-corner-bottom" );
// move the nav to the bottom
$( ".tabs-bottom .ui-tabs-nav" ).appendTo( ".tabs-bottom" );
});
</script>
<style>
/* force a height so the tabs don't jump as content height changes */
#tabs .tabs-spacer { float: left; height: 200px; }
.tabs-bottom .ui-tabs-nav { clear: left; padding: 0 .2em .2em .2em; }
.tabs-bottom .ui-tabs-nav li { top: auto; bottom: 0; margin: 0 .2em 1px 0; border-bottom: auto; border-top: 0; }
.tabs-bottom .ui-tabs-nav li.ui-tabs-active { margin-top: -1px; padding-top: 1px; }
</style>
</head>
<body>

<div id="tabs" class="tabs-bottom">
<ul>
<li><a href="#tabs-1">My Personal Stuff</a></li>
<li><a href="#tabs-4">My Contact Details</a></li>
<li><a href="#tabs-2">My Favourites</a></li>
<li><a href="#tabs-3">About My Self</a></li>

</ul>
<div class="tabs-spacer"></div>
		<div id="tabs-1">
		First Name  <input type="text" id="first_name" name="first_name"><br>
		Last Name    <input type="text" id="last_name" name="last_name"><br>
		Email      <input type="text" id="e" name="e"><br>
		Contact No <input type="text" id="phone" name="phone"><br>
		<input type="submit" id="update" name="update" value="SAVE">
		
		</div>
		<div id="tabs-2">	
		
		My Favourite Books    <input type="text" id="book" name="book"><br>
		My Favourite Movies    <input type="text" id="movie" name="movie"><br>
		My Favourite Cusine <input type="text" id="food" name="food"><br>
		<input type="submit" id="update" name="update" value="SAVE">
		
		
		
         </div>
 		<div id="tabs-4">
		
		House Number <input type="text" id="house" name="house"><br>
		Street Name  <input type="text" id="street" name="street"><br>
		City   <input type="text" id="city" name="city"> <br> pincode <input type="text" id="pincode" name="pincode"><br>
		State <input type="text" id="state" name="state"><br>
		Country <input type="text" id="country" name="country"><br>
		<input type="submit" id="update" name="update" value="SAVE">
		
		</div>
		<div id="tabs-3">
		
		Relationship Status <input type="text" id="relationship" name="relationship"><br>
		Intersted In  <input type="text" id="interstedIn" name="interstedIn"><br>
		About Me <textarea rows="5" cols="30"></textarea>
		<br>
		<input type="submit" id="update" name="update" value="SAVE">
		
		</div>
		</div>
</body>
</html>
