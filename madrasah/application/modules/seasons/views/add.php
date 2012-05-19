<?php
echo form_open('seasons/add_handler');

echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name') . '<br />';
echo form_label('Start','start',array('class'=>'text_float_medium'));
echo form_input('start','','class="dtpicker"') . '<br />';
echo form_label('End','end',array('class'=>'text_float_medium'));
echo form_input('end','','class="dtpicker"') . '<br />';
echo form_label('syllabus','syllabus',array('class'=>'text_float_medium'));
echo form_dropdown('syllabus', $syllabuses,0) . '<br />';
echo form_label('Class','app_class',array('class'=>'text_float_medium'));
echo form_dropdown('app_class', $classes,0) . '<br />';
echo form_label('Is current','is_current',array('class'=>'text_float_medium'));
echo form_checkbox(array('name'=>'is_current','checked'=>TRUE)) . '<br />';
echo form_label('Description','season_description',array('class'=>'text_float_medium'));
echo form_input('season_description') . '<br />';
echo form_submit('save','Save','class="button"');
echo form_submit('close','Close','class="button"');
echo form_close();