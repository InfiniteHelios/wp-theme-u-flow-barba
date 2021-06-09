<?php /** Texte in einer Spalte */ ?>

<?php $layout = get_sub_field('layout'); ?>

<div class="mb outer js-scroll fade-in-bottom <?php the_sub_field('hintergrundfarbe'); ?> <?php the_sub_field('layout_text'); ?>">
	<div class="inner inner-two">
		<div class="<?php echo $layout; ?>">
		<?php 

		$titel = get_sub_field('uberschrift'); 
		$utitel = get_sub_field('untertitel'); 
		$einleitung = get_sub_field('einleitung'); 

		if($titel){ echo '<h2><span class="d-block u-titel">' . $utitel . '</span><span>' . $titel . '</span></h2>'; }
		echo '<div class="line"></div>';
		if($einleitung){ echo '<p class="pretext">' . $einleitung . '</p>'; } 

		?>
			<?php the_sub_field('text'); ?>

			<?php $button = get_sub_field('button'); $link = get_sub_field('link');	 if($button){ echo '<a href="' . $link . '" class="button">' . $button . '</a>'; } ?>
			
		</div>
		<div class="<?php echo $layout; ?>">
		<?php $bild = get_sub_field('bild'); ?>

									<div class="img-box mb23 js-scroll fade-in-bottom" >
										<img class="lazyload " src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $bild['sizes']['umediumq']; ?>" alt="<?php echo $bild['title'] ?>" />
									</div>
			
		</div>
		<div class="title-extra-<?php echo $layout; ?>"><?php echo $titel;?></div>
	</div>
</div>
	