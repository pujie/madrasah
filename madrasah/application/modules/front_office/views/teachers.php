<?php
echo $drop_menus;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>No</th><th>Name</th></tr>';
echo '</thead>';
$c=1;
echo '<tbody>';
foreach ($teachers as $teacher){
	echo '<tr><td>' . $c . '</td><td>' . $teacher->first_name . '</td></tr>';
	$c++;
}
echo '</tbody>';
echo '</table>';