<?php
$start_array = explode('-',$examination->date1);
$start=$start_array[2] . '/' . $start_array[1] . '/' . $start_array[0]; 
$end_array = explode('-',$examination->date2);
$end=$end_array[2] . '/' . $end_array[1] . '/' . $end_array[0]; 
echo form_open('examinations/edit_handler');
echo form_hidden('id',$examination->id);

echo form_label('Season','season_id',array('class'=>'text_float_medium'));
echo form_dropdown('season_id',$seasons,$examination->season_id) . '<br />';
echo form_label('Start','date1',array('class'=>'text_float_medium'));
echo form_input('date1',$start,'class="dtpicker"') . '<br />';
echo form_label('End','date2',array('class'=>'text_float_medium'));
echo form_input('date2',$end,'class="dtpicker"') . '<br />';
echo form_label('Description','examination_description',array('class'=>'text_float_medium'));
echo form_input('examination_description',$examination->examination_description) . '<br />';

echo form_submit('save','Save','class="button"');
echo form_submit('close','Close','class="button"');
echo form_close();