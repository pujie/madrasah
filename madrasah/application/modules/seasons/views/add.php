<?php
echo form_open('seasons/add_handler');

echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name') . '<br />';
echo form_label('Start','start',array('class'=>'text_float_medium'));
echo form_input('start','','class="dtpicker"') . '<br />';
echo form_label('End','end',array('class'=>'text_float_medium'));
echo form_input('end','','class="dtpicker"') . '<br />';

echo form_label('Description','season_description',array('class'=>'text_float_medium'));
echo form_input('season_description') . '<br />';
echo form_submit('save','Save');
echo form_close();