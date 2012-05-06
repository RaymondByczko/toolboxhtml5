/*
 * author: Raymond Byczko
 * start date: 2012-04-28 April 28, 2012
 * purpose: to perform various astronomical calculations I find useful.
 *
 */

/*
 * UserException: an exception type for indicating something happened.
 * filename specifies the javascript file the error occurred in.
 * message is what happened.  easygreptext is a somewhat random
 * piece of text that can be grepped easily and concisely by a
 * maintainance developer. (e.g. AAWA or BBXV or XXAZ)
 */
function UserException (filename, message, easygreptext){  
	this.filename = filename;
	this.message = message;  
	this.easygreptext = easygreptext;
	this.name= "UserException";  
}  
      
UserException.prototype.toString = function (){  
return this.name + ':filename='+this.filename+':easygreptext='+this.easygreptext+':message='+this.message; 
}  
      
/*
 * drawGrid: draws a grid on a canvas whose id is given by canvasid.
 * The grid is presented to the edges of the canvas.  The leftmost
 * line is at the leftmost part of the canvas.  The same follows
 * for the other sides.
 */

function DoAstronomy()
{
	this.computeRASeconds = computeRASeconds;
	this.computeDiffRASeconds = computeDiffRASeconds;
	// RA
	this.minutesToDegreesRatioRA = minutesToDegreesRatioRA;
	this.numHoursInRA = 24.0;
	this.numMinutesPerHourInRA = 60.0;
	this.numSecondsPerMinuteInRA = 60.0;
	this.numDegreesAlongRA = 360.0;

	// Regular (360 degrees)
	this.numMinutesPerDegreeRegular = 60.0;
}
/*
 * computeRASeconds: given the right ascension of a certain star etc,
 * this computes the total number of seconds.  It essentially
 * does this so that RA distance (difference in RA) can be found.
 * It may have other uses too.  
 *
 * In general do this function on the RA of two objects, if you
 * want to eventually compute 'RA' distance between them (TODO - check
 * the term 'RA' distance.)
 *
 * The result of this is given to computeDiffRASeconds.
 */
function computeRASeconds(hours, minutes, seconds)
{
	var minutesPerHour = this.numMinutesPerHourInRA;
	var secondsPerMinute = this.numSecondsPerMinuteInRA;
	var numSec1 = hours*minutesPerHour*secondsPerMinute;
	var numSec2 = minutes*secondsPerMinute;
	var numSec3 = seconds;
	
	var sumSec = numSec1 + numSec2 + numSec3;
	
	return sumSec;
}

/*
 * computeDiffRASeconds: computes the absolute value of the
 * difference between two RA coordinates, each given in
 * seconds.
 */
function computeDiffRASeconds(secondsRACoord1, secondsRACoord2)
{
	var diffSeconds = secondRACoord1 - secondsRACoord2;	
	var absDiffSeconds = Math.abs(diffSeconds);
	return absDiffSeconds;
}

/*
 * minutesToDegreesRatioRA: calculates how many minutes in RA
 * are in 1 degree of RA. Recall in RA there is 24 hours, with
 * 60 minutes in each hour, and 60 seconds in each minute.
 */
function minutesToDegreesRatioRA()
{
	var numberMinutes = this.numHoursInRA * this.numMinutesPerHourRA;
	var numberDegrees = this.numDegreeAlongRA;
	var ratio = numberMinutes/numberDegrees;
	return ratio;
}

/*
 * minutesRA: the output of computeDiffRASeconds is given to this
 * method as secondsRA.  Given a certain span in secondRA find
 * the number of minutes, also in RA.
 */
function minutesRA(secondsRA) 
{
	var minutesPerSecondRA = 1.0/this.numSecondsPerMinuteInRA;
	var minutes = secondsRA * minutesPerSecondRA;
	return minutes;
}

/*
 * degreesRA: given the minutes in RA, as computed by minutesRA above,
 * this function converts it to degrees.
 */
// function degreesRA(minutesRA)
function degrees(minutesRA)
{
	var minPerDegRatioRA = this.minutesToDegreesRatioRA();
	var degPerMinRatioRA - 1.0/minToDegRatioRA;

	var degRA = minutesRA * degPerMinRatioRA;
	return degRA;
}

// function minutesRegular(degreesRA)
function minutesRegular(degrees)
{
	var minPerDeg = this.numMinutesPerDegreeRegular;	
	var minutesR = degrees * minPerDeg;
	return minutesR;
}

