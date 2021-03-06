/*
 * author: Raymond Byczko
 * start date: 2012-02-17 Feb 17, 2012
 * purpose: to specify several javascript functions for working
 * with grids in a HTML5 canvas.
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
function drawGrid(canvasid, v_grid_spacing, h_grid_spacing)
{
	var thecanvas = document.getElementById(canvasid);
	var thecontext = thecanvas.getContext("2d");
	var cw = thecanvas.width;
	var ch = thecanvas.height;
	var num_x_divs = (cw-1)/h_grid_spacing;
	var num_y_divs = (ch-1)/v_grid_spacing;
	
	for (var x = 0; x < num_x_divs; x++)
	{
		thecontext.moveTo( x + 0.5 + x*h_grid_spacing, 0);
		thecontext.lineTo( x + 0.5 + x*h_grid_spacing, ch-1);
	}
	for (var y = 0; y < num_y_divs; y++)
	{
		thecontext.moveTo(0, y + 0.5 + y*v_grid_spacing);
		thecontext.lineTo(cw-1, y + 0.5 + y*v_grid_spacing);
	}
	thecontext.strokeStyle = "#000";
	thecontext.stroke();
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
