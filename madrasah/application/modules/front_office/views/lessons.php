<?php
echo $drop_menus;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>No</th><th>Name</th></tr>';
echo '</thead>';
$c=1;
echo '<tbody>';
foreach ($lessons as $lesson){
	echo '<tr><td>' . $c . '</td><td>' . $lesson->name . '</td></tr>';
	$c++;
}
echo '</tbody>';
echo '</table>';