<?php
class Visitor_counters extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('module');
		$this->load->model('visitor_counter_install');
	}
	function index(){
		$this->load->model('visitor_counter');
		$visitor_counter = new Visitor_counter();
		$visitor_counter->get();
		$vc = new Visitor_counter();
		if($visitor_counter->count()==0){
			$vc->val = 0;
			$vc->save();
		}
		else {
			$vc->val = $vc->val+1;
			$vc->save();
		}
		$header_data = array('param_title'=>'Demo Module','param_header'=>'Demo Module');
		$data = array('last_visitor'=>$visitor_counter->count());
		$this->load->view('common/header',$header_data);
		$this->load->view('visitor_counters/index',$data);
		$this->load->view('common/footer');
	}
	function install(){
		$modules = new Module();
		$modules->name = 'visitor_counter';
		$modules->state = 1;
		$modules->save();
		$install = new Visitor_counter_install();
		$install->create_table();
		redirect('visitor_counters/edit');
	}
	function uninstall(){
		$modules = new Module();
		$modules->where('name','visitor_counter')->get();
		$modules->delete();
		$install = new Visitor_counter_install();
		$install->drop_table();
		redirect('moduls');
	}
	function is_installed(){
		$modules = new Module();
		$modules->where('name','visitor_counter')->get();
		if($modules->count()>0){
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}function edit(){
		$header_data = array('param_title'=>'Edit Visitor Counter','param_header'=>'Edit Visitor Counter');
		$data = array(
			'active_option'=>array(0=>'Enable',1=>'Disable'),
			'position_option'=>array(0=>'Left',1=>'Top',2=>'Right',3=>'Bottom'),
		);
		$this->load->view('common/header',$header_data);
		$this->load->view('visitor_counters/edit',$data);
		$this->load->view('common/footer');
	}
	function edit_handler(){
		redirect('moduls');
	}
}