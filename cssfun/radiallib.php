<?php
/**
@company self
@author Raymond Byczko
@file toolboxhtml5/cssfun/radiallib.php
@start_date 2013-05-19 May 19
@purpose To develop a set of useful radial routines for
front end work..
@note Most of the style is indicated outside of the tag.
The position is indicated in the tag.  I find this useful.
@note Tested in Firefox 20 (OK). Test in Chromium 25.0.1364.160 (OK)
@change_history 2013-05-19 May 19, Removed commented out code.  Cleanup.
@change_history 2013-05-19 May 19, Added comments to functions.
@change_history 2013-05-20 May 20, Added function: computeBoundaryDivs.
Added left_offset and top_offset to arg list for makeDivs.
**/
?>
<?php

/**
  * makeIdpart: given a row value of i, and a column value of j,
  * and a prefix value to use, this function centralized how
  * to compute the id value for a division.
  */
function makeIdpart($i, $j, $idprefix)
{
	$id_part = $idprefix.'_'.$i.'_'.$j;
	return $id_part;
}

/**
  * makeDivs: this function outputs a set of divisions arranged
  * in a 2D square of a certain number of rows and columns.
  * The width and height of each rectangle is specified.
  * Lastly, the idprefix to use for the id of each division
  * is indicated.
  */
function makeDivs($width, $height, $rows, $columns, $idprefix, $left_offset=0, $top_offset=0)
{
	for ($i=0; $i < $rows; $i++)
	{

		$top = $top_offset+$i*$height.'px'; 
		for ($j=0; $j < $columns; $j++)
		{
			// $id_part = $idprefix.'_'$i.'_'.$j;
			$id_part = makeIdpart($i,$j, $idprefix);
			$left = $left_offset+$j*$width.'px'; 
			$style_string='position: absolute; left: '.$left.'; top: '.$top;	
			echo '<div id='.$id_part.' style="'.$style_string.'"></div>'; 
		}
	}
}
/**
  * makeStyle: this generates (or makes) the various style components
  * used by the divisions constructed with makeDivs.  Make sure to
  * pass in the same values for parameters width, height, rows, columns,
  * and idprefix.  Lastly, for makeStyle, it needs to know the colorScheme.
  */
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
			echo 'width: '.$width.'px;';
			echo 'height: '.$height.'px;';
			echo 'background: -webkit-radial-gradient('.$color0.', '.$color1.');';
			echo 'background: radial-gradient('.$color0.', '.$color1.')';
			echo '}';
		}
	}
}

/**
  * computeBoundaryDivs: given the same parameters as makeDivs (except
  * idprefix), this function computes the boundary of the div matrix.
  * An associated array is returned with keys: left, right, top, bottom.
  */
function computeBoundaryDivs($width, $height, $rows, $columns, $left_offset=0, $top_offset=0)
{
	$area['left'] = $left_offset;
	$area['right'] = $columns*$width;
	$area['top'] = $top_offset;
	$area['bottom'] = $rows*$height;
	return $area;
}

?>
