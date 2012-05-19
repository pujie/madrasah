<?php
echo $menus;
echo $navigators;
echo '<table class="common_table">';
echo '<thead><tr><th>Name</th><th>Action</th></tr></thead>';
echo '</tbody>';
foreach ($examination->lessons as $lesson){
	echo '<tr><td>' . $lesson->name . '</td><td>' . anchor('examinations/remove_detail/examination/' .  $examination->id . '/lesson/' . $lesson->id,'Remove','class="text_link"') . '</td></tr>';
}
echo '</tbody>';
echo '</table>';