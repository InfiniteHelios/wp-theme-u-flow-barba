<?php
/**
 * * Template Name: Video Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package u-flow
 */

get_header();
?>

<main id="primary" class="site-main">

		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
		<?php

		$upload_dir = wp_upload_dir();
		$video_path = $upload_dir['baseurl'].'/2021/09/Veranstaltungsschutz-Viehscheid-Thalkirchdorf-2018-__-AlpGuard-Service-GmbH.mp4';

		echo '<div class="fullsize-video-bg">
				<div class="video-viewport">
					<video width="1920" height="1280" autoplay muted loop>
						<source src="'.$video_path.'" type="video/mp4" />
					</video>
				</div>
			</div>';
		
		$color = get_field('farbe');
		if($color == 'blue'){$buttonCol = 'bg-blue';}
		elseif($color == 'red'){$buttonCol = 'bg-red';}
		else{$buttonCol = 'bg-green';}
		 
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


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
