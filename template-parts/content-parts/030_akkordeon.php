<?php /* Accordion */ ?>

<?php $accs = get_sub_field('akkordeon_reiter'); ?>

<div class="outer mb">
	<div class="accordion inner">
<?php
if( have_rows('akkordeon_reiter') ):
    while ( have_rows('akkordeon_reiter') ) : the_row();
			$titel = get_sub_field('uberschrift');
			$text = get_sub_field('text');
			$img = get_sub_field('bild');	
?>
		
		<h4 class="accordion-toggle"><?php echo $titel; ?></h4>
		<div class="accordion-content">
			<div class="col-container d-flex">
				<div class="col">
				<?php echo $text; ?>
				</div>
				<div class="col">
				<img class="lazyload float-l" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $img['sizes']['rcmedium']; ?>" alt="<?php echo $img['title'] ?>" /> 
				</div>
			</div>
		</div>
		
<?php
	endwhile;
endif;
?>					

	</div>
</div>	

