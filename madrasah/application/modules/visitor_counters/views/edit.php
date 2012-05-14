<?php
	echo form_open('visitor_counters/edit_handler');
	echo form_label('Active','active',array('class'=>'text_float_medium'));
	echo form_dropdown('active',$active_option) . '<br />';
	echo form_label('Position','position',array('class'=>'text_float_medium'));
	echo form_dropdown('position',$position_option) . '<br />';
	echo form_submit('Save','save','class="button"');
	echo form_submit('Close','close','class="button"');
	echo form_close();