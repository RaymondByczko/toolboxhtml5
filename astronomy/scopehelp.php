<html>
<head>
<title>Lunarrays Astronomy App</title>

<script type="text/javascript" src="../jscr/doAstronomy.js"></script>
<script type="text/javascript" src="../jquery/jquery-1.7.2.js"></script>
</head>
<body>



<div id=spaceobject1_id style='position: absolute; top: 0px; left:0px; width:800px; height: 160px'>

<div align="center" style='position: absolute; top: 0px; left: 0px; width: 400px; height: 40px'>
Enter coordinates for space object 1
</div>
<div style='position: absolute; top: 40px; left: 0px; width: 180px; height: 15px'>
<form>
<select id=selSpaceObject1_id name="selSpaceObject1" size="1">
<option value="4">Sirius</option>
<option value="5">Rigel</option>
<option value="6">AlphaC</option>
</select>
</form>
</div>

<div style='position: absolute; top: 70px; left: 0px; width: 180px; height: 20px'>
Hours (RA)<input type="text" size=2 maxlength=2 id="h1ra_id" />
</div>
<div style='position: absolute; top: 70px; left: 180px; width: 180px; height: 20px'>
Min (RA)<input type="text" size=2 maxlength=2 id="m1ra_id" align="right" />
</div>
<div style='position: absolute; top: 70px; left: 360px; width: 180px; height: 20px'>
Sec (RA)<input type="text" size=5 maxlength=5 id="s1ra_id" />
</div>



<div style='position: absolute; top: 100px; left: 0px; width: 180px; height: 20px'>
Deg (DEC)<input type="text" size=2 maxlength=2 id="d1dec_id" />
</div>
<div style='position: absolute; top: 100px; left: 180px; width: 180px; height: 20px'>
Min (DEC)<input type="text" size=2 maxlength=2 id="m1dec_id" align="right" />
</div>
<div style='position: absolute; top: 100px; left: 360px; width: 180px; height: 20px'>
Sec (DEC)<input type="text" size=5 maxlength=5 id="s1dec_id" />
</div>

</div>




<div id=spaceobject2_id style='position: absolute; top: 190px; left:0px; width:400px; height: 160px'>


<div align="center" style='position: absolute; top: 0px; left: 0px; width: 400px; height: 40px'>
Enter coordinates for space object 2
</div>

<div style='position: absolute; top: 40px; left: 0px; width: 180px; height: 15px'>
<form>
<select name="selSpaceObject2" size="1">
<option value="1">Regulus</option>
<option value="2">Vega</option>
<option value="3">Kochab</option>
</select>
</form>
</div>

<div style='position: absolute; top: 70px; left: 0px; width: 180px; height: 20px'>
Hours (RA)<input type="text" size=2 maxlength=2 id="h2ra_id" />
</div>
<div style='position: absolute; top: 70px; left: 180px; width: 180px; height: 20px'>
Min (RA)<input type="text" size=2 maxlength=2 id="m2ra_id" />
</div>
<div style='position: absolute; top: 70px; left: 360px; width: 180px; height: 20px'>
Sec (RA)<input type="text" size=5 maxlength=5 id="s2ra_id" />
</div>


<div style='position: absolute; top: 100px; left: 0px; width: 180px; height: 20px'>
Deg (DEC)<input type="text" size=2 maxlength=2 id="d2dec_id" />
</div>
<div style='position: absolute; top: 100px; left: 180px; width: 180px; height: 20px'>
Min (DEC)<input type="text" size=2 maxlength=2 id="m2dec_id" align="right" />
</div>
<div style='position: absolute; top: 100px; left: 360px; width: 180px; height: 20px'>
Sec (DEC)<input type="text" size=5 maxlength=5 id="s2dec_id" />
</div>

</div>


<div id=controls_id align="center" style='position: absolute; top: 350px; left:0px; width:800px; height: 80px'>

<div style='position: absolute; top: 0px; left: 0px; width: 200px; height: 25px'>
Eyepiece FOV<input type="text" size=4 maxlength=4 id="eyefov_id" />
</div>
<div style='position: absolute; top: 0px; left: 200px; width: 200px; height: 25px'>
Eyepiece FL<input type="text" size=4 maxlength=4 id="eyefl_id" align="right" />
</div>
<div style='position: absolute; top: 25px; left: 0px; width: 200px; height: 25px'>
Barlow Mag<input type="text" size=4 maxlength=4 id="barmag_id" align="right" />
</div>
<div style='position: absolute; top: 25px; left: 200px; width: 200px; height: 25px'>
Tele FL<input type="text" size=4 maxlength=4 id="telefl_id" align="right" />
</div>
<div align="center" style='position: absolute; top: 55px; left: 0px; width: 200px; height: 20px'>
<input align="center" type="button" id="computeNumberFOV_id" onclick="computeNFOV();"  value="Compute (FOV) RA and DA"/>
</div>

