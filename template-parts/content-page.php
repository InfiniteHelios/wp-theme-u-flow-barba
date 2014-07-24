<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package u-flow
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
		<?php

		$postimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'ularge' );
		$postimgURL = $postimg[0];

		$color = get_field('farbe');
		if($color == 'blue'){$buttonCol = 'bg-blue';}
		elseif($color == 'red'){$buttonCol = 'bg-red';}
		else{$buttonCol = 'bg-green';}
		 
		echo '<img src="'. $postimgURL .'" class="lazyload">';
		
		echo '<div class="entry-box">';
	
		the_title( '<h1 class="entry-title fly-ani ttuc">', '</h1>' ); 

		
		echo '<p class="entry-title-sub js-scroll fade-in-bottom scrolled fff ttuc">Service und Sicherheitsdienst Allg&auml;u</p>
		
		<p class="fff ttuc js-scroll fade-in-bottom scrolled">Nehmen Sie jetzt Kontakt auf!</p>
		
		<a href="/" class="button2 js-scroll fade-in-bottom scrolled p-rel ' . $buttonCol . '" style="display: block; width: fit-content;">Kostenfreie Beratung <img src="https://uflow7.de/alpg/wp-content/uploads/2021/09/button-arrow.png" class="button-arrow"/></a>

		
		</div>';

		echo '<div class="grueten-container">';
		if($color == 'blue'){echo '<img src="https://uflow7.de/alpg/wp-content/uploads/2021/09/BG_Gruenten-1.png" class="lazyload gruenten">';}
		elseif($color == 'red'){echo '<img src="https://uflow7.de/alpg/wp-content/uploads/2021/09/red.png" class="lazyload gruenten">';}
		else{echo '<img src="https://uflow7.de/alpg/wp-content/uploads/2021/09/green.png" class="lazyload gruenten">';}
		echo '</div>';
		
		?>
		
	</header><!-- .entry-header -->



		<?php

		get_template_part( 'template-parts/content-parts/001_main', 'acfcontent' );
		
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'u-flow' ),
				'after'  => '</div>',
			)
		);
		?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'u-flow' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
