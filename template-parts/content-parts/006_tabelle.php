<?php /** Tabellen Modul */ ?>
	
<div class="outer mb">
	<div class="inner">
<?php 
$table = get_sub_field('tabelle');
$titel = get_sub_field('uberschrift_tabelle');
if ( ! empty ( $table ) ) {
    echo '<table class="tablemodul">';
        if ($titel) { echo '<caption class="uppercase bold text-left">' . $titel . '</caption>';}
        echo '<tbody>';
            foreach ( $table['body'] as $tr ) {
                echo '<tr>';
                    foreach ( $tr as $td ) {echo '<td>' .  $td['c'] . '</td>';}
                echo '</tr>';
            }
        echo '</tbody></table>';
}?>
	</div>
</div>
