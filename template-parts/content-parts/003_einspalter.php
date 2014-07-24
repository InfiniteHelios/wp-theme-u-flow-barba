<?php /** Texte in einer Spalte */ ?>



<div class="mb outer js-scroll fade-in-bottom <?php echo the_sub_field('hintergrundfarbe'); $layout = get_sub_field('layout_text'); echo " " . $layout; ?>">
	<div class="inner inner-one">
		<?php 
		$titel = get_sub_field('uberschrift'); 
		$utitel = get_sub_field('untertitel'); 
	    if($layout == 'text-center-p'){ echo '<img data-src="https://uflow7.de/alpg/wp-content/uploads/2021/09/BG_Gruenten.png" class="lazyload fancy-title" />'; } 
		if($titel){ echo '<h2><span>' . $titel . '</span><span class="d-block u-titel">' . $utitel . '</span></h2>'; } 

		?>
			<?php the_sub_field('text'); ?>

			<?php $button = get_sub_field('button'); $link = get_sub_field('link');	 if($button){ echo '<a href="' . $link . '" class="button">' . $button . '</a>'; } ?>
	</div>
</div>
	