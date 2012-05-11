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
};  
      
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
	this.minutesRAFromSecondsRA = minutesRAFromSecondsRA;
	this.degreesFromMinutesRA = degreesFromMinutesRA;
	this.minutesRegular = minutesRegular;

	// Regular (360 degrees)
	this.numMinutesPerDegreeRegular = 60.0;

	this.numberDegreesPerMinuteRegular = 1.0/60.0;

	// Magnification
	this.computeMagnification = computeMagnification;

	// Field of view
	this.degreeActualFieldOfView = degreeActualFieldOfView;
	this.minutesActualFieldOfView = minutesActualFieldOfView;

	// DEC

	this.computeDECSeconds = computeDECSeconds;
	this.computeDiffDECSeconds = computeDiffDECSeconds;
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
	var numSec1 = parseFloat(hours)*minutesPerHour*secondsPerMinute;
	var numSec2 = parseFloat(minutes)*secondsPerMinute;
	var numSec3 = parseFloat(seconds);
	
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
	var diffSeconds = secondsRACoord1 - secondsRACoord2;	
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
	var numberMinutes = this.numHoursInRA * this.numMinutesPerHourInRA;
	var numberDegrees = this.numDegreesAlongRA;
	var ratio = numberMinutes/numberDegrees;
	return ratio;
}

/*
 * minutesRA: the output of computeDiffRASeconds is given to this
 * method as secondsRA.  Given a certain span in secondRA find
 * the number of minutes, also in RA.
 */
function minutesRAFromSecondsRA(secondsRA) 
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
function degreesFromMinutesRA(minutesRA)
{
	var minPerDegRatioRA = this.minutesToDegreesRatioRA();
	var degPerMinRatioRA = 1.0/minPerDegRatioRA;

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

/**
  * computeMagnification: computes the magnification which is the focal length of the 
  * telescope divided by the focal length of th eyepiece, and takes into account
  * the magnification provided by a barlow lens.
  */
function computeMagnification(focalLengthTelescope, focalLengthEyepiece, barlowMag) 
{
	var magTE = focalLengthTelescope/focalLengthEyepiece;
	var overallMag = magTE * barlowMag;
	return overallMag;
}

function degreeActualFieldOfView(apparentFieldEyepieceDegrees, magnification)
{
	var afov = apparentFieldEyepieceDegrees/magnification;
	return afov;
}

function minutesActualFieldOfView(apparentFieldEyepieceDegrees, magnification)
{
	var dafov = this.degreeActualFieldOfView(apparentFieldEyepieceDegrees, magnification);
	// var ndpm = this.numberDegreesPerMinuteRegular;
	// var numMinutesPerDegRegular = 1.0/ndpm;

	var mafov = dafov * this.numMinutesPerDegreeRegular;
	// var mafov = dafov * numMinutesPerDegRegular;
	return mafov;
}

/**
  * obj def: locateAstronomy
  */
function LocateAstronomy()
{
	this.numberFieldOfViewRA = numberFieldOfViewRA;
	this.numberFieldOfViewDEC = numberFieldOfViewDEC;

}

/**
  * numberFieldOfView: how many fields of View along RA and along Dec are between S1 and S2 where
  * S1 is space object 1 at h1, m1, s1 etc, and given characteristics of the telescope.  If we know
  * where one object is, we can figure out number of fields of view over in both coordinates, the other
  * object is.
  */
function numberFieldOfViewRA(h1, m1, s1, h2, m2, s2, fieldViewDegreesEyepiece, flTele, flEyepiece, barlowMag)
{

	var daObj = new DoAstronomy();
	var ras1 = daObj.computeRASeconds(h1, m1, s1);
	var ras2 = daObj.computeRASeconds(h2, m2, s2);

	var diffRAsec = daObj.computeDiffRASeconds(ras1, ras2);


	var minRA = daObj.minutesRAFromSecondsRA(diffRAsec); 

	var degrees = daObj.degreesFromMinutesRA(minRA);

	var minutes = daObj.minutesRegular(degrees);


	var mag = daObj.computeMagnification(flTele, flEyepiece, barlowMag); 

	// var degFV = daObj.degreeActualFieldOfView(fieldViewEDegreesEyepiece, mag);

	var minutesFOV = daObj.minutesActualFieldOfView(fieldViewDegreesEyepiece, mag);

	var numFOV_RA = minutes/minutesFOV;

	return numFOV_RA;
}


function numberFieldOfViewDEC(h1, m1, s1, h2, m2, s2, fieldViewDegreesEyepiece, flTele, flEyepiece, barlowMag)
{

	var daObj = new DoAstronomy();
	var decs1 = daObj.computeDECSeconds(h1, m1, s1);
	var decs2 = daObj.computeDECSeconds(h2, m2, s2);

	var diffDECsec = daObj.computeDiffRASeconds(decs1, decs2);
	var diffDECmin = diffDECsec/60.0;

	var mag = daObj.computeMagnification(flTele, flEyepiece, barlowMag); 

	var minutesFOV = daObj.minutesActualFieldOfView(fieldViewDegreesEyepiece, mag);

	var numFOV_DEC = diffDECmin/minutesFOV;
	return numFOV_DEC;
}


function computeDECSeconds(h, m, s)
{
	var prod1 = parseFloat(h)*60.0*60.0; 
	var prod2 = parseFloat(m)*60.0;
	var decSec = prod1 + prod2 + parseFloat(s);
	return decSec;
}


function computeDiffDECSeconds(h1, m1, s1, h2, m2, s2) 
{
	var sec1 = this.computeDECSeconds(h1, m1, s1);
	var sec2 = this.computeDECSeconds(h2, m2, s2);
	var diff = sec1 - sec2;
	return diff;
}

