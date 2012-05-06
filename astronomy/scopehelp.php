<html>
<head>
<title>Lunarrays Astronomy App</title>
<link rel=stylesheet href=css/s_gen_styles_scopehelp.css type=text/css>
<script language="JavaScript" type="text/javascript" src="jscr/doAstronomy.js"></script>
</head>
<body>



<div id=spaceobject1_id style='position: absolute; top: 0px; left:0px; width:400px; height: 80px'>

<div align="center" style='position: absolute; top: 0px; left: 0px; width: 400px; height: 40px'>
Enter coordinates for space object 1
</div>

<div style='position: absolute; top: 40px; left: 0px; width: 130px; height: 20px'>
Hours<input type="text" size=2 maxlength=2 id="h1_id" />
</div>
<div style='position: absolute; top: 40px; left: 130px; width: 130px; height: 20px'>
Minutes<input type="text" size=2 maxlength=2 id="m1_id" align="right" />
</div>
<div style='position: absolute; top: 40px; left: 260px; width: 130px; height: 20px'>
Seconds<input type="text" size=2 maxlength=2 id="s1_id" />
</div>

</div>




<div id=spaceobject2_id style='position: absolute; top: 80px; left:0px; width:400px; height: 80px'>


<div align="center" style='position: absolute; top: 0px; left: 0px; width: 400px; height: 40px'>
Enter coordinates for space object 2
</div>


<div style='position: absolute; top: 40px; left: 0px; width: 130px; height: 20px'>
Hours<input type="text" size=2 maxlength=2 id="h2_id" />
</div>
<div style='position: absolute; top: 40px; left: 130px; width: 130px; height: 20px'>
Minutes<input type="text" size=2 maxlength=2 id="m2_id" />
</div>
<div style='position: absolute; top: 40px; left: 260px; width: 130px; height: 20px'>
Seconds<input type="text" size=2 maxlength=2 id="s2_id" />
</div>

</div>


<div id=controls_id align="center" style='position: absolute; top: 160px; left:0px; width:400px; height: 80px'>
<input type="button" id="computeNumberFOV_id" value="Compute (FOV) RA and DA"/>
</div>
<div id=header_id style='position: absolute; top:80px; left:80px; width:400px; height: 50px'>
<script language="JavaScript" type="text/javascript" src="/jscr/jquery-1.4.4.js"></script>
<script language="JavaScript" type="text/javascript" >

// successFunction: the callback used for the PHP source and for CSS.
function successFunction(msg)
{
	$('#textarea_id').html(msg);;
};

function getSourceEvent()
{
	$.ajax({
		type: "POST",
		url: "s_first.php",
		data: "retrievephpsource=1",
		success: successFunction
	});
}


function getCSSEvent()
{
	$.ajax({
		type: "POST",
		url: "s_first.php",
		data: "retrievecss=1",
		success: successFunction
	});
}

function computeNFOV()
{
	var laObj = new locateAstronomy();
	h1 = 14;
	m1 = 1;
	s1 = 0;

	h1 = 14;
	m1 = 34444;
	s1 = 0;


	laObj.numberFieldOfView(h1, m1, s1, h2, m2, s2, fieldViewDegreesEyepiece, flTele, flEyepiece, barlowMag);
}


window.onload = function() { 
	$('#computeNumberFOV_id').click(computeNFOV);
}

</script>


</body>
</html>


