var allSentNumbers = [];

onmessage = function(event)
{
	var n = parseInt(event.data);
	allSentNumbers.push(n);
	var five = 5;
	postMessage("allSentNumbers(size)=" + five.toString());
}

