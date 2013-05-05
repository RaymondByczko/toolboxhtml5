var allSentNumbers = [];

onmessage = function(event)
{
	var n = parseInt(event.data);
	allSentNumbers.push(n);
	var five = 5;
	self.setTimeout(function(){},4000);
	postMessage("allSentNumbers(size)=" + five.toString());
	self.setTimeout(function(){},4000);
	postMessage("endthread");
	self.close();
}

