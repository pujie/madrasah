<?php
echo form_open('sylabuses/edit_handler');
echo form_hidden('id',$examination->id);

echo form_label('Description','syllabus_description',array('class'=>'text_float_medium'));
echo form_input('syllabus_description') . '<br />';
echo form_submit('save','Save');
echo form_close();