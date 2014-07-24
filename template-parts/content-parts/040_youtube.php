<?php
/**
 * Bild/YouTube
 *
 */
?>


<div class="mb outer-alt js-scroll fade-in-bottom">	
	
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
			<source data-srcset="<?php echo $bild['sizes']['ularge'] ?>" media="(min-width: 1200px)" />
			<source data-srcset="<?php echo $bild['sizes']['ularge'] ?>" media="(min-width: 480px)" />
			<source data-srcset="<?php echo $bild['sizes']['ularge'] ?>" media="(max-width: 480px)" />
			<!--[if IE 9]></video><![endif]-->
			<img class="lazyload blur-up blur-up-w" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-sizes="auto" data-src="<?php echo $bild['sizes']['ularge'] ?>" alt="<?php echo $bild['title'] ?>" />
		</picture>
		
		<div class="img-text-bg">
			<div class="img-text-center">
			<h2><?php echo $bild['title'] ?></h2>
			<p>Herausragende Leistungen lassen sich nur mit den besten Mitarbeitern verwirklichen. Gerade deshalb sind wir sehr stolz auf unser Team. Die Erfahrung aus vielen Eins&auml;tzen gibt uns das Gesp&uuml;r f&uuml;r den behutsamen Umgang mit riskanten Situationen.</p>
			</div>
		</div>
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