function computeMagnification(focalLengthTelescope, focalLengthEyepiece, barlowMag) 
{
	var magTE = focalLengthTelescope/focalLengthEyepiece;
	var overallMag = magTE * barlowMag;
	return overallMag;
}

function degreeActualFieldOfView(apparentFieldEyepieceDegrees, magnification)
{
	var afov = apparentFieldEyepiece/magnification;
	return afov;
}

function minutesActualFieldOfView(apparentFieldEyepieceDegrees, magnification)
{
	var dafov = this.degreeActualFieldOfView(apparentFieldEyepieceDegrees, magnification);
	var ndpm = this.numberDegreesPerMinuteRegular;
	var numMinutesPerDegRegular = 1.0/ndpm;
	var mafov = dafov * numMinutesPerDegRegular;
	return mafov;
}

	
	


/*
 * highliteSquare: highlites a particular square given by the pair (sq_x,sq_y).
 * These numbers are the 0 based divisions numbers after the canvas
 * has been divided by _grid_spacing.  (0,0) represents the upperleft box
 * as you might see it in the browser. (0,1) is immediately below it.
 * canvasid indicates the id of the canvas.  _grid_spacing indicates how
 * the canvas was divided.
 */
function highliteSquare(sq_x, sq_y, canvasid, v_grid_spacing, h_grid_spacing)
{
	var thecanvas = document.getElementById(canvasid);
	var thecontext = thecanvas.getContext("2d");
	var cw = thecanvas.width;
	var ch = thecanvas.height;

	var num_x_divs = (cw-1)/h_grid_spacing;
	var num_y_divs = (ch-1)/v_grid_spacing;
	if ( (sq_x < 0) || (sq_x > num_x_divs))
	{
		throw new UserException('jsc/presentGrid', 'sq_x out of range:'+sq_x, 'AAAB');  
	}
	if ( (sq_y < 0) || (sq_y > num_y_divs))
	{
		throw new UserException('jsc/presentGrid', 'sq_y out of range:'+sq_x, 'AAAB');  
	}
	x_position = sq_x + 0.5 + sq_x*h_grid_spacing; 
	y_position = sq_y + 0.5 + sq_y*v_grid_spacing;

	thecontext.fillStyle = "rgb(200,0,0)";
	thecontext.fillRect(x_position + 1, y_position + 1,/* 5, 5*/ h_grid_spacing-1, v_grid_spacing-1 );
				

}


/*
 * divideGrid: this divides a canvas into q_x parts along the x-axis,
 * and q_y parts along the y-axis, and accounts for a line thickness
 * of wl.
 *
 * If there are x divisions, there will be x+1 lines.
 * Assume space between lines is d.  Assume the canvas width is wc.
 *
 * Then, x*d + wl*(x+1) = wc.
 *
 * Solving for d yields: [wc - wl*(x+1)]/x
 *
 * Given each line is be output based on its position of wl/2,
 * then, 
 * each line is put out at: (i+0.5)*wl + i*d   where i=0 to x inclusive.
 */
function divideGrid(canvasid, q_x, q_y, wl)
{
	var thecanvas = document.getElementById(canvasid);
	var thecontext = thecanvas.getContext("2d");
	var cw = thecanvas.width;
	var ch = thecanvas.height;
	thecontext.lineWidth = wl;

	var dx = (cw - wl* (q_x + 1))/q_x;
	for (var x = 0; x <= q_x; x++)
	{
		x_position = (x+0.5)*wl + x*dx;
		thecontext.moveTo(x_position, 0);
		thecontext.lineTo(x_position, ch);
	}

	var dy = (ch - wl* (q_y + 1))/q_y;
	for (var y = 0; y <= q_y; y++)
	{
		y_position = (y+0.5)*wl + y*dy;
		thecontext.moveTo(0,y_position);
		thecontext.lineTo(cw,y_position);
	}
	thecontext.strokeStyle = "#000";
	thecontext.stroke();
}


function rotateRectangle(canvasid)
{
	var thecanvas = document.getElementById(canvasid);
	var thecontext = thecanvas.getContext("2d");
	var cw = thecanvas.width;
	var ch = thecanvas.height;
	thecontext.translate(cw/2, ch/2);
	thecontext.rotate(Math.PI*30/180);
	thecontext.beginPath();
	thecontext.arc(0, 0, 30, 0, Math.PI, true);
	thecontext.strokeStyle = "#000";
	thecontext.stroke();
}
