<html>
<head>
<style type="text/css">
div.cscene {
border: 5px solid #feb515;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-image: url(/images/border.jpg) 5 5 stretch;
-moz-border-image: url(/images/border.jpg) 5 5 stretch;
}
#circle1 {
	-webkit-animation: track-scene1;
	-webkit-animation-duration: 4s;
	-webkit-animation-iteration-count: 2;
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
<div id="scene1" class="cscene" style="position: absolute; height: 110px; width: 110px" >
<layer id="layer1">
<div id="clipedge" style="position: absolute; top: 0px; left: 0px; height: 100px; width: 100px">
<div id="circle1" style="position:absolute; height: 10px; width: 10px">
<img src="/images/circle.jpg"/>
</div>
</div>
</layer>
<layer id="layer2">
<div id="clipedge" style="position: absolute; top: 0px; left: 0px; height: 100px; width: 100px">
<div id="circle2" style="position:absolute; height: 10px; width: 10px">
<img src="/images/bcircle.jpg"/>
</div>
</div>
</layer>
</div>
<div id="scene2" class="cscene" >
</div>
<div id="scene3" class="cscene" >
</div>
<p>This is the index.php of slideshow.
</body>
</html>
