<?php
echo $menus;
echo $navigators;

echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>Name</th><th colspan=2>Action</th></tr>';
echo '</thead>';
foreach ($classes as $class){
	echo '<tr><td>' . $class->name . '</td><td>' . anchor('classes/edit','Edit','class="text_link"') . '</td><td>' . anchor('classes/remove','Remove','class="text_link"') . '</td></tr>';
}
echo '</table>';