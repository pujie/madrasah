<link rel='stylesheet' href='<?php echo base_url();?>css/smoothness/jquery-ui-1.8.14.custom.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/custom.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('.dtpicker').datepicker(
			{
				dateFormat:'d/mm/yy',
				changeYear:true,
				changeMonth:true,
				minDate:'-20Y',
				maxDate:'+10Y'
			}
	);
	$('.button').button();
}
);
</script>
<head>
<?php 
	$title=(isset($param_title))?$param_title:'';
	echo '<title>' . $title . '</title>';
	echo '<div class="header">';
	$header=(isset($param_header))?$param_header:'';
	echo '<h1>' . $header . '</h1>';
	$sub_header = (isset($param_sub_header))?$param_sub_header:'';
	echo '<h4>' . $sub_header . '</h4>';
	echo '<div class="header_info">';
	$info = (isset($param_info))?$param_info:'';
	echo '<div>' . $info . '</div>';
	$properties = (isset($param_properties))?$param_properties:'';
	echo '<div>' . $properties . '</div>';
	echo '</div>';
	echo '</div>';
?>
</head>