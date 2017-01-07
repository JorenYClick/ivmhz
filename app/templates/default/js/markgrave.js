function send(){
	var Naam = $('#form_name').val();
	var Achternaam = $('#form_lastname').val();
	var Email = $('#form_email').val();
	var Phone = $('#form_phone').val();
	var Message = $('#form_message').val();
	
	var strData = $('#contact-form').serialize();
	console.log(strData);
	
	$.ajax({
			type: "POST",
			url: '/contact/sendmail',
			data: 'naam=' + encodeURIComponent(Naam) + '&achternaam=' + encodeURIComponent(Achternaam) + '&email=' + encodeURIComponent(Email) + '&phone=' + encodeURIComponent(Phone) + '&message=' + encodeURIComponent(Message),
			contenttype: "charset=utf-8",
			async: false,
			success: function(data){
				$('.contact-info').empty().append('<p>Bedankt voor uw bericht! We bekijken dit zo spoedig mogelijk.</p>');
			}
	});
}
function GoTo(strPage,where){
	var toScroll = ($('#' + where).offset().top)-50;
	$('body, html').animate({scrollTop: toScroll}, 'slow');
}