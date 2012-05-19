<?php
echo form_open('syllabuses/add_handler');

echo form_label('Description','syllabus_description',array('class'=>'text_float_medium'));
echo form_input('syllabus_description') . '<br />';
echo form_submit('save','Save','class="button"');
echo form_submit('close','Close','class="button"');
echo form_close();