<?php /*Mehspalter mit Funktionen*/

/**Funktionen abhängig von Spaltenzahl**/ 							
	$count = count(get_sub_field('mehrspalter'));
	if($count == 2){$hoption = 'h2';}else{$hoption = 'h3';}
?>

	<div class="outer-alt <?php the_sub_field('hintergrundfarbe'); ?> mb">
		<div class="inner-col-<?php echo $count; ?>">
			<div class="col-container d-grid">
				
				
		<?php $layout = get_sub_field('layout'); ?>	
		<?php if( have_rows('mehrspalter') ): ?>
				<?php while( have_rows('mehrspalter') ): the_row(); ?>
			
				
					<div class="col <?php echo $layout; ?> p-rel">
					<div class="col-padding">

					<?php /**Funktion Module Darstellen**/ ?>		
					<?php if( have_rows('inhalte') ): ?>
							<?php while( have_rows('inhalte') ): the_row();?>
						
						
								<?php /***Funktion Titelbox***/ ?>
								<?php if( get_row_layout() == 'titelbox' ): ?>
									<?php $titel = get_sub_field('uberschrift'); ?>
									<?php $titel2 = get_sub_field('untertitel'); ?>
									<<?php echo $hoption; ?>>
										<span class="d-block"><?php echo $titel;?></span>
										<span class="d-block u-titel"><?php echo $titel2;?></span>
									</<?php echo $hoption; ?>>
								<?php endif; ?>
						
								<?php /***Funktion Textbox***/ ?>
								<?php if( get_row_layout() == 'textbox' ): ?>
									<div class="textbox">
									<?php the_sub_field('text'); ?>
									</div>
								<?php endif; ?>
						

								<?php /***Funktion Bildbox***/ ?>
								<?php if( get_row_layout() == 'bildbox' ): ?>	
									<?php $bild = get_sub_field('bild'); ?>
									<?php $grose = get_sub_field('grose'); ?>
			
									<div class="img-box mb23 js-scroll fade-in-bottom" >
										<img class="lazyload <?php echo $grose; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $bild['sizes'][$grose]; ?>" alt="<?php echo $bild['title'] ?>" />
									</div>
								<?php endif; ?>


								<?php /***Funktion Slider***/ ?>
								<?php if( get_row_layout() == 'slider' ): ?>	
				
					<script>window.addEventListener('load', function(){
						new Glider(document.querySelector('.glider-column'), {
						slidesToShow: 1,
						draggable: true,
						duration: 0.7,
							rewind: true,
						arrows: {
								prev: '.glider-prev-col',
								next: '.glider-next-col'
								}
						});})</script>
				
									<div class="glider-contain mb23">
										<div class="glider-column">
											<?php $bilder = get_sub_field('bilder'); ?>
											<?php foreach ( $bilder as $bild ) {echo '<div class="preload"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' . $bild['sizes']['rcmedium'] . '" alt="' . $bild['title'] . '" class="lazyload blur-up"/></div>';} ?>
										</div>
										<div class="glider-buttons fff">
											<button role="button" aria-label="Previous" class="glider-prev glider-prev-col fff">&laquo;</button>
											<button role="button" aria-label="Next" class="glider-next glider-next-col fff">&raquo;</button>
										</div>
									</div>
								<?php endif; ?>


								<?php /***Funktion Akkordeon***/ ?>
								<?php if( get_row_layout() == 'akkordeonbox' ): ?>
										<div class="accordion">
										<?php
										if( have_rows('akkordeon_reiter') ):
											while ( have_rows('akkordeon_reiter') ) : the_row();
													$titel = get_sub_field('uberschrift');
													$text = get_sub_field('text');		
										echo '<h4 class="accordion-toggle">' . $titel . '</h4>';
										echo '<div class="accordion-content">' . $text . '</div>';
											endwhile;
										endif;
										?>					
										</div>
								<?php endif; ?>
			
			
								<?php /***Funktion Tabelle***/ ?>
								<?php if( get_row_layout() == 'tabellenbox' ): 
									$table = get_sub_field('tabelle');
									$titel = get_sub_field('uberschrift_tabelle');
									if ( ! empty ( $table ) ) {
										echo '<table class="tablemodul">';
											if ($titel) { echo '<caption class="uppercase bold text-left">' . $titel . '</caption>';}
											echo '<tbody>';
												foreach ( $table['body'] as $tr ) {
													echo '<tr>';
														foreach ( $tr as $td ) {echo '<td>' .  $td['c'] . '</td>';}
													echo '</tr>';
												}
											echo '</tbody></table>';
									}?>
								<?php endif; ?>
			

								<?php /***Funktion Button***/ ?>
								<?php if( get_row_layout() == 'button' ): 
										$bezeichnung = get_sub_field('beschriftung'); 
										$link = get_sub_field('link');
								?>
										<?php if($bezeichnung): ?><a href="<?php echo $link; ?>" class="button bottom-a d-inline-block"><?php echo $bezeichnung; ?></a><?php endif; ?>
								<?php endif; ?>
						
						
						
							<?php endwhile; ?>
					<?php endif; ?>
					
					</div><!--col-padding-->
					</div><!--col-->
						
				<?php endwhile; ?>
		<?php endif; ?>
			</div>	
		</div>
	</div>
