<?php
echo $drop_menus;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>No</th><th>Name</th></tr>';
echo '</thead>';
$c=1;
echo '<tbody>';
foreach ($seasons as $season){
	echo '<tr><td>' . $c . '</td><td>' . $season->name . '</td></tr>';
	$c++;
}
echo '</tbody>';
echo '</table>';