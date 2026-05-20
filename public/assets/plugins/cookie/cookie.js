/*
$(document).ready(function() {
	$('body').ihavecookies({
		title: 'Çerez Politikası',
		message: 'Sitemizi kullanarak çezer politikamızı kabul etmiş sayılırsınız.',
		delay: 600,
		expires: 1,
		link: 'https://hznmadencilik.com/cerez-politikasi',
		onAccept: function(){
			var myPreferences = $.fn.ihavecookies.cookie();
			console.log('Yay! The following preferences were saved...');
			console.log(myPreferences);
		},
		uncheckBoxes: true,
		acceptBtnLabel: 'Kabul Et',
		moreInfoLabel: 'Detaylı Bilgi Edinin.'
	});

	if ($.fn.ihavecookies.preference('marketing') === true) {
		console.log('This should run because marketing is accepted.');
	}
});
*/
