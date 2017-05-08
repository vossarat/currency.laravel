$(document).ready(function()
	{
		var rowHeight = $('.for-middle').height(),
		colHeight = $('.col-for-middle').first().height();

		$('.col-for-middle').css(
			{
				'margin-top':(rowHeight-colHeight)/2 + 'px',
			});
	});