</div>


<div id=output_id  style='position: absolute; top: 430px; left:0px; width:800px; height: 80px'>

<div align="center" style='position: absolute; top:20px; left: 0px; width:500px; height: 25px'>
FOV distances between space object 1 and space object 2
</div>

<div style='position: absolute; top: 50px; left: 0px; width: 180px; height: 20px'>
RA (fov)<input type="text" size=8 maxlength=8 id="rafov_id" />
</div>
<div style='position: absolute; top: 50px; left: 180px; width: 180px; height: 20px'>
DEC (fov)<input type="text" size=8 maxlength=8 id="decfov_id" />
</div>



<script language="JavaScript" type="text/javascript">

function computeNFOV()
{
	window.alert("Hi from compute");

	var laObj = new LocateAstronomy();
	var h1ra = $('#h1ra_id').val();;
	var m1ra = $('#m1ra_id').val();
	var s1ra = $('#s1ra_id').val();

	var h2ra = $('#h2ra_id').val();
	var m2ra = $('#m2ra_id').val();
	var s2ra = $('#s2ra_id').val();


	var d1dec = $('#d1dec_id').val();;
	var m1dec = $('#m1dec_id').val();
	var s1dec = $('#s1dec_id').val();

	var d2dec = $('#d2dec_id').val();
	var m2dec = $('#m2dec_id').val();
	var s2dec = $('#s2dec_id').val();

	// var fieldViewDegreesEyepiece = 60.0;

	var fieldViewDegreesEyepiece = $('#eyefov_id').val();
	// var flTele = 633.0;
	var flTele = $('#telefl_id').val();
	// var flEyepiece = 40.0;
	var flEyepiece = $('#eyefl_id').val();
	// var barlowMag = 1.0;
	var barlowMag = $('#barmag_id').val();

	var numFOVra = laObj.numberFieldOfViewRA(h1ra, m1ra, s1ra, h2ra, m2ra, s2ra, fieldViewDegreesEyepiece, flTele, flEyepiece, barlowMag);
	var numFOVdec = laObj.numberFieldOfViewDEC(d1dec, m1dec, s1dec, d2dec, m2dec, s2dec, fieldViewDegreesEyepiece, flTele, flEyepiece, barlowMag);
	$('#rafov_id').val(numFOVra);
	$('#decfov_id').val(numFOVdec);
}

function getStarObjects()
{
	
}

function successStarObjects(data, textStatus, jqXHR)
{
	try
	{
		if (textStatus == "success")
		{
			var starObjPresent = $(data).children('starobjectdetails').length;
			if (starObjPresent != 1)
			{
				throw new Error("Improper format: not starobjectdetails outer tag");
			}
 			var numEntry = $(data).children('starobjectdetails').children('entry').length;
			var i = 0;
			for (i= 0; i < numEntry; i++)
			{
				var entry = $(data).children('starobjectdetails').children('entry')[i];

				// $(name="selSpaceObject1").options.add(id,name);
				// $('select[name="selSpaceObject1"]').options.add(id,name);

				var name = $(entry).children('name').text();
				var id = $(entry).children('id').text();
				var idString = id.toString();

				// $('select[name="selSpaceObject1"]').options.add(id,name);

				var addition = '<option value="' + idString + '">' + name + '</option>';
				// $('select[name="selSpaceObject1"]').append(addition);
				$('#selSpaceObject1_id').append(addition);
			}
			alert("CSuccess found");
		}
		else
			alert("CSuccess not found");
	}
	catch (e)
	{
		console.log(e.name);
		console.log(e.fileName);
		console.log(e.lineNumber);
		console.log(e.message);
	}
	
}



window.onload = function() { 
	var starObjXml = 'starobjectsxml.php';
	var ajaxObj = jQuery.ajax(
		{
			url:starObjXml,
			dataType:'xml',
			// complete:completeStarObjects,
			success:successStarObjects
		});
}

</script>


</body>
</html>


