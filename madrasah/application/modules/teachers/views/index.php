<?php
echo $menus;
echo $navigators;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>Nick Name</th><th>First Name</th><th>Last Name</th><th>Sex</th><th colspan=2>Action</th></tr>';
echo '</thead>';
echo '<tbody>';
foreach ($teachers as $teacher){
	$sex = ($teacher->sex==0)?'Male':'Female';
	$table_row = '<tr><td>' . $teacher->nick_name . '</td>';
	$table_row.= '<td>' . $teacher->first_name . '</td>';
	$table_row.= '<td>' . $teacher->last_name . '</td>';
	$table_row.= '<td>' . $sex . '</td>';
	$table_row.= '<td>' . anchor('teachers/edit/' . $teacher->id,'Edit','class="text_link"') . '</td>';
	$table_row.= '<td>' . anchor('teachers/remove/' . $teacher->id,'Remove','class="text_link"') . '</td>';
	$table_row.= '</tr>';
	echo $table_row;
}
echo '</tbody>';
echo '</table>';