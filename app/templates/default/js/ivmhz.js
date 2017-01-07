$(document).ready(function(){
	/*
	**Hack to make the  ivmhz-data-toggle buttons work on mobile devices
	*/
	$('.ivmhz-data-toggle').click(function(e){
		e.preventDefault();
		console.log($(this).attr('data-target'));
		$el = $(this).attr('data-target');
		$($el).show();
	});
	// The slider being synced must be initialized first
	$('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 210,
		itemMargin: 5,
		asNavFor: '#slider'
	});

	$('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel"
	});
	fixFlexsliderHeight();
	
	$load = QuerySt('load');
	if($load != '' && $('#' + $load).length == 1){
		$('html, body').animate({
			scrollTop: $("#" + $load).offset().top
		}, 2000);
	}
	$.material.init();
	initiateFlexSlider();
});

function QuerySt($key) { 
  var assoc  = {};
  var decode = function (s) { return decodeURIComponent(s.replace(/\+/g, " ")); };
  var queryString = location.search.substring(1); 
  var keyValues = queryString.split('&'); 

  for(var i in keyValues) { 
    var key = keyValues[i].split('=');
    if (key.length > 1) {
      assoc[decode(key[0])] = decode(key[1]);
    }
  } 

  return assoc[$key]; 
} 

function gotoSection(section){
	var path = window.location.pathname;
	var page = path.split("/").pop();
	console.log(page);
	if(page == 'index' || page == ''){
		$('html, body').animate({
			scrollTop: $("#" + section).offset().top-50
		}, 2000);
	}else{
		document.location='/index?load=' + section;
	}
}

function loadPand(id){
	$.ajax({
		type: "POST",
		url: 'pand.asp',
		contenttype: "charset=utf-8",
		data: 'id=' + id,
		async: true,
		success: function(data){
			$('.pand-div').append(data);
			$('.work-space').hide(400, function(){
				$('.pand-div').show(400);
			});
		}
	});
}

function initiateFlexSlider(){
	$('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 210,
		itemMargin: 5,
		asNavFor: '#slider'
	});

	$('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel"
	});
}

function initiateFlexSlider_ori(){
	/*Slideshow JQuery more info: http://themarklee.com/2013/12/26/simple-diy-responsive-slideshow-made-html5-css3-javascript/ */
	
	var counter = 0, // to keep track of current slide
	$items = $('.diy-slideshow figure'), // a collection of all of the slides, caching for performance
	numItems = $items.length; // total number of slides
	// $('.detail-gegs').css('height',$('.sliderparent').css('height'));
	$('.moreInfo').click(function(){
		$estateId = $(this).attr('id');
		document.location = '/properties/detail/' + $estateId;
	});
	$('.moreProjectInfo').click(function(){
		$estateId = $(this).attr('id');
		document.location = '/properties/projects/detail/' + $estateId;
	});
	/** this function is what cycles the slides,
	showing the next or previous slide and hiding all the others **/
	var showCurrent = function(){
		// calculates the actual index of the element to show
		var itemToShow = Math.abs(counter%numItems);
		// remove .show from whichever element currently has it
		$items.removeClass('show');
		// add .show only to the current slide
		$items.eq(itemToShow).addClass('show');
	};

	
	// add click events to prev &amp; next buttons
	$('.next').on('click', function(){
		counter++;
		showCurrent();
	});
	$('.prev').on('click', function(){
		counter--;
		showCurrent();
	});

	
	if('ontouchstart' in window){
		$(".diy-slideshow").swipe({
			swipeLeft:function() {
				counter++;
				showCurrent();
			},
			swipeRight:function() {
				counter--;
				showCurrent();
			}
		});
	}

	/*End slideshow JQuery*/
	
	
	// The slider being synced must be initialized first
	$('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 210,
		itemMargin: 5,
		asNavFor: '#slider'
	});

	$('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel"
	});
	fixFlexsliderHeight();	
}

function fixFlexsliderHeight() {
    // Set fixed height based on the tallest slide
    $('.flexslider').each(function(){
        var sliderHeight = 0;
        $(this).find('.slides > li').each(function(){
            slideHeight = $(this).height();
            if (sliderHeight < slideHeight) {
                sliderHeight = slideHeight;
            }
        });
        $(this).find('ul.slides').css({'height' : sliderHeight});
    });
}