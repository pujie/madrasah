<?php
echo form_open('examinations/add_handler');

echo form_label('Season','season_id',array('class'=>'text_float_medium'));
echo form_dropdown('season_id',$seasons,1) . '<br />';
echo form_label('Start','start',array('class'=>'text_float_medium'));
echo form_input('date1','','class="dtpicker"') . '<br />';
echo form_label('End','end',array('class'=>'text_float_medium'));
echo form_input('date2','','class="dtpicker"') . '<br />';

echo form_label('Description','examination_description',array('class'=>'text_float_medium'));
echo form_input('examination_description') . '<br />';
echo form_submit('save','Save','class="button"');
echo form_submit('close','Close','class="button"');
echo form_close();