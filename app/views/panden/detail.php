<?php
header('Content-Type: text/html; charset=utf-8');
use Core\Language;
$images = $data['images'];
$class = 'class="show"';
$imagesCode = '<ul class="slides">';
$bottomImagesCode = '<ul class="slides">';

if($images !== null):
	foreach($images as $image){
		$imagesCode .= '<li><div class="carousel-wrapper img-wrapper2"><img class="entry-image" src="' . $image["UrlLarge"] . '" /></div></li>';
		$bottomImagesCode .= '<li><div class="carousel-wrapper-bottom"><img src="' . $image["UrlLarge"] . '" /></div></li>';
	}
endif;

$imagesCode .= '</ul>';
$bottomImagesCode .= '</ul>';
$Estate = $data['estate'];
$EPC = '';

if($Estate['Details'] !== null && $Estate['Details'] != ''):
	$details = $Estate['Details'];
	foreach($details as $detail){
		if($detail['Name'] == 'EPC'):	
			$subDetails = $detail['Subdetails'][0];
			$EPC = $subDetails['Value'];
		endif;
	}
endif;

$Category = $Estate['Category'];
$CategoryId = $Estate['CategoryId'];

$EstateID = $Estate['EstateID'];
$Prijs = $Estate['Price'];
$Naam = $Estate['Name'];
$Adres = $Estate['Address1'];
$Nummer = $Estate['Number'];
$Zip = $Estate['Zip'];
$Gemeente = $Estate['City'];

$PercOpp = $Estate['GroundArea'];
$BewOpp = $Estate['Area'];
$Tuin = $Estate['Garden'];
$TuinOpp = $Estate['GardenArea'];
$Badkamer = $Estate['BathRooms'];
$slaapkamer = $Estate['Rooms'];
$Terras = $Estate['Terrace'];
$Garage = $Estate['Garage'];
$Parking = $Estate['Parking'];

$price = number_format($price, 0, ',', '.');

$Description = $Estate['ShortDescription'];

