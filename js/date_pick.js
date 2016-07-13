if (top.location != location) {
    top.location.href = document.location.href ;
  }

//setting a 30 days limit end date 
var cur = new Date(),
    after30days = cur.setDate(cur.getDate() + 30);
 
var now = new Date();
var end = new Date(now.setDate(now.getDate() + 30));

var endDay = end.getDate();

var monthNames = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
	
var endMonth = monthNames[end.getMonth()];
var endYear = end.getFullYear();
var endDate = endDay+'-'+ endMonth + '-' + endYear; 

$(document).ready(function()
{		
	$('#jobCloseInput').val(endDate);
	$('#jobCloseShow').val(endDate);
	/*$('#jobCloseInput').datepicker({
	startDate: "+0d",
	endDate: "+1m",
	format: 'dd-mm-yyyy',
	autoclose: true
	});
	*/

});