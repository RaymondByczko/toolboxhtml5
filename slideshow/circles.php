<?php
/**
  * @author Raymond Byczko
  * @company self
  * @file toolboxhtml5/slideshow/circles.php
  * @start_date 2013-05-05 May 5
  * @purpose To demo keyframes, layers, and CSS3.
  * @note For images save as png.  In gimp, make sure to
  * add an alpha layer, select a region, and choose edit->clear.
  */
?>
<html>
<head>
<style type="text/css">
div.cscene {
border: 5px solid #feb515;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-image: url(/border.jpg) 5 5 stretch;
-moz-border-image: url(/border.jpg) 5 5 stretch;
}
#circle1 {
	-webkit-animation: track-scene1;
	-webkit-animation-duration: 4s;
	-webkit-animation-iteration-count: 2;
	-webkit-animation-play-state: paused;
}
#clipedge {
clip:rect(0px, 110px, 110px, 0px);
}
@-webkit-keyframes track-scene1 {
0% {
margin-top: 0px;
}
100% {
margin-top: 120px;
}
}

#circle2 {
	-webkit-animation: track-scene2;
	-webkit-animation-duration: 8s;
	-webkit-animation-iteration-count: 2;
	-webkit-animation-play-state: paused;
}
@-webkit-keyframes track-scene2 {
0% {
margin-left: 0px;
}
100% {
margin-left: 120px;
}
}

</style>
</head>
<body>
<div id="scene1" class="cscene" style="position: absolute; height: 110px; width: 110px; top: 0px; left: 0px" >
<layer id="layer1">
<div id="clipedge" style="position: absolute; top: 0px; left: 0px; height: 100px; width: 100px">
<div id="circle1" style="position:absolute; height: 10px; width: 10px">
<img src="/circle.jpg"/>
</div>
</div>
</layer>
<layer id="layer2">
<div id="clipedge" style="position: absolute; top: 0px; left: 0px; height: 100px; width: 100px">
<div id="circle2" style="position:absolute; height: 10px; width: 10px">
<img src="/bcircle.jpg"/>
</div>
</div>
</layer>
</div>
<script>
function startanimation()
{
	document.getElementById("circle1").style.webkitAnimationPlayState = 'paused';
	document.getElementById("circle2").style.webkitAnimationPlayState = 'paused';
	document.getElementById("circle1").style.webkitAnimationPlayState = 'running';
	document.getElementById("circle2").style.webkitAnimationPlayState = 'running';
}
</script>
<div id="buttonstart" style="position: absolute; left: 0px; top: 125px">
<button onclick="startanimation();">Start</button>
<script>
</div>
</body>
</html>
