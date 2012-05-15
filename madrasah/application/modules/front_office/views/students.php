<?php
echo $drop_menus;
echo '<table class="common_table">';
echo '<thead>';
echo '<tr><th>No</th><th>Name</th><th>Address</th></tr>';
echo '</thead>';
$c=1;
echo '<tbody>';
foreach ($students as $student){
	echo '<tr><td>' . $student->nrp . '</td><td>' . $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name .  ' (' . $student->nick_name . ')' . '</td><td>' . $student->address . ' ' . $student->city . '</td></tr>';
	$c++;
}
echo '</tbody>';
echo $this->pagination->create_links();