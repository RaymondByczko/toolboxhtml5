<!-- @company self -->
<!-- @author Raymond Byczko -->
<!-- @file toolboxhtml5/cssfun/rainbow.php -->
<!-- @start_date 2013-05-15 May 15 -->
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
div#rainbowbox {
width: 100px;
height: 200px;
background: -webkit-linear-gradient(aqua, green);
background: linear-gradient(aqua, blue)
}

div#allrainbowbox {
width: 100px;
height: 200px;
background: -webkit-linear-gradient(red, yellow, orange, green, blue, purple);
background: linear-gradient(red, yellow, orange, green, blue, purple)
}

div#blackwhite {
width: 100px;
height: 200px;
background: -webkit-linear-gradient(left, black, white);
background: linear-gradient(to right, black, white)
}

div#tiltedsunset {
width: 100px;
height: 200px;
background: -webkit-linear-gradient(20deg, yellow, blue);
background: linear-gradient(70deg, yellow, blue)
}

</style>
</head>
<body>
<div id=rainbowbox>
</div>
<div id=allrainbowbox style="position: absolute; left: 150px; top: 50px">
</div>
<div id=blackwhite style="position: absolute; left: 300px; top: 100px">
</div>
<div id=tiltedsunset style="position: absolute; left: 450px; top: 150px">
</div>

</body>
</html>
