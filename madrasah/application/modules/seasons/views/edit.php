<?php
$start_array = explode('-',$season->date1);
$start=$start_array[2] . '/' . $start_array[1] . '/' . $start_array[0]; 
$end_array = explode('-',$season->date2);
$end=$end_array[2] . '/' . $end_array[1] . '/' . $end_array[0];
$is_current = ($season->is_current=='1')?TRUE:FALSE; 
echo form_open('seasons/edit_handler');
echo form_hidden('id',$season->id);

echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name',$season->name) . '<br />';
echo form_label('Start','start',array('class'=>'text_float_medium'));
echo form_input('start',$start,'class="dtpicker"') . '<br />';
echo form_label('End','end',array('class'=>'text_float_medium'));
echo form_input('end',$end,'class="dtpicker"') . '<br />';
echo form_label('syllabus','syllabus',array('class'=>'text_float_medium'));
echo form_dropdown('syllabus', $syllabuses,$season->syllabus_id) . '<br />';
echo form_label('Class','app_class',array('class'=>'text_float_medium'));
echo form_dropdown('app_class', $classes,$season->class_id) . '<br />';
echo form_label('Is current','is_current',array('class'=>'text_float_medium'));
echo form_checkbox(array('name'=>'is_current','checked'=>$is_current)) . '<br />';
echo form_label('Description','season_description',array('class'=>'text_float_medium'));
echo form_input('season_description',$season->season_description) . '<br />';
echo form_submit('save','Save','class="button"');
echo form_submit('close','Close','class="button"');
echo form_close();