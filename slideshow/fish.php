<?php
/**
  * @author Raymond Byczko
  * @company self
  * @file toolboxhtml5/slideshow/fish.php
  * @start_date 2013-05-07 May 7
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
#fish {
	-webkit-animation: track-scene-fish;
	-webkit-animation-duration: 6s;
	-webkit-animation-iteration-count: 2;
	-webkit-animation-play-state: paused;
	animation: track-scene-fish;
	animation-duration: 6s;
	animation-iteration-count: 2;
	animation-play-state: paused;
	z-index: 20;
}
#clipedge {
clip:rect(0px, 110px, 110px, 0px);
}
@-webkit-keyframes track-scene-fish {
0% {
margin-left: -100px;
}
100% {
margin-left: 0px;
}
}

@-moz-keyframes track-scene-fish {
0% {
margin-left: -100px;
}
100% {
margin-left: 0px;
}
}

#bubble {
	-webkit-animation: track-scene-bubble;
	-webkit-animation-duration: 8s;
	-webkit-animation-iteration-count: 2;
	-webkit-animation-play-state: paused;
	-moz-animation: track-scene-bubble;
	-moz-animation-duration: 8s;
	-moz-animation-iteration-count: 2;
	-moz-animation-play-state: paused;
	z-index: 10;
}
@-webkit-keyframes track-scene-bubble {
0% {
margin-top: 120px;
margin-left: 50px;
}
100% {
margin-top: -20px;
margin-left: 50px;
}
}

@-moz-keyframes track-scene-bubble {
0% {
margin-top: 120px;
margin-left: 50px;
}
100% {
margin-top: -20px;
margin-left: 50px;
}
}


#bubbleX3 {
	-webkit-animation: track-scene-bubbleX3;
	-webkit-animation-duration: 16s;
	-webkit-animation-iteration-count: 2;
	-webkit-animation-play-state: paused;
	-moz-animation: track-scene-bubbleX3;
	-moz-animation-duration: 16s;
	-moz-animation-iteration-count: 2;
	-moz-animation-play-state: paused;
	z-index: 5;
}

@-webkit-keyframes track-scene-bubbleX3 {
0% {
margin-top: 120px;
margin-left: 80px;
}
100% {
margin-top: -20px;
margin-left: 80px;
}
}

@-moz-keyframes track-scene-bubbleX3 {
0% {
margin-top: 120px;
margin-left: 80px;
}
100% {
margin-top: -20px;
margin-left: 80px;
}
}

</style>
</head>
<body>
<div id="scene1" class="cscene" style="position: absolute; height: 110px; width: 110px; top: 0px; left: 0px" >

<layer id="layer3">
<div id="clipedge" style="position: absolute; top: 0px; left: 0px; height: 100px; width: 100px">
<div id="bubbleX3" style="position:absolute; height: 20px; width: 20px">
<img src="/bubblesX3.png"/>
</div>
</div>
</layer>
<layer id="layer1">
<div id="clipedge" style="position: absolute; top: 0px; left: 0px; height: 100px; width: 100px">
<div id="fish" style="position:absolute; height: 10px; width: 10px">
<img src="/tunahead2.png"/>
</div>
</div>
</layer>
<layer id="layer2">
<div id="clipedge" style="position: absolute; top: 0px; left: 0px; height: 100px; width: 100px">
<div id="bubble" style="position:absolute; height: 10px; width: 10px">
<img src="/bcircle.jpg"/>
</div>
</div>
</layer>
</div>
<script>
function startanimation()
{
	document.getElementById("fish").style.animationPlayState = 'running';
	document.getElementById("fish").style.webkitAnimationPlayState = 'running';
	document.getElementById("bubble").style.animationPlayState = 'running';
	document.getElementById("bubble").style.webkitAnimationPlayState = 'running';
	document.getElementById("bubbleX3").style.animationPlayState = 'running';
	document.getElementById("bubbleX3").style.webkitAnimationPlayState = 'running';
}
</script>
<div id="buttonstart" style="position: absolute; left: 0px; top: 125px">
<button onclick="startanimation();">Start</button>
<script>
</div>
</body>
</html>
