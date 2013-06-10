<!-- @company self -->
<!-- @author Raymond Byczko -->
<!-- @file toolboxhtml5/cssfun/movedcenterradial.php -->
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
width: 200px;
height: 200px;
border-radius: 10%;
-webkit-animation: track-aqua-green;
-webkit-animation-duration: 1s;
-webkit-animation-iteration-count: 3;
background: -webkit-radial-gradient(10% 10%, aqua, green);
background: radial-gradient(10% 10%, aqua, green)
}

@-webkit-keyframes track-aqua-green {
0% {
background: -webkit-radial-gradient(10% 10%, aqua, green);
}
20% {
background: -webkit-radial-gradient(20% 20%, aqua, green);
}
40% {
background: -webkit-radial-gradient(30% 30%, aqua, green);
}
60% {
background: -webkit-radial-gradient(40% 40%, aqua, green);
}
80% {
background: -webkit-radial-gradient(50% 50%, aqua, green);
}
100% {
background: -webkit-radial-gradient(60% 60%, aqua, green);
}
}

div#redyellowradial {
width: 200px;
height: 200px;
border-radius: 20%;
background: -webkit-radial-gradient(66px 66px, red, yellow);
background: radial-gradient(66px 66px, red, yellow)
}

div#blackwhiteradial {
width: 200px;
height: 200px;
border-radius: 30%;
background: -webkit-radial-gradient(60% 60%, black, white);
background: radial-gradient(60% 60%, black, white)
}

div#purpleblueradial {
width: 200px;
height: 200px;
border-radius: 40%;
background: -webkit-radial-gradient(70% 70%, purple, blue);
background: radial-gradient(70% 70%, purple, blue)
}

div#blackgreenradial {
width: 200px;
height: 200px;
border-radius: 50%;
background: -webkit-radial-gradient(70% 30%, black, green);
background: radial-gradient(70% 30%, black, green)
}

div#navygreenradial {
width: 200px;
height: 200px;
border-radius: 50%;
background: -webkit-radial-gradient(30% 70%, navy, green);
background: radial-gradient(30% 70%, navy, green)
}

div#backbutton {
position: absolute;
left: 200px;
top: 450px;
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
<div id=redyellowradial style="position: absolute; left: 200px; top: 0px">
</div>
<div id=blackwhiteradial style="position: absolute; left: 400px; top: 0px">
</div>
<div id=purpleblueradial style="position: absolute; left: 0px; top: 200px">
</div>
<div id=blackgreenradial style="position: absolute; left: 200px; top: 200px">
</div>
<div id=navygreenradial style="position: absolute; left: 400px; top: 200px">
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
