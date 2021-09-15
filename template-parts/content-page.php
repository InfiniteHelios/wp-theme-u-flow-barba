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
		 
		echo '<img src="'. $postimgURL .'" class="lazyload">';
		
		the_title( '<h1 class="entry-title">', '</h1>' ); 
		
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
