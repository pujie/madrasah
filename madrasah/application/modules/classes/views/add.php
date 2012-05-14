<?php
echo form_open('classes/add_handler');
echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name') . '<br />';
echo form_label('Description','class_description',array('class'=>'text_float_medium'));
echo form_input('class_description') . '<br />';
echo form_submit('save','Save','class="button"');
echo form_close();