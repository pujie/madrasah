<?php 
class Install extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		switch ($this->uri->segment(3)){
			case 'database_setting':
				$header_data = array('param_title'=>'Database Setting','param_header'=>'Database Setting');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/database_setting');
				$this->load->view('common/footer');
				break;
			case 'write_configuration':
				$header_data = array('param_title'=>'Write Configuration','param_header'=>'Write Configuration');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/write_configuration');
				$this->load->view('common/footer');
				break;
			case 'create_tables':
				$header_data = array('param_title'=>'Create Tables','param_header'=>'Create Tables');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/create_tables');
				$this->load->view('common/footer');
				break;
			case 'create_admin':
				$header_data = array('param_title'=>'Create Admin','param_header'=>'Create Admin');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/create_admin');
				$this->load->view('common/footer');
				break;
		}
	}
	function handler(){
		$params = $this->input->post();
		switch ($params['step']){
			case 'database_setting':
				if($this->database_setting()){
					if($this->write_database()){
						redirect('install/index/write_configuration');
					}
					else{
						echo 'database file should be writable ...';
					}
				}
				break;
			case 'write_configuration':
				if($this->write_library_autoload()){
					redirect('install/index/create_tables');
				}
				break;
			case 'create_tables':
				if($this->write_library_autoload()){
					if($this->create_tables()){
						redirect('install/index/create_admin');
					}
				}
				break;
			case 'create_admin':
				$this->create_admin();
				if(!$this->write_model_autoload()){
					echo 'autoload file should be writable ...';
					break;
				}
				if(!$this->write_config()){
					echo 'config file should be writable ...';
					break;
				}
				$header_data = array('param_title'=>'Installation Success','param_header'=>'Installation Success');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/installation_success');
				break;
		}
	}
	function write_database(){
		$params = $this->input->post();
		$data='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$active_group = \'default\';
		$active_record = TRUE;
		$db[\'default\'][\'hostname\'] = \'' . $params['server']. '\';
		$db[\'default\'][\'username\'] = \'' . $params['username'] . '\';
		$db[\'default\'][\'password\'] = \'' . $params['password'] . '\';
		$db[\'default\'][\'database\'] = \'' . $params['database'] . '\';
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
		$config[\'sess_use_database\']	= TRUE;
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
	function write_library_autoload(){
		$data ='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$autoload[\'packages\'] = array(APPPATH.\'third_party\');
		$autoload[\'libraries\'] = array(\'database\',\'datamapper\',\'pagination\',\'session\',\'common\',\'auth\');
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
	function write_model_autoload(){
		$data ='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$autoload[\'packages\'] = array(APPPATH.\'third_party\');
		$autoload[\'libraries\'] = array(\'database\',\'datamapper\',\'pagination\',\'session\',\'common\',\'auth\');
		$autoload[\'helper\'] = array(\'url\',\'form\',\'date\',\'file\',\'directory\');
		$autoload[\'config\'] = array();
		$autoload[\'language\'] = array();
		$autoload[\'model\'] = array(\'user\');';
		if(write_file('./application/config/autoload.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function database_setting(){
		$params = $this->input->post();
		if(mysql_connect($params['server'],$params['username'],$params['password'])){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
	}
	function create_tables(){
		$db_prefix='';
		
		$query = 'drop table if exists ' . $db_prefix . 'ci_sessions; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop ci_sessions error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'ci_sessions ';
		$query.= '(session_id varchar(40) primary key default 0,ip_address varchar(16) default 0,user_agent varchar(100), last_activity int(10) unsigned default 0, user_data text)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table ci_sessions error ...<br />';
			return false;
		}
		
		$query = 'drop table if exists ' . $db_prefix . 'users; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop table users error <br />';
			return false;
		}
		$query = 'create table ' . $db_prefix . 'users ';
		$query.= '(id int primary key auto_increment, 
		username varchar(40),
		email varchar(50),
		password varchar(40),
		salt varchar(40), 
		status varchar(1))';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table users error <br />';
			return false;
		}

		$query = 'drop table if exists ' . $db_prefix . 'modules; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop modules error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'modules ';
		$query.= '(id int primary key auto_increment,name varchar(50),state varchar(1) default 0 comment "status of this modul",chapter_description  text)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table modules error ...<br />';
			return false;
		}
		
		
		
		$query = 'drop table if exists ' . $db_prefix . 'students; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop students error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'students ';
		$query.= '(id int primary key auto_increment,
			nrp varchar(20),
			first_name varchar(20),
			middle_name varchar(20),
			last_name varchar(20),
			nick_name varchar(20),
			sex varchar(1) default "0",
			birthday date,
			place_of_birth varchar(20),
			student_description  text,
			address varchar(60),
			address2 varchar(60),
			city varchar(20),
			phone_area varchar(5),
			phone varchar(15),
			handphone varchar(15),
			email varchar(30),
			father_name varchar(20),
			father_occupation varchar(20),
			mother_name varchar(20),
			mother_occupation varchar(20))';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table students error ...<br />';
			return false;
		}

		$query = 'drop table if exists ' . $db_prefix . 'seasons; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop seasons error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'seasons ';
		$query.= '(
			id int primary key auto_increment,
			name varchar(50),
			date1 date comment "the date this season start",
			date2 date comment "the date this season end",
			syllabus_id int,
			class_id int,
			is_current varchar(1) default 1,
			season_description  text
		)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table seasons error ...<br />';
			return false;
		}
		
		
		$query = 'drop table if exists ' . $db_prefix . 'classes; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop classes error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'classes ';
		$query.= '(id int primary key auto_increment,
			name varchar(50),
			class_description  text)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table classes error ...<br />';
			return false;
		}


		$query = 'drop table if exists ' . $db_prefix . 'classes_students; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop classes_students error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'classes_students ';
		$query.= '(class_id int ,
			student_id int,dt_year varchar(4))';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table classes_students error ...<br />';
			return false;
		}
		
		
		$query = 'drop table if exists ' . $db_prefix . 'lessons; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop lessons error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'lessons ';
		$query.= '(id int primary key auto_increment,name varchar(50),lesson_description  text)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table lessons error ...<br />';
			return false;
		}
		
		
		$query = 'drop table if exists ' . $db_prefix . 'teachers; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop teachers error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'teachers ';
		$query.= '(id int primary key auto_increment,
			nrp varchar(20),
			first_name varchar(20),
			middle_name varchar(20),
			last_name varchar(20),
			nick_name varchar(20),
			sex varchar(1),
			birthday date,
			place_of_birth varchar(20),
			address varchar(60),
			address2 varchar(60),
			city varchar(20),
			phone_area varchar(5),
			phone varchar(15),
			handphone varchar(15),
			email varchar(30),
			teacher_description  text
			)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table teachers error ...<br />';
			return false;
		}
		

		
		
		
		$query = 'drop table if exists ' . $db_prefix . 'syllabuses; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop syllabuses error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'syllabuses ';
		$query.= '(id int primary key auto_increment,
			syllabus_description  text
			)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table syllabuses error ...<br />';
			return false;
		}

		
		
		
		$query = 'drop table if exists ' . $db_prefix . 'lesson_syllabus; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop lesson_syllabus error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'lesson_syllabus ';
		$query.= '(id int primary key auto_increment,
			lesson_id int,
			syllabus_id int,
			teacher_id int
			)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table syllabus error ...<br />';
			return false;
		}

		
		$query = 'drop table if exists ' . $db_prefix . 'examinations; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop examinations error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'examinations ';
		$query.= '(id int primary key auto_increment,
			season_id int,
			date1 date,
			date2 date,
			examination_description text
			)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table examinations error ...<br />';
			return false;
		}

		
		
		

		
		$query = 'drop table if exists ' . $db_prefix . 'examinations_lessons; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop examinations_lessons error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'examinations_lessons ';
		$query.= '(id int primary key auto_increment,
			examination_id int,
			lesson_id int,
			date datetime,
			result decimal,
			value varchar(3)
			)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table examinations_lessons error ...<br />';
			return false;
		}

		
		
		

		
		$query = 'drop table if exists ' . $db_prefix . 'academic_record; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop academic_record error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'academic_record ';
		$query.= '(id int primary key auto_increment,
			student_id int,
			season_id int
			)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table examinations error ...<br />';
			return false;
		}
		return true;
	}
	function create_admin(){
		$params = $this->input->post();
		$this->auth->create_user($params['admin'],$params['password'],$params['email']);
	}
	
}
