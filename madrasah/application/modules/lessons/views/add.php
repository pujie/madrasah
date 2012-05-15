<?php
echo form_open('lessons/add_handler');

echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name') . '<br />';
echo form_label('Description','lesson_description',array('class'=>'text_float_medium'));
echo form_input('lesson_description') . '<br />';

echo form_submit('save','Save');
echo form_close();