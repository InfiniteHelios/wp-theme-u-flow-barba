
<?php 

	//Titel Loop
	if( have_rows('inhaltsblock') ): 
		while ( have_rows('inhaltsblock') ) : the_row();

		if (get_row_layout() == 'inhaltsverzeichnis') {$anchors[] = get_sub_field('uberschrift');}


		if( get_row_layout() == 'titel_bild' ){	
			get_template_part('template-parts/content-parts/002_titel', 'titel');}
		
		if ($anchors){
				if( get_row_layout() == 'themenblock' ){
				$titel = get_sub_field('einzigartiger_name');
				echo '<a href="#' . sanitize_title($titel) . '" class="d-block outer mt7 anchor bold"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 9 9" class="svg-symbol-arrow" preserveAspectRatio="xMinYMin meet" role="img" aria-label="Icon"><path d="M6.293 4L3.646 1.354l.708-.708L8.207 4.5 4.354 8.354l-.708-.707L6.293 5H0V4z"></path></svg> ' . $titel . '</a>';}	
		 }


		endwhile; 
	endif;
?>


<section id="overview" class="entry-content">
<?php 



	//Content Loop
	if( have_rows('inhaltsblock') ): 

		// loop through all the rows of flexible content
		while ( have_rows('inhaltsblock') ) : the_row();


		// Einspalter - onerow
		if( get_row_layout() == 'einspalter' ){		
			get_template_part('template-parts/content-parts/003_einspalter', 'onerow');} 


		// Zweispalter - tworow
		if( get_row_layout() == 'zweispalter' ){		
			get_template_part('template-parts/content-parts/004_zweispalter', 'tworow');} 


		// Mehrspalter - mrows
		if( get_row_layout() == 'mehrspalter' ){
			get_template_part('template-parts/content-parts/005_mehrspalter', 'mrows');} 	

		
		// Tabelle - stable
		if( get_row_layout() == 'tabelle' ){
			get_template_part('template-parts/content-parts/006_tabelle', 'stable');}

		
		// Akkordeon
		if( get_row_layout() == 'akkordeon' ){
			get_template_part('template-parts/content-parts/030_akkordeon', 'akkordeon');} 				

				
		// YouTube
		if( get_row_layout() == 'youtube' ){
			get_template_part('template-parts/content-parts/040_youtube', 'youtube');} 					

						
		// Abstand
		if( get_row_layout() == 'abstand' ){		
			get_template_part('template-parts/content-parts/050_abstand', 'abstand');}	


		// Medien-Galerie
		if( get_row_layout() == 'mediengalerie' ){		
			get_template_part('template-parts/content-parts/200_mediengalerie', 'mediengalerie');}			
			

		// Weitere Themen
		if( get_row_layout() == 'weitere_themen' ){
			get_template_part('template-parts/content-parts/400_weiterethemen', 'themen');}	

		// Weitere Kategorien
		if( get_row_layout() == 'fotokategorien' ){
			get_template_part('template-parts/content-parts/401_fotokategorien', 'themen_categorien');}	
			
		
		// C2A
		if( get_row_layout() == 'call2action' ){
			get_template_part('template-parts/content-parts/500_call2action', 'c2a');}
			
		
		// Section
		if( get_row_layout() == 'themenblock' ){
			get_template_part('template-parts/content-parts/600_section', 'themenblock');}
			
		endwhile; 

	endif; ?>
	
</section>