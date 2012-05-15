<?php
echo $menus;
echo $navigators;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>Name</th><th>Description</th><th colspan=2>Action</th></tr>';
echo '</thead>';
echo '<tbody>';
foreach ($lessons as $lesson){
	$table_row = '<tr><td>' . $lesson->name . '</td>';
	$table_row.= '<td>' . $lesson->lesson_description . '</td>';
	$table_row.= '<td>' . anchor('lessons/edit/id/' . $lesson->id,'Edit','class="text_link"') . '</td>';
	$table_row.= '<td>' . anchor('lessons/remove/id/' . $lesson->id,'Remove','class="text_link"') . '</td>';
	$table_row.= '</tr>';
	echo $table_row;
}
echo '</tbody>';
echo '</table>';