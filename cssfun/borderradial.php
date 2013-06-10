<!-- @company self -->
<!-- @author Raymond Byczko -->
<!-- @file toolboxhtml5/cssfun/borderradial.php -->
<!-- @start_date 2013-05-20 May 20 -->
<!-- @purpose To learn CSS for chromium and firefox, especially radial -->
<!-- functions, with border-radius usage.  -->
<!-- @note Most of the style is indicated outside of the tag.
     The position is indicated in the tag.  I find this useful. -->
<!-- @note Tested in Firefox 20 (OK). Test in Chromium 25.0.1364.160 (OK) -->
<!-- @change_history self-RByczko, 2013-06-10 June 10, Added Back button. -->
<html>
<head>
<style type="text/css">
div#aquagreenradial {
width: 100px;
height: 100px;
border-radius: 10%;
background: -webkit-radial-gradient(aqua, green);
background: radial-gradient(aqua, green)
}

div#redyellowradial {
width: 100px;
height: 100px;
border-radius: 20%;
background: -webkit-radial-gradient(red, yellow);
background: radial-gradient(red, yellow)
}

div#blackwhiteradial {
width: 100px;
height: 100px;
border-radius: 30%;
background: -webkit-radial-gradient(black, white);
background: radial-gradient(black, white)
}

div#purpleblueradial {
width: 100px;
height: 100px;
border-radius: 40%;
background: -webkit-radial-gradient(purple, blue);
background: radial-gradient(purple, blue)
}

div#blackgreenradial {
width: 100px;
height: 100px;
border-radius: 50%;
background: -webkit-radial-gradient(black, green);
background: radial-gradient(black, green)
}

div#navygreenradial {
width: 100px;
height: 100px;
border-radius: 75%;
background: -webkit-radial-gradient(navy, green);
background: radial-gradient(navy, green)
}

div#backbutton {
position: absolute;
left: 100px;
top: 300px;
width: 100px;
height: 20px;
text-align: center;
border: blue double 2px
}

</style>
</head>
<body>
<div id=aquagreenradial style="position: absolute; left: 0px; top: 0px">
</div>
<div id=redyellowradial style="position: absolute; left: 100px; top: 0px">
</div>
<div id=blackwhiteradial style="position: absolute; left: 200px; top: 0px">
</div>
<div id=purpleblueradial style="position: absolute; left: 0px; top: 100px">
</div>
<div id=blackgreenradial style="position: absolute; left: 100px; top: 100px">
</div>
<div id=navygreenradial style="position: absolute; left: 200px; top: 100px">
</div>
<?php
	if (isset($_SERVER['HTTP_REFERER']))
	{
		$srcPage = $_SERVER['HTTP_REFERER'];
?>
		<div id=backbutton>
			<a href="<?php echo $srcPage; ?>">Back</a>
		</div>
<?php
	}
?>

</body>
</html>
