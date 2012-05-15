<?php
echo form_open('teachers/add_handler');
echo form_label('NRP','nrp',array('class'=>'text_float_medium'));
echo form_input('nrp') . '<br />';

echo form_label('First Name','first_name',array('class'=>'text_float_medium'));
echo form_input('first_name') . '<br />';
echo form_label('Mid Name','middle_name',array('class'=>'text_float_medium'));
echo form_input('middle_name') . '<br />';
echo form_label('Last Name','last_name',array('class'=>'text_float_medium'));
echo form_input('last_name') . '<br />';
echo form_label('Nick Name','nick_name',array('class'=>'text_float_medium'));
echo form_input('nick_name') . '<br />';
echo '<p />';
echo form_label('Sex','sex',array('class'=>'text_float_medium'));
echo form_dropdown('sex',array(0=>'Male',1=>'Female',0)) . '<br />';

echo '<p />';
echo form_label('Birthday','birthday',array('class'=>'text_float_medium'));
echo form_input('birthday','','class="dtpicker"') . '<br />';
echo form_label('Place of Birth','place_of_birth',array('class'=>'text_float_medium'));
echo form_input('place_of_birth') . '<br />';
echo '<p />';
echo form_label('Description','teacher_description',array('class'=>'text_float_medium'));
echo form_input('teacher_description') . '<br />';
echo '<p />';
echo form_label('Address 1','address',array('class'=>'text_float_medium'));
echo form_input('address') . '<br />';
echo form_label('Address 2','address2',array('class'=>'text_float_medium'));
echo form_input('address2') . '<br />';
echo form_label('City','city',array('class'=>'text_float_medium'));
echo form_input('city') . '<br />';
echo form_label('Phone Area','phone_area',array('class'=>'text_float_medium'));
echo form_input('phone_area') . '<br />';
echo form_label('Phone','phone',array('class'=>'text_float_medium'));
echo form_input('phone') . '<br />';
echo form_label('Mobile Phone','handphone',array('class'=>'text_float_medium'));
echo form_input('handphone') . '<br />';
echo form_label('Email','email',array('class'=>'text_float_medium'));
echo form_input('email') . '<br />';
echo '<p />';

echo form_submit('save','Save');
echo form_close();