?>
<!-- Header -->
<div class="container-fluid work concept" id="work">
	<div class="container top60">
		<div class="col-xs-12 properties-top">
			<a href="<?php echo $data['previous']; ?>"><i class="fa fa-arrow-left fa-2 backIcon"></i></a>
		</div>
		<div class="col-xs-12 sliderparent">
			<div class="col-xs-12">
				<div class="sliderdiv">
					<div id="slider" class="flexslider">
						<?php echo $imagesCode; ?>
					</div>
					<div id="carousel" class="flexslider">
						<?php echo $bottomImagesCode; ?>
					</div>
				</div>
				<div class="top-info text-center">
					<h2><?= $Naam ?></h2>
					<h3>&euro; <?= $price ?></h3>
				</div>
				<div class="col-xs-12 detail-oms left0 right0">
					<div class="col-xs-12">
						<h2 class="title">Omschrijving</h2>
						<?php echo $Description; ?>
					</div>
					<div class="col-xs-12 detail-gegs">
						<div class="col-xs-12 col-md-6 left0 right0">
							<h2 class="title">Eigenschappen</h2>
							<div class="row">
								<div class="col-xs-12 col-md-6 left0 right0">
									<p>Ref. <?php echo $EstateID; ?></p>
									<p><?php echo $Adres . ' ' . $Nummer; ?></p>
									<p><?php echo $Zip . ' ' . $Gemeente; ?></p>
									<p>Type: <?= $Category ?></p>
									<?php if($CategoryId != '7'): ?>
										<p>Perceeloppervlakte: <?php echo $PercOpp . 'm²'; ?></p>
										<p>Bewoonbare oppervlakte: <?php echo $BewOpp . 'm²'; ?></p>
										<?php if($EPC != ''): ?>
											<p>EPC: <?= $EPC . 'kWh/m²' ?></p>
										<?php endif; ?>
										<p>Kadastraal Inkomen</p>
										<!--<p>Verdiepingen</p>
										<p>Verdieping woning</p>-->
									<?php endif; ?>
								</div>
								<div class="col-xs-12 col-md-6 left0 right0">
									<?php if($CategoryId != '7'): ?>
										<!--<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Trap</p>
										<p><span class="glyphicon glyphicon-remove glyphicon-red"></span>&nbsp;Lift</p>-->
										<?php if($slaapkamer > 0): ?>
											<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Slaapkamer: <?php echo $slaapkamer; ?></p>
										<?php else: ?>
											<p><span class="glyphicon glyphicon-remove glyphicon-red"></span>&nbsp;Slaapkamer</p>
										<?php endif; ?>
										
										<?php if($Badkamer > 0): ?>
											<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Badkamer: <?php echo $Badkamer; ?></p>
										<?php else: ?>
											<p><span class="glyphicon glyphicon-remove glyphicon-red"></span>&nbsp;Badkamer</p>
										<?php endif; ?>
										
										<?php if($Tuin > 0 && $TuinOpp > 0): ?>
											<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Tuin/terras: <?php echo $TuinOpp . 'm²'; ?></p>
										<?php elseif($Terras > 0 || $Tuin > 0):?>
											<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Tuin/terras</p>
										<?php else: ?>
											<p><span class="glyphicon glyphicon-remove glyphicon-red"></span>&nbsp;Tuin/terras</p>
										<?php endif; ?>
										
										<?php if($Garage > 0): ?>
											<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Garage</p>
											<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Parkeerplaats</p>
										<?php elseif($Parking > 0): ?>
											<p><span class="glyphicon glyphicon-remove glyphicon-red"></span>&nbsp;Garage</p>
											<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Parkeerplaats</p>
										<?php else: ?>
											<p><span class="glyphicon glyphicon-remove glyphicon-red"></span>&nbsp;Garage</p>
											<p><span class="glyphicon glyphicon-remove glyphicon-red"></span>&nbsp;Parkeerplaats</p>
										<?php endif; ?>
										<!--<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Toilet: 2</p>
										<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Keuken</p>
										<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Bijkeuken</p>
										<p><span class="glyphicon glyphicon-ok glyphicon-green"></span>&nbsp;Wasplaats</p>-->
									<?php endif; ?>
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-md-6 top20 left0 right0">
							<h2 class="title">Contacteer ons</h2>
							<form id="contact-form" method="post" action="javascript:sendDetail();" role="form">

								<div class="messages"></div>

								<div class="controls">

									<div class="row contact-info">
										<input type="hidden" id="pand-id" name="pand-id" value="<?php echo $EstateID; ?>" />
										<input type="hidden" id="pand-straat" name="pand-id" value="<?php echo $Adres . ' ' . $Nummer; ?>" />
										<div class="form-group label-floating col-md-12">
											<label for="form_name" value="Voornaam *"></label>
											<input id="form_name" type="text" name="name" class="form-control" placeholder="Voornaam *" required="required">
										</div>
										<div class="col-md-12">
											<input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Naam *" required="required">
										</div>
										<div class="col-md-12">
											<input id="form_email" type="email" name="email" class="form-control" placeholder="Email *" required="required">
										</div>
										<div class="col-md-12">
											<input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Telefoon/gsm *" required="required">
										</div>
										<div class="col-md-12">
										<?php
										$txt = 'Beste,'.chr(10).chr(13).'Graag had ik meer info ontvangen over het pand. Kan u mij contacteren?'.chr(10).chr(13).'Bedankt'
										?>
											<label for="form_message">Bericht</label>
											<textarea id="form_message" name="message" class="form-control" placeholder="Bericht *" rows="4" required="required" style="overflow:hidden"><?=$txt?></textarea>
										</div>
										<div class="col-md-12">
												<button class="send-div" onclick="javascript:$('#contact-form').submit();">
													<i class="fa fa-paper-plane"></i>
												</button>
											</span>
											
										</div>
										<div class="col-md-12">
											<p class="text-muted"><strong>*</strong> Deze velden zijn verplicht.</p>
										</div>
									</div>
								</div>

							</form>
						
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>