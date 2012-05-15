<?php
echo form_open('lessons/edit_handler');
echo form_hidden('id',$lesson->id);

echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name',$lesson->name) . '<br />';
echo form_label('Description','lesson_description',array('class'=>'text_float_medium'));
echo form_input('lesson_description',$lesson->lesson_description) . '<br />';

echo form_submit('save','Save');
echo form_close();