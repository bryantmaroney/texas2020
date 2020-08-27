jQuery(document).ready(function($) {

	function scrollToCards() {
		let offset = ($(window).width() <= 780) ? $(".mobileCards").offset() : $("#Section3").offset();
		
		$("html, body").animate({
			scrollTop: offset.top - 50
		}, 1000);
	}

	function scrollToSearch() {
		let offset = $("#candidate_search_section").offset();

		$("html, body").animate({
			scrollTop: offset.top - 50
		}, 1000);
	}
	
	function scrollToDistrict() {
		let offset = $("#Section4").offset();

		$("html, body").animate({
			scrollTop: offset.top - 50
		}, 1000);
	}

	function scrollTo104() {
		let offset = $("#Section2").offset();

		$("html, body").animate({
			scrollTop: offset.top - 50
		}, 1000);
	}

	function scrollToMakeDifference() {
		let offset = $("#footer_email_sec").offset();

		$("html, body").animate({
			scrollTop: offset.top - 50
		}, 1000);
	}
	
	var urls = [
            'EndGerrymandering', 'VoteByMail',
            'RevealtheWriters', 'ModernizeElections',
            'RCV', 'BantheBarriers',
            'LimittheLobbyists', 'RethinkRegistration',
            'CleanUpElections', 'TuneinTexas',
            'LearnYourDistricts', '10-4Texas',
            'candidate_search',
            '10-4',
            'make_a_difference'
        ];


// 	var count = Math.floor(document.querySelectorAll('.owl-item').length / 3) >= 11 ? 11 : 10;
// 	var addNum;

// 	if(count === 11) {
// 		addNum = 0;
// 	}
// 	else {
// 		addNum = -1;
// 	}

        var page = window.location.search.replace(/[?]/g, '');
        if (page.toLowerCase() === '10-4texas') {
	    page = '10-4Texas';
	}
	var url = window.location.href;
	if(url.includes('LearnYourDistricts')) {
	    scrollToDistrict();
	} else if(url.includes('candidate_search')) {
	    scrollToSearch();
	} else if(url.includes('10-4') && !url.toLowerCase().includes('10-4texas')) {
		scrollTo104();
	} else if(url.includes('make_a_difference')) {
		scrollToMakeDifference();
	} else if(urls.includes(page)) {
	    scrollToCards();
	    localStorage.setItem('url', page);
	}



// 	if(window.location.href.includes('EndGerrymandering')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 1 + addNum);
// 	} else if(window.location.href.includes('10-4Texas')){
// 	    var num = document.querySelector('.item.defItem') ? 0 : 1;

// 	    scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', num + addNum);
// 	} else if(window.location.href.includes('VoteByMail')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 2 + addNum);

// 	} else if(window.location.href.includes('RevealtheWriters')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 3 + addNum);

// 	} else if(window.location.href.includes('ModernizeElections')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 4 + addNum);

// 	} else if(window.location.href.includes('RCV')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 5 + addNum);

// 	} else if(window.location.href.includes('BantheBarriers')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 6 + addNum);

// 	} else if(window.location.href.includes('LimittheLobbyists')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 7 + addNum);

// 	} else if(window.location.href.includes('RethinkRegistration')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 8 + addNum);

// 	} else if(window.location.href.includes('CleanUpElections')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 9 + addNum);

// 	} else if(window.location.href.includes('TuneinTexas')){
// 		scrollToCards();
// 		$('#carusel-desktop, #carusel-mobile').trigger('to.owl.carousel', 10 + addNum);

// 	} else if(window.location.href.includes('LearnYourDistricts')) {
// 		scrollToDistrict();
// 	}

    
})
