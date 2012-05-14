<?php
echo $menus;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>Nick Name</th><th>First Name</th><th>Last Name</th><th>Sex</th><th colspan=2>Action</th></tr>';
echo '</thead>';
echo '<tbody>';
foreach ($students as $student){
	$sex = ($student->sex==0)?'Male':'Female';
	$table_row = '<tr><td>' . $student->nick_name . '</td>';
	$table_row.= '<td>' . $student->first_name . '</td>';
	$table_row.= '<td>' . $student->last_name . '</td>';
	$table_row.= '<td>' . $sex . '</td>';
	$table_row.= '<td>' . anchor('students/edit/' . $student->id,'Edit','class="text_link"') . '</td>';
	$table_row.= '<td>' . anchor('students/remove/' . $student->id,'Edit','class="text_link"') . '</td>';
	$table_row.= '</tr>';
	echo $table_row;
}
echo '</tbody>';
echo '</table>';