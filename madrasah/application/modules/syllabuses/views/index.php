<?php
echo $menus;
echo $navigators;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>No</th><th>Description</th><th>Detail</th><th colspan=2>Action</th></tr>';
echo '</thead>';
foreach ($syllabuses as $syllabus){
	echo '<tr><td>' . $syllabus->id . '</td><td>' . $syllabus->syllabus_description . '</td><td>' . anchor('syllabus/detail','Detail','class="text_link"') . '</td><td>' . anchor('syllabus/edit','Edit','class="text_link"') . '</td><td>' . anchor('syllabus/remove','Remove','class="text_link"') . '</td></tr>';
}
echo '</table>';