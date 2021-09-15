<?php
/**
 * Inhalte in einer Spalte
 *
 */
?>

<div class="mb outer-alt">
	
<?php $auswahl = get_sub_field('auswahl_format');?>


	<?php if($auswahl == 'Untereinander'): 

			$bilder = get_sub_field('galeriebilder'); 

		    $bilderx = count( $bilder );
	?>
			<div class="">
			<?php foreach ( $bilder as $bild ) {
		
			$id = $bild['id'];
			$sc = '[exif id='.$id.']';

			$width = $bild['width'];
			$height = $bild['height'];
			$dim = $width/$height;
		
			if($dim > 2.3){$bilder_format = 'basic5_2';}
			elseif($dim > 1.7 && $dim <= 2.3){$bilder_format = 'basic2_1';}
			elseif($dim > 1.4 && $dim <= 1.7){$bilder_format = 'basic3_2';}
			elseif($dim > 1.2 && $dim <= 1.4){$bilder_format = 'basic4_3';}
			elseif($dim > 0.9 && $dim <= 1.2){$bilder_format = 'basic1_1';}
			elseif($dim > 0.7 && $dim <= 0.9){$bilder_format = 'basic3_4';}
			elseif($dim <= 0.7){$bilder_format = 'basic2_3';}
		
			echo '
			<div class="p-rel mb gallery-image">
			
			<figure>
			<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' . $bild['sizes'][$bilder_format] . '" alt="' . $bild['title'] . '" class="lazyload blur-up" />
			<figcaption><button class="modal-button info uppercase" href="#exif'.$id.'">' . $bild['title'] . ' | &#36;</button></figcaption>
			</figure>

			<div id="exif' . $id . '" class="modal">
			  <!-- Modal content -->
			  <div class="modal-content">
				<div class="modal-header">
				  <span class="close">&times;</span>
				  <h3>'.$bild['title'].'</h3>
				</div>
				<div class="modal-body">
				<div> ' . do_shortcode( $sc ) . '<small>Dimension: ' . $dim . '</small></div>
				</div>
				<div class="modal-footer"> 
				  <a href="https://uflow7.de/mkp/contact/?interest=' . $bild['title'] . '" class="licence">Request licence</a>
				</div>
			  </div>
			</div>

			</div>';
}
?>
			
				
<script>
var btn = document.querySelectorAll("button.modal-button, .modal-button .uppercase");
var btnspan = document.querySelectorAll("button.modal-button .uppercase");	
var modals = document.querySelectorAll(".modal");
var spans = document.getElementsByClassName("close");

for (var i = 0; i < btn.length; i++) {
 btn[i].onclick = function(e) {
    e.preventDefault();
    modal = document.querySelector(e.target.getAttribute("href"));
    modal.style.display = "block";
 }
}

	
for (var i = 0; i < spans.length; i++) {
 spans[i].onclick = function() {
    for (var index in modals) {
      if (typeof modals[index].style !== "undefined") modals[index].style.display = "none";    
    }
 }
}

window.onclick = function(event) {
    if (event.target.classList.contains("modal")) {
     for (var index in modals) {
      if (typeof modals[index].style !== "undefined") modals[index].style.display = "none";    
     }
    }
}
</script>
			</div>
	<?php endif; ?>	
	

	<?php if($auswahl == 'Raster'): 

			$bilder = get_sub_field('galeriebilder'); 
			$bilder_format = get_sub_field('bildhohe'); 

		    $bilderx = count( $bilder );
	?>
			<div class="<?php echo 'grid grid-' . $bilderx; ?>">
			<?php foreach ( $bilder as $bild ) {
			echo '<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' . $bild['sizes'][$bilder_format] . '" alt="' . $bild['title'] . '" class="lazyload blur-up grid_item" />';} ?>
			</div>
	<?php endif; ?>	

	
	<?php if($auswahl == 'Slider'): ?>
	
	<script>window.addEventListener('load', function(){
						new Glider(document.querySelector('.glider-gal-<?php echo get_row_index(); ?>'), {
						slidesToShow: 1,
						draggable: true,
						duration: 0.7,
							rewind: true,
						arrows: {
								prev: '.glider-prev-<?php echo get_row_index(); ?>',
								next: '.glider-next-<?php echo get_row_index(); ?>'
								}
						});})</script>


			<?php $bilder = get_sub_field('galeriebilder'); ?>

			<div class="glider-contain embed-responsive embed-responsive-slider embed-responsive-slider-43">
				<div class="glider-gal-<?php echo get_row_index(); ?> embed-responsive-item">	
					<?php foreach ( $bilder as $bild ) { ?>	
						<div>
							<picture>
							<!--[if IE 9]><video style="display: none"><![endif]-->
							<source data-srcset="<?php echo $bild['sizes']['rcaltlarge'] ?>" media="(min-width: 1200px)" />
							<source data-srcset="<?php echo $bild['sizes']['rcmedlarge'] ?>" media="(min-width: 600px)" />
							<source data-srcset="<?php echo $bild['sizes']['rcaltmedium'] ?>" media="(max-width: 600px)" />
							<!--[if IE 9]></video><![endif]-->
							<img class="lazyload blur-up blur-up-w" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-sizes="auto" data-src="<?php echo $bild['sizes']['rcaltlarge'] ?>" alt="<?php echo $bild['title'] ?>" />
							</picture>
						</div>
					<?php $i++;}?>
				</div>
				<div class="glider-buttons fff">
						<button role="button" aria-label="Previous" class="glider-prev glider-prev-<?php echo get_row_index(); ?> fff"></button>
						<button role="button" aria-label="Next" class="glider-next glider-next-<?php echo get_row_index(); ?> fff"></button>
				</div>
			</div>
					
				
	
				
	
	<?php endif; ?>	

	<?php if($auswahl == 'Videos'): ?>

		<?php if(get_sub_field('youtube_videos')): 
			while(has_sub_field('youtube_videos')):
			$ytcode = get_sub_field('youtube_code'); ?>

			<a href="#" class="fff p-rel videomodaltrigger border2 embed-responsive embed-responsive-wimg" data-toggle="modal" data-target="#videoModal" data-videomodal="https://www.youtube-nocookie.com/embed/<?php echo $ytcode;?>">
			<img data-src="https://img.youtube.com/vi/<?php echo $ytcode;?>/maxresdefault.jpg" class="lazyload" />
			<div class="ytimgbutton"><span class="dashicons dashicons-arrow-right"></span> Video ansehen</div>
			</a>

	<?php endwhile; endif; endif;  ?>
	

</div>