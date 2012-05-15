<?php
$start_array = explode('-',$season->date1);
$start=$start_array[2] . '/' . $start_array[1] . '/' . $start_array[0]; 
$end_array = explode('-',$season->date2);
$end=$end_array[2] . '/' . $end_array[1] . '/' . $end_array[0]; 
echo form_open('seasons/edit_handler');
echo form_hidden('id',$season->id);

echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name',$season->name) . '<br />';
echo form_label('Start','start',array('class'=>'text_float_medium'));
echo form_input('start',$start,'class="dtpicker"') . '<br />';
echo form_label('End','end',array('class'=>'text_float_medium'));
echo form_input('end',$end,'class="dtpicker"') . '<br />';
echo form_label('Description','season_description',array('class'=>'text_float_medium'));
echo form_input('season_description',$season->season_description) . '<br />';

echo form_submit('save','Save');
echo form_close();