<?php
echo '<h2>' . $examination->examination_description . '</h2>';
echo $menus;
echo $navigators;
echo form_open('examinations/detail_handler');
echo form_hidden('examination_id',$examination->id);
echo form_label('lesson','lesson_id',array('class'=>'text_float_medium'));
echo form_dropdown('lesson_id', $lessons,0) . '<br />';
echo form_label('start','Start',array('class'=>'text_float_medium'));
echo form_input('date','','class="dtpicker"') . '<br />';
echo form_submit('save','Save','class="button"');
echo form_submit('close','Close','class="button"');
echo form_close();