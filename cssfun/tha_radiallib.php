<?php
/**
@company self
@author Raymond Byczko
@file toolboxhtml5/cssfun/tha_radiallib.php
@start_date 2013-05-19 May 19
@purpose To develop a set of useful radial routines for
front end work.  This file is a test harness for radiallib.php.
@note 'tha' stands for 'test harness a'.
@note Most of the style is indicated outside of the tag.
     The position is indicated in the tag.  I find this useful.
@note Tested in Firefox 20 (OK). Test in Chromium 25.0.1364.160 (OK)
*/
include_once 'radiallib.php';
?>

<html>
<head>
<style type="text/css">
<?php
$first = array('red', 'yellow');
$second = array('black', 'green');
$third = array('purple', 'aqua');

$fourth = array('black', 'white');
$fifth = array('red', 'black');
$sixth = array('yellow', 'green');

$seventh = array('lawngreen', 'lavender');
$eighth = array('deeppink', 'aliceblue');
$ninth = array('darkorchid', 'navy');

$tenth = array('darkblue', 'grey');
$eleventh = array('orange', 'darkred');
$twelfth = array('gold', 'peru');

$cs[0][0] = $first;
$cs[0][1] = $second;
$cs[0][2] = $third;

$cs[1][0] = $fourth;
$cs[1][1] = $fifth;
$cs[1][2] = $sixth;

$cs[2][0] = $seventh;
$cs[2][1] = $eighth;
$cs[2][2] = $ninth;

$cs[3][0] = $tenth;
$cs[3][1] = $eleventh;
$cs[3][2] = $twelfth;

makeStyle(100, 100, 4, 3, 'thaprefix', $cs);

?>
</style>
</head>
<body>

<?php
makeDivs(100, 100, 4, 3, 'thaprefix');
?>

<?php
/*
function makeIdpart($i, $j, $idprefix)
{
	$id_part = $idprefix.'_'$i.'_'.$j;
	return $id_part;
}

function makeDivs($width, $height, $rows, $columns, $idprefix)
{
	for ($i=0; $i < $rows; $i++)
	{

		$top = $i*$height.'px'; 
		for ($j=0; $j < $columns; $j++)
		{
			// $id_part = $idprefix.'_'$i.'_'.$j;
			$id_part = makeIdpart($i,$j, $idprefix);
			$left = $j*$width.'px'; 
			$style_string='position: absolute; left: '.$left.'; top: '.$top;	
			echo '<div id='.$id_part.' style="'.$style_string.'"></div>'; 
		}
	}
}

function makeStyle($width, $height, $rows, $columns, $idprefix, $colorScheme)
{
	for ($i=0; $i < $rows; $i++)
	{
		for ($j=0; $j < $columns; $j++)
		{
			$id_part = makeIdpart($i,$j, $idprefix);
			$color0 = $colorScheme[$i][$j][0];
			$color1 = $colorScheme[$i][$j][1];
			echo 'div#'.$id_part.' {';
			echo 'width: '.$width.'px';
			echo 'height: '.$height.'px';

			echo 'background: -webkit-radial-gradient('.$color0.', '.$color1.');';
			echo 'background: radial-gradient('.$color0.', '.$color1.')';
		}
	}
}
*/
/*
div#blackgreenradial {
width: 100px;
height: 100px;
background: -webkit-radial-gradient(black, green);
background: radial-gradient(black, green)
}
*/

?>

</body>
</html>
