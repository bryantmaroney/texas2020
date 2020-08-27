$(function() {

	$(document).on('click', '.video_cover', function () {

		$(this).hide()
		$('video').trigger('play')
	})

})
