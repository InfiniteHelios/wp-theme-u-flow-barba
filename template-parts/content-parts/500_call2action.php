<?php
/**
 * Inhalte in einer Spalte
 *
 */

?>

<div id="<?php echo sanitize_title($titel);?>" class="outer">	
	<div class="inner inner-one">

		
		<?php 

		$layout = get_sub_field('layout');
		$icon = get_sub_field('icon');
		$beschreibung = get_sub_field('beschreibung');
		  
		echo '<div class="' . $layout . '">';		
				  if($icon){echo '<img data-src="' . $icon['url'] . '" class="lazyload w52"/>';}		
				  echo '<h2>' . $titel . '</h2><p>' . $beschreibung . '</p>
			   </div>';

	?>	
		
		
	
	<?php $formular = get_sub_field('call2action_auswahlen');
	
	if($formular == 'Bewertung'){echo 'Kein Formular vorhanden';}
	if($formular == 'Beratungstermin'){echo do_shortcode( '[contact-form-7 id="490" title="Contact form 1"]' ); }
	if($formular == 'Newsletter'){echo 'Kein Formular vorhanden';}
	if($formular == 'Social Media'){echo 'Kein Formular vorhanden';}

?>

	</div>	
</div>		
