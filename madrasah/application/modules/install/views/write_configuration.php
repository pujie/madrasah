<?php
	echo '<div class="general_form">';
	echo 'This step will write configuration files ...<br />';
	echo form_open('install/handler');
	echo form_hidden('step','write_configuration');
	echo form_submit('Next','next','class="button"');
	echo form_close();
	echo '</div>';