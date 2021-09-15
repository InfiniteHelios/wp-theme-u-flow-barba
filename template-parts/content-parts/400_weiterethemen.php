<?php
/**
 * Inhalte in einer Spalte
 *
 */

$topicselect = get_sub_field('themenart');

?>


<?php if($topicselect == 'Artikel'): ?>

<div class="mb">
	
	<?php	
		$ids = get_sub_field('seiten_auswahlen');

		foreach ( $ids as $angID ) { 
			
		if($num == -1){$pl = 'dflex-r'; $pr = '';}else{$pl = ''; $pr = 'dflex-r';}	
				
			$url = get_the_permalink( $angID->ID );	
				
			echo '<a href="' . $url . '" rel="bookmark"><div class="d-flex">';	
				
			echo '<div class="w50 ' . $pl . '"><img data-src="' . get_the_post_thumbnail_url($angID->ID, 'rcaltlarge') . '" class="lazyload blur-up blur-up-w" alt="' . get_the_title($angID->ID) . '"></div>';

				echo '<div class="w50 ' . $pr . '"><div class="post-description">
				<h2 class="entry-title highlight m0">' . get_the_title($angID->ID) . '</h2>';
				
				
			
			if (have_rows('inhaltsblock',$angID->ID)) {
  	while (have_rows('inhaltsblock',$angID->ID)) {
		the_row();
		if( get_row_layout() == 'titel_bild'){
			echo '<p class="mt12">';
			the_sub_field('text');
			echo '</p>';
		}
	}
}
			
			
			

				echo '<button class="button mt12"><svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" class="svg-symbol-arrow" preserveAspectRatio="xMinYMin meet" role="img" aria-label="Icon"><path d="M6.293 4L3.646 1.354l.708-.708L8.207 4.5 4.354 8.354l-.708-.707L6.293 5H0V4z"></path></svg> Ansehen</button>

				</div></div>';

			echo '</div></a>';
		$num++;
		$num = $num * -1;	
		}

	 ?>

</div>

<?php endif; ?>





<?php if($topicselect == 'Bildkategorie'): ?>

<div class="mb outer-alt">		
	<div class="outer">	
<?php

$query_images_args = array(
    'post_type' => 'attachment',
    'post_mime_type' =>'image',
    'post_status' => 'inherit',
    'posts_per_page' => -1,
	'meta_key'		=> 'im_shop_verfugbar',
	'meta_value'	=> '1'
);

$query_images = new WP_Query( $query_images_args );
$images = array();
foreach ( $query_images->posts as $image) {
    $imageurl = wp_get_attachment_url( $image->ID, 'rcmedlarge' );
	$imageid = attachment_url_to_postid( $imageurl );
	$imagename = get_the_title( $image->ID );
	$sc = '[exif id='.$imageid.']';
	

	echo '<div class="col-container d-grid-7030 mb23"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' . $imageurl . '" alt="' . $imagename . '" class="lazyload blur-up" />'; 
	echo '<div><h2 class="uppercase small">' . $imagename . '</h2>' . do_shortcode( $sc ) . '<a href="https://uflow7.de/mkp/contact/?interest=' . $imagename . '" class="button">Request licence</a></div></div>';

}
?>

	</div>
</div>

<?php endif; ?>
