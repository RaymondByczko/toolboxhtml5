<html>
<head>
<title>Lunarrays Astronomy App</title>

<script type="text/javascript" src="../jscr/doAstronomy.js"></script>
<script type="text/javascript" src="../jquery/jquery-1.7.2.js"></script>
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
<input type="button" id="computeNumberFOV_id" onclick="computeNFOV();"  value="Compute (FOV) RA and DA"/>
</div>


<div id=output_id  style='position: absolute; top: 240px; left:0px; width:400px; height: 80px'>

<div align="center" style='position: absolute; top: 0px; left: 0px; width: 400px; height: 25px'>
FOV distances between space object 1 and space object 2
</div>

<div style='position: absolute; top: 80px; left: 0px; width: 180px; height: 20px'>
RA (fov)<input type="text" size=8 maxlength=8 id="rafov_id" />
</div>



<script language="JavaScript" type="text/javascript">

// var import locateAstronomy;

// var laObj = new locateAstronomy();
// var da = require("da");
// var d = da.done();
// Components.utils.imports('../jscr/doAstronomy.js');

// Components.utils.import('resource://../jscr/doAstronomy.js');
// var doa = require("./jscr/doAstronomy");
function computeNFOV()
{
	// import da.locateAstronomy;
	window.alert("Hi from compute");

	// var doa = require("./jscr/doAstronomy");
	var laObj = new LocateAstronomy();
	var h1 = 14;
	var m1 = 1;
	var s1 = 0;

	var h2 = 14;
	var m2 = 34;
	var s2 = 0;

	var fieldViewDegreesEyepiece = 68.0;
	var flTele = 633.0;
	var flEyepiece = 13.0;
	var barlowMag = 2.5;

	var numFOV = laObj.numberFieldOfView(h1, m1, s1, h2, m2, s2, fieldViewDegreesEyepiece, flTele, flEyepiece, barlowMag);
	$('#rafov_id').val(numFOV);
}


window.onload = function() { 
	// $('#computeNumberFOV_id').click(computeNFOV);
}

</script>


</body>
</html>


