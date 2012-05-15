<?php
echo $menus;
echo $navigators;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>Name</th><th>Period</th><th>Description</th><th colspan=2>Action</th></tr>';
echo '</thead>';
echo '<tbody>';
foreach ($seasons as $season){
	$start_array = explode('-',$season->date1);
	$start=$start_array[2] . '-' . $start_array[1] . '-' . $start_array[0]; 
	$end_array = explode('-',$season->date2);
	$end=$end_array[2] . '-' . $end_array[1] . '-' . $end_array[0]; 
	$table_row = '<tr><td>' . $season->name . '</td>';
	$table_row.= '<td>' . $start . ' to ' . $end . '</td>';
	$table_row.= '<td>' . $season->season_description . '</td>';
	$table_row.= '<td>' . anchor('seasons/edit/id/' . $season->id,'Edit','class="text_link"') . '</td>';
	$table_row.= '<td>' . anchor('seasons/remove/id/' . $season->id,'Remove','class="text_link"') . '</td>';
	$table_row.= '</tr>';
	echo $table_row;
}
echo '</tbody>';
echo '</table>';