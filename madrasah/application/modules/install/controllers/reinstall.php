<?php
class Reinstall extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$header_data = array('param_title'=>'Reinstall','param_header'=>'Reinstall');
		$this->load->view('common/header',$header_data);
		$this->load->view('install/reinstall');
		$this->load->view('common/footer');
	}
	function do_reset_installation(){
		if(!$this->write_config()){
			echo 'Cannot write to Config file';
			return false;
		}
		if(!$this->write_autoload()){
			echo 'Cannot write to Autoload file';
			return false;
		}
		if(!$this->write_database()){
			echo 'Cannot write to database file ';
			return false;
		}
		redirect('main');
	}
	function write_database(){
		$data='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$active_group = \'default\';
		$active_record = TRUE;
		$db[\'default\'][\'hostname\'] = \'localhost\';
		$db[\'default\'][\'username\'] = \'\';
		$db[\'default\'][\'password\'] = \'\';
		$db[\'default\'][\'database\'] = \'\';
		$db[\'default\'][\'dbdriver\'] = \'mysql\';
		$db[\'default\'][\'dbprefix\'] = \'\';
		$db[\'default\'][\'pconnect\'] = TRUE;
		$db[\'default\'][\'db_debug\'] = TRUE;
		$db[\'default\'][\'cache_on\'] = FALSE;
		$db[\'default\'][\'cachedir\'] = \'\';
		$db[\'default\'][\'char_set\'] = \'utf8\';
		$db[\'default\'][\'dbcollat\'] = \'utf8_general_ci\';
		$db[\'default\'][\'swap_pre\'] = \'\';
		$db[\'default\'][\'autoinit\'] = TRUE;
		$db[\'default\'][\'stricton\'] = FALSE;';
		if(write_file('./application/config/database.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function write_config(){
		$data='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$config[\'base_url\']	= \'\';
		$config[\'index_page\'] = \'index.php\';
		$config[\'uri_protocol\']	= \'AUTO\';
		$config[\'url_suffix\'] = \'\';
		$config[\'language\']	= \'english\';
		$config[\'charset\'] = \'UTF-8\';
		$config[\'enable_hooks\'] = FALSE;
		$config[\'subclass_prefix\'] = \'MY_\';
		$config[\'permitted_uri_chars\'] = \'a-z 0-9~%.:_\-\';
		$config[\'allow_get_array\']		= TRUE;
		$config[\'enable_query_strings\'] = FALSE;
		$config[\'controller_trigger\']	= \'c\';
		$config[\'function_trigger\']		= \'m\';
		$config[\'directory_trigger\']	= \'d\'; // experimental not currently in use
		$config[\'log_threshold\'] = 0;
		$config[\'log_path\'] = \'\';
		$config[\'log_date_format\'] = \'Y-m-d H:i:s\';
		$config[\'cache_path\'] = \'\';
		$config[\'encryption_key\'] = \'padi internet\';
		$config[\'sess_cookie_name\']		= \'ci_session\';
		$config[\'sess_expiration\']		= 7200;
		$config[\'sess_expire_on_close\']	= FALSE;
		$config[\'sess_encrypt_cookie\']	= FALSE;
		$config[\'sess_use_database\']	= FALSE;
		$config[\'sess_table_name\']		= \'ci_sessions\';
		$config[\'sess_match_ip\']		= FALSE;
		$config[\'sess_match_useragent\']	= TRUE;
		$config[\'sess_time_to_update\']	= 300;
		$config[\'cookie_prefix\']	= "";
		$config[\'cookie_domain\']	= "";
		$config[\'cookie_path\']		= "/";
		$config[\'cookie_secure\']	= FALSE;
		$config[\'global_xss_filtering\'] = FALSE;
		$config[\'csrf_protection\'] = FALSE;
		$config[\'csrf_token_name\'] = \'csrf_test_name\';
		$config[\'csrf_cookie_name\'] = \'csrf_cookie_name\';
		$config[\'csrf_expire\'] = 7200;
		$config[\'compress_output\'] = FALSE;
		$config[\'time_reference\'] = \'local\';
		$config[\'rewrite_short_tags\'] = FALSE;
		$config[\'proxy_ips\'] = \'\';';
		if(write_file('./application/config/config.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function write_autoload(){
		$data ='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$autoload[\'packages\'] = array(APPPATH.\'third_party\');
		$autoload[\'libraries\'] = array(\'pagination\',\'session\',\'common\',\'auth\');
		$autoload[\'helper\'] = array(\'url\',\'form\',\'date\',\'file\',\'directory\');
		$autoload[\'config\'] = array();
		$autoload[\'language\'] = array();
		$autoload[\'model\'] = array();';
		if(write_file('./application/config/autoload.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}