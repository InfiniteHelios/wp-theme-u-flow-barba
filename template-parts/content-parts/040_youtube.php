<?php
/**
 * Bild/YouTube
 *
 */
?>


<div class="mb outer-alt">	
	
<?php 
$layout = get_sub_field('layout'); 
$bild = get_sub_field('bild'); 
$yt = get_sub_field('youtube'); 
$code = get_sub_field('code'); 

$id = $bild['id'];
$sc = '[exif id='.$id.']';

 ?>	


	<?php if($layout == 'Bild'): ?>	
	<div class="p-rel line-height-0 gallery-image">
		<picture>
			<!--[if IE 9]><video style="display: none"><![endif]-->
			<source data-srcset="<?php echo $bild['sizes']['rcaltlarge'] ?>" media="(min-width: 1200px)" />
			<source data-srcset="<?php echo $bild['sizes']['rcmedlarge'] ?>" media="(min-width: 480px)" />
			<source data-srcset="<?php echo $bild['sizes']['rcaltmedium'] ?>" media="(max-width: 480px)" />
			<!--[if IE 9]></video><![endif]-->
			<img class="lazyload blur-up blur-up-w" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-sizes="auto" data-src="<?php echo $bild['sizes']['rcaltlarge'] ?>" alt="<?php echo $bild['title'] ?>" />
		</picture>
		
		<div class="modal-button info uppercase" href="#exif'.$id.'"><?php echo $bild['title'] ?></div>
	</div>

	<?php endif ?>
	
	<?php if($layout == 'YouTube' ):  ?>	
		<div class="youtube">		
			<?php echo $yt; ?>			
		</div>
	<?php endif ?>
		
		<?php if($layout == 'Code' ):  ?>	
		<div class="code">		
			<?php echo $code; ?>
		</div>
	<?php endif ?>

</div>
