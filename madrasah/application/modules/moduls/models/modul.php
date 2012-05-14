<?php
class Modul extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_moduls(){
		$default_system = array('moduls','back_office','front_office','install','teachers','classes','lessons','students');
		$modules='<table class="common_table">';
		$items = directory_map('./application/modules',1,FALSE);
		$modules.='<thead>';
		$modules.='<tr><th>Modul Name</th><th>Action</th></tr>';
		$modules.='</thead>';
		$modules.='<body>';
		foreach ($items as $item){
			if (in_array($item, $default_system)){
				$install = 'System Default';
			}
			else{
				$list_modules = new Module();
				$list_modules->where('name',$item)->get();
				if ($list_modules->count()>0){
					$install = anchor($item . '/uninstall','Remove','class="link"') . anchor($item . '/edit','Edit','class="link"') . anchor($item . '/index','View','class="link"');
				}
				else {
					$install = anchor($item . '/install','Install');
				}
			}
			$modules.='<tr><td>' . $item . '</td><td>' . $install . '</td></tr>';
		}
		$modules.='</body>';
		$modules.='</table>';
		return $modules;
	}
}