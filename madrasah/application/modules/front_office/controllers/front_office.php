<?php 
class Front_office extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('menus');
		$this->load->model(array(
			'classes/app_class',
			'students/student',
			'teachers/teacher',
			'lessons/lesson',
			'seasons/season'
		));
	}
	function index(){
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office');
		$data = array('drop_menus'=>$this->menus->get_drop_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/index',$data);
		$this->load->view('common/footer');
	}
	function show_classes(){
		$classes = new App_class();
		$classes->get();
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Classes');
		$data = array('drop_menus'=>$this->menus->get_drop_menus(),'classes'=>$classes);
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/classes',$data);
		$this->load->view('common/footer');
	}
	function show_students(){
		$this->load->model('front_office/bo_student');
		$uri=$this->uri->uri_to_assoc();
		$students = new Student();
		$students->get($uri['per_page'],$uri['page']);
		$count = $students->count();
		$pagination_config['base_url']=base_url() . 'index.php/front_office/show_students/per_page/' . $uri['per_page'] . '/page/';
		$pagination_config['total_rows']=$count;
		$pagination_config['per_page']=$uri['per_page'];
		$pagination_config['uri_segment'] = 6;
		$this->pagination->initialize($pagination_config);
		$header_data = array(
			'param_title'=>'Front Office',
			'param_header'=>'Front Office',
			'param_sub_header'=>'Students',
			'param_info'=>'row count:' . $count,
			'param_properties'=>$this->bo_student->get_properties($uri['per_page']),
		);
		$data = array('drop_menus'=>$this->menus->get_drop_menus(),'students'=>$students);
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/students',$data);
		$this->load->view('common/footer');
	}
	function student_handler(){
		$params = $this->input->post();
		if(isset($params['search'])){
			redirect('front_office/show_students/per_page/' . $params['row_per_page'] . '/page/0/search/' . $params['find']);
		}
		if(isset($params['row_per_page'])){
			redirect('front_office/show_students/per_page/' . $params['per_page'] . '/page/0');
		}
	}
	function show_lessons(){
		$lessons = new Lesson();
		$lessons->get();
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Lessons');
		$data = array('drop_menus'=>$this->menus->get_drop_menus(),'lessons'=>$lessons);
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/lessons',$data);
		$this->load->view('common/footer');
	}
	function show_teachers(){
		$teachers = new Teacher();
		$teachers->get();
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Teachers');
		$data = array('drop_menus'=>$this->menus->get_drop_menus(),'teachers'=>$teachers);
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/teachers',$data);
		$this->load->view('common/footer');
	}
	function show_seasons(){
		$seasons = new Season();
		$seasons->get();
		$header_data = array('param_title'=>'Front Office','param_header'=>'Front Office','param_sub_header'=>'Seasons');
		$data = array('drop_menus'=>$this->menus->get_drop_menus(),'seasons'=>$seasons);
		$this->load->view('common/header',$header_data);
		$this->load->view('front_office/seasons',$data);
		$this->load->view('common/footer');
	}
}