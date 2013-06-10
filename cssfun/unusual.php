<!-- @company self -->
<!-- @author Raymond Byczko -->
<!-- @file toolboxhtml5/cssfun/unusual.php -->
<!-- @start_date 2013-05-15 May 15 -->
<!-- @change_history 2013-05-29 May 29; RByczko; Added Back button, but -->
<!-- only if referrer is present. -->
<!-- @purpose To learn CSS for chromium and firefox.  -->
<!-- @note For linear gradient, left to right, see:  -->
<!--
https://developer.mozilla.org/en-US/docs/Web/Guide/CSS/Using_CSS_gradients
-->
<!-- @note Most of the style is indicated outside of the tag.
     The position is indicated in the tag.  I find this useful. -->
<!-- @note Tested in Firefox 20 (OK). Test in Chromium 25.0.1364.160 (OK) -->
<html>
<head>
<style type="text/css">
div#aquabox {
width: 100px;
height: 200px;
background: -webkit-linear-gradient(left, aqua, green 10%, green 90%, aqua);
background: linear-gradient(to right, aqua, green 10%, green 90%, aqua)
}

div#redbox {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, red, yellow 20%, yellow 80%, red);
background: linear-gradient(to right, red, yellow 20%, yellow 80%, red)
}

div#blackbox {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, black, white 20%, white 80%, black);
background: linear-gradient(to right, black, white 20%, white 80%, black)
}

div#purplebox {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, purple, red 20%, red 80%, purple);
background: linear-gradient(to right, purple, red 20%, red 80%, purple)
}

div#tiltedsunset {
width: 100px;
height: 200px;
background: -webkit-linear-gradient(20deg, yellow, blue);
background: linear-gradient(70deg, yellow, blue)
}


div#backbutton {
position: absolute;
left: 220px;
top: 380px;
width: 100px;
height: 20px;
text-align: center;
border: blue double 2px
}

</style>
</head>
<body>
<div id=aquabox>
</div>
<div id=redbox style="position: absolute; left: 150px; top: 50px">
</div>
<div id=blackbox style="position: absolute; left: 150px; top: 90px">
</div>
<div id=purplebox style="position: absolute; left: 150px; top: 130px">
</div>
<div id=tiltedsunset style="position: absolute; left: 450px; top: 150px">
</div>
<?php
	if (isset($_SERVER['HTTP_REFERER']))
	{
		$srcPage = $_SERVER['HTTP_REFERER'];
?>
	<!--<div id=back style="position: absolute; left: 10px; top: 400px; border: blue double 2px">-->
		<div id=backbutton>
			<a href="<?php echo $srcPage; ?>">Back</a>
		</div>
<?php
	}
?>
</body>
</html>
