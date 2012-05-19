<?php
echo $menus;
echo $navigators;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>No</th><th>Description</th><th>Start</th><th>End</th><th>Season</th><th colspan=3>Action</th></tr>';
echo '</thead>';
foreach ($examinations as $examination){
$date1_array = explode('-', $examination->date1);
$start = $date1_array[2] . '/' . $date1_array[1] . '/' . $date1_array[0]; 
$date2_array = explode('-', $examination->date2);
$end = $date2_array[2] . '/' . $date2_array[1] . '/' . $date2_array[0]; 

	echo '<tr><td>' . $examination->id . '</td><td>' . $examination->examination_description . '</td><td>' . $start . '</td><td>' . $end . '</td><td>' . $examination->season->name . '</td><td>' . anchor('examinations/detail/id/' . $examination->id,'Detail') . '</td><td>' . anchor('examinations/edit/id/' . $examination->id,'Edit') . '</td><td>' . anchor('examinations/remove','Remove') . '</td></tr>';
}
echo '</table>';