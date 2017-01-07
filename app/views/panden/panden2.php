<?php
// print_r($data['EstateList']);
?>
<div class="container-fluid work concept" id="work">
	<div class="container">
		<div class="row" id="starts">
			<div class="col-md-12 col-sm-12 col-xs-12 work-list">
				<h2 class="text-center portfolio-text">Aanbod</h2>
				<div class="col-xs-12 pand-div"></div>
				<?php
					$EstateList = $data['EstateList'];
					// print_r($EstateList);
					foreach($EstateList as $huis){
						// print_r($huis);
						$Purposes = $huis['Purposes'];
						$Purposes2 = $Purposes['0'];
						// print_r($Purposes2);
						$StatusID = $Purposes2['PurposeStatusId'];
						// exit();
						// print_r($huis);
						$estateId = $huis['EstateID'];
						$name = $huis['Name'];
						$address = $huis['Address1'];
						$number = $huis['Number'];
						$zip = $huis['Zip'];
						$city = $huis['City'];
						$shortdesc = $huis['Sms'];
						$longdesc = $huis['LongDescription'];
						$flashdesc = $huis['Sms'];
						$soldRentDate = $huis['SoldRentDate'];
						
						if($flashdesc != '' && $_SESSION['whise'] == 'true'):
							$shortdesc = $flashdesc;
						endif;
						
						$price = $huis['Price'];
						$displayprice = $huis['DisplayPrice'];
						$area = $huis['Area'];
						$rooms = ($huis['Rooms'] != '') ? $huis['Rooms'] : '0';
						$bathrooms = ($huis['BathRooms'] != '') ? $huis['BathRooms'] : '0';
						$images = $huis['Pictures'];
						if(isset($images)):
							$defaultImage = array_shift($images);
							$smallImage = $defaultImage['UrlSmall'];
							$largeImage = $defaultImage['UrlLarge'];
						else: 
							$defaultImage = '';
							$smallImage = '';
							$largeImage = '';
						endif;
						
						if($displayprice != '1' || number_format($price, 0, ',', '.') == '0'):
							$price = 'Op aanvraag';
						else:
							$price = '&euro; ' . number_format($price, 0, ',', '.');
						endif;
						
						
						if(strpos($shortdesc, '</a>') > 0 && strpos(substr($shortdesc, 0, 180), '</a>') == 0):
							$shortdesc = (strlen($shortdesc) > 180 ? substr($shortdesc, 0, strpos($shortdesc, '</a>')+4) . '...' : $shortdesc);
						else:
							$shortdesc = (strlen($shortdesc) > 180 ? substr($shortdesc, 0, 180) . '...' : $shortdesc);
						endif;
						?>
						<?php 
						if($StatusID == '3'):
						?>
							<div class="col-xs-12 col-md-6 col-sm-4 col-lg-4 entry checksolddate" date="<?php echo $soldRentDate; ?>">
						<?php
						else:
						?>
							<div class="col-xs-12 col-md-6 col-sm-4 col-lg-4 entry">
						<?php						
						endif;
				?>
								<div class="card" style="border-radius:0px;">
									<div class="card-block text-center" style="padding-top:0px;padding-bottom:0px;background-color:#fff;border:1px solid rgba(250,158,0,1);">
										<h4 class="card-title one-line"><?=$name?></h4>
										<h6 class="card-subtitle text-muted"><?=$address . ' ' . $number?><br><?=$zip . ' ' . $city?></h6>
									</div>
									<div class="hovereffect">
										<div class="img" style="background-image:url('<?=$largeImage?>');"></div>
											<div class="overlay-2">
											</div>
											<div class="overlay">
												<p class="info line-clamp myclass"><?=$shortdesc?></p>
												<h3 class="info"><?=$price?></h3>
												<p> 
													<a href="/aanbod/<?=$estateId?>"><input type="button" value="MORE INFO" class="infoButton" /></a>
												</p> 
											</div>
									</div>
								</div>
							</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>