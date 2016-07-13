$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2014-07-12',
			editable: true,
			events: [
				{
					title: 'danceseen',
					url: 'http://www.clonenine.com/danceseen',
					start: '2014-07-09',
					end: '2014-07-10'
				},				
			]
		});
		
	});