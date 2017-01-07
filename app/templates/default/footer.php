<?php

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;
$showContactForm = 'true';
echo $data['showContactForm'];
if(isset($data['showContactForm'])){
	$showContactForm = $data['showContactForm'];
}
//initialise hooks
$hooks = Hooks::get();
?>
	<?php
	if($showContactForm == 'true'):
	?>
    <!-- Footer -->
	<div class="container-fluid contact" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center footer-text">Contact</h2>
					<div class="col-md-6 col-sm-12 col-xs-12contact-form">
						<form role="form">
							<div class="form-group">
								<input type="text" class="form-control form-effect" id="naam" placeholder="Naam">
							</div>
							<div class="form-group">                                 
								<input type="email" class="form-control form-effect" id="email" placeholder="E-mail">
							</div>
							<div class="form-group">
								<textarea type="textarea" class="form-control form-effect" id="text" placeholder="Bericht"></textarea>
							</div>  
							<button type="submit" class="btn btn-default btn-sub">Verzenden</button>
						</form>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 address-space">
						<div id="map-canvas"></div>
						<div class="address">
							<h3>Adres</h3>
							<p style="margin:0;"><i class="glyphicon glyphicon-map-marker"></i>Lange Nieuwstraat 27 bus 2</p>
							<p style="margin-left:25px">2000 Antwerpen</p>
							<p><i class="glyphicon glyphicon-earphone"></i>0498/97.77.77</p>
							<p><i class="glyphicon glyphicon-envelope"></i>info@ikverkoopmijnhuiszelf.be</p>
							<div class="biv-info">
								<p>Erkend vastgoedmakelaar BIV nr. 203.868</p>
								<p>Onderworpen aan de Belgische BIV deontologie</p>
								<p>Lid van Confederatie van Immobili&#203;ngroepen Vlaanderen (CIB)</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	endif;
	?>

	<div class="container-fluid notes">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 concept">
				<div class="container">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<p>Wil je je huis wel verkopen met behulp van een makelaar? Dat kan ook, bij Markgrave Vastgoed!</p>
					</div>
					<div class="col-md-offset-1 col-md-2 col-md-offset-1 col-sm-offset-1 col-sm-2 col-sm-offset-1 col-xs-12">
						<a href="http://markgrave.be" target="_blank"><button type="button" class="btn btn-default btneff">Lees meer</button></a>
					</div>
				</div>
			</div>
		</div> 
	</div>



	<div class="container-fluid footer">
		<div class="row">
			<div class="col-md-12">
				<p>Handcrafted by <a href="http://yclick.be"><font color="#f9333f">Y</font><font color="#777">Click</font></a> in 2016. | All Rights Reserved</p>
			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
	<?php
	Assets::js(array(
		Url::templatePath() . 'js/bootstrap.min.js',
		Url::templatePath() . 'js/jquery.countTo.js',
		Url::templatePath() . 'js/jquery.waypoints.min.js',
		Url::templatePath() . 'js/lightbox.min.js',
		Url::templatePath() . 'js/jquery.flexslider-min.js',
		Url::templatePath() . 'js/jquery.touchSwipe.min.js',
		Url::templatePath() . 'js/jquery.carouFredSel-6.2.1-packed.js',
		Url::templatePath() . 'js/material.min.js',
		Url::templatePath() . 'js/ivmhz.js',
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'
	));

	//hook for plugging in javascript
	$hooks->run('js');

	//hook for plugging in code into the footer
	$hooks->run('footer');
	?>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(51.2207478, 4.4066898,16),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script>
	$(document).ready(function () {
		$(document).on("scroll", onScroll);
 
		$('a[href^="#"]').on('click', function (e) {
			e.preventDefault();
			$(document).off("scroll");
 
			$('a').each(function () {
				$(this).removeClass('active');
			})
			$(this).addClass('active');
 
			var target = this.hash;
			$target = $(target);
			$('html, body').stop().animate({
				'scrollTop': $target.offset().top
			}, 500, 'swing', function () {
				window.location.hash = target;
				$(document).on("scroll", onScroll);
			});
		});
	});
 
	function onScroll(event){
		var scrollPosition = $(document).scrollTop();
		$('nav a').each(function () {
			var currentLink = $(this);
			var refElement = $(currentLink.attr("href"));
			if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
				$('nav ul li a').removeClass("active");
				currentLink.addClass("active");
			}
			else{
				currentLink.removeClass("active");
			}
		});
	}
	</script>
	<script type="text/javascript">
    jQuery(function ($) {
      // custom formatting example
      $('.timer').data('countToOptions', {
        formatter: function (value, options) {
          return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
      });
 
      // start all the timers
      $('#starts').waypoint(function() {
    $('.timer').each(count);
	});
 
      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
    });
  	</script>
</body>
</html>