<?php 

class Blog extends CI_Controller{

	private $data = [];
	private $list_per_page = 2;
	
	public function __construct()
	{
		//call CodeIgniter's default Constructor
		 parent::__construct();
		 
		 //load database libray manually
		 // $this->load->database();
		 
		 //load Model
 		$this->load->model('blog_m');
 		$this->load->library(array('form_validation','session'));
 		// database library autoloaded

	}

	public function index()
	{
			$this->load->view('blogview.php');
	}
	public function register()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('first_name','first_name','required|alpha');
			$this->form_validation->set_rules('last_name','last_name','required|alpha');
			$this->form_validation->set_rules('email','email','trim|required|valid_email');
			$this->form_validation->set_rules('password','password','required');

			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$register_arr = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'password' => $password);

			// echo '<pre>';
			// print_r($register_arr);exit;
			if($this->form_validation->run() == TRUE)
			{
				$exist_user = $this->blog_m->check_user($email);
				if(!$exist_user)
				{
					if($this->blog_m->insert_data('user_details',$register_arr))
					{
						$this->session->set_flashdata('register','<div>Registered Successfully</div>');
						// $this->load->view('login.php');
						header('Location:'.base_url().'index.php/blog/login');
					}
			   }
			   else
			   {
			   		$this->session->set_flashdata('email_duplicate','<div>User is already Registered with Email</div');
			   		$this->load->view('register.php');
			   }
		   }
			// $this->
			
		}
		else
		$this->load->view('register.php');
	}
	public function login()
	{
		if($this->input->post())
		{
			
			$this->form_validation->set_rules('email','email','trim|required|valid_email');
			$this->form_validation->set_rules('password','password','required');

				
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$login_arr = array(
				'email' => $email,
				'password' => $password);

			// echo '<pre>';
			// print_r($register_arr);exit;
			if($this->form_validation->run() == TRUE)
			{
				if($user_detail = $this->blog_m->user_info($login_arr))
				{
					$this->session->set_flashdata('login','<div>Hi '.$user_detail['first_name'].'</div>');
					
					// $this->data['post_details'] = $this->blog_m->get_user_post();
					// $this->load->view('post_view.php',$this->data);
					header('Location:'.base_url().'index.php/blog/view_post');
				}
				else
				{
					// echo 'siodji';exit;
					$this->session->set_flashdata('login_error','<div>Email or Password Invalid</div');
					$this->load->view('login.php');

				}
		   }
			// $this->
			
		}
		else
		$this->load->view('login.php');
	}
	public function view_post()
	{
		$list_per_page = 2;
			
		$count =count($this->blog_m->get_user_post());
		// echo '<pre>';
		// print_r($_SERVER);exit;
		// parse_str($_SERVER['QUERY_STRING'],$params);
			// $this->data['user_id'] = $params['user_id'];
		// echo '<pre>';
		// print_r($params);exit;
        $this->data['page'] = $page = $this->input->get('page');  
        // $this->data->pager = $this->_paginator(NULL,$count);
        
        if(!$page)
            $this->data['page'] = $page = 1; 

        $this->data['total_pages'] = $total_pages = ceil($count/$list_per_page);
        // echo '<pre>';
        // print_r($total_pages);exit;
        // echo '<pre>';
        // print_r(($page-1)*$list_per_page);exit;
        
         $this->data['post_details'] = $this->blog_m->get_user_post($list_per_page,($page-1)*$list_per_page);
         $this->data['search'] = $search = '';
        //  echo "last_query - ".$this->db->last_query();exit; 
        // echo '<pre>';
        // print_r($this->data['post_details']);exit;
		$this->load->view('post_view.php',$this->data);
	}
	public function guest_postview()
	{
		$list_per_page = 1;
			
		$count =count($this->blog_m->get_user_post());
		// echo '<pre>';
		// print_r($_SERVER);exit;
		// parse_str($_SERVER['QUERY_STRING'],$params);
			// $this->data['user_id'] = $params['user_id'];
		// echo '<pre>';
		// print_r($params);exit;
        $this->data['page'] = $page = $this->input->get('page');  
        // $this->data->pager = $this->_paginator(NULL,$count);
        
        if(!$page)
            $this->data['page'] = $page = 1; 

        $this->data['total_pages'] = $total_pages = ceil($count/$list_per_page);
        // echo '<pre>';
        // print_r($total_pages);exit;
        // echo '<pre>';
        // print_r(($page-1)*$list_per_page);exit;
        
         $this->data['post_details'] = $this->blog_m->get_user_post($list_per_page,($page-1)*$list_per_page);
         $this->data['search'] = $search = '';
        //  echo "last_query - ".$this->db->last_query();exit; 
        // echo '<pre>';
        // print_r($this->data['post_details']);exit;
		$this->load->view('guest_postview.php',$this->data);
	}
	public function search_post()
	{
		// $list_per_page = 1;

		
		parse_str($_SERVER['QUERY_STRING'],$params);
		
			
		$this->data['search'] = $search = $params['search'];

		$this->data['post_details'] = false;
		// echo '<pre>';
		// print_r($search);
        $this->data['post_details'] = $this->blog_m->get_search_post($search);
         // echo "last_query - ".$this->db->last_query();exit; 
        // echo '<pre>';

        if($this->data['post_details'])
        {

				$this->load->view('search_view.php',$this->data);
		}
		else
		{

			$this->session->set_flashdata('search_error','<div>No result Found</div>');
			header('Location:'.base_url().'index.php/blog/view_post');
		}
	}
	public function  add_post()
	{	
		// echo 'sdjos';
		if($this->input->post())
		{
			// echo 'skdjk';
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('description','description','required');
			$this->form_validation->set_rules('category','category','trim|required');
			// $this->form_validation->set_rules('password','password','required');

			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$category = $this->input->post('category');
			// $user = $this->input->post('user');
			// $password = $this->input->post('password');

			$post_arr = array(
				'name' => $name,
				'description' => $description,
				'category' => $category,
			);

			// echo '<pre>';
			// print_r($this->input->post());exit;
			if($this->form_validation->run() == TRUE)
			{
				if($this->blog_m->insert_data('post_details',$post_arr))
				{
					$this->session->set_flashdata('post','<div>Post Added Successfully</div>');
					// $this->data['post_details'] = $this->blog_m->get_user_post();
					header('Location:'.base_url().'index.php/blog/view_post');
				}
				else
				{
					$this->session->set_flashdata('not_register','<div>User not Registered</div');
				}
		   }
  
		}  
		else
		{
			$this->data['post_edit'] = 0;
			$this->data['is_edit'] = 1;
			$this->load->view('post_details.php',$this->data);
		}
	}
	public function  edit_post()
	{	
		// echo 'sdjos';
		if($this->input->post())
		{
			// echo 'skdjk';
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('description','description','required');
			$this->form_validation->set_rules('category','category','trim|required');
			// $this->form_validation->set_rules('password','password','required');

			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$category = $this->input->post('category');
			$id = $this->input->post('post_id');
			
			$post_arr = array(
				'name' => $name,
				'description' => $description,
				'category' => $category
			);

			// echo '<pre>';
			// print_r($this->input->post());exit;
			if($this->form_validation->run() == TRUE)
			{
				if($this->blog_m->update_data('post_details',$post_arr,$id))
				{
					$this->session->set_flashdata('post','<div>Post Added Successfully</div>');
					$this->data['post_details'] = $this->blog_m->get_user_post();
					header('Location:'.base_url().'index.php/blog/view_post');
				}
				else
				{
					$this->session->set_flashdata('not_register','<div>Unable to Update</div');
				}
		   }
  
		}  
		else
		{

			$post_id = $this->input->get('id');
			$this->data['post_edit'] = $post_edit = $this->blog_m->get_post_edit($post_id);
			// $this->data['is_edit'] = 1;
			$this->load->view('edit_post_details.php',$this->data);
		}
	}
	public function  delete_post()
	{	
		// echo 'sdjos';
		if($this->input->post())
		{
			// echo 'skdjk';
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('description','description','required');
			$this->form_validation->set_rules('category','category','trim|required');
			// $this->form_validation->set_rules('password','password','required');

			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$category = $this->input->post('category');
			$id = $this->input->post('post_id');
			
			$post_arr = array(
				'name' => $name,
				'description' => $description,
				'category' => $category
			);

			// echo '<pre>';
			// print_r($this->input->post());exit;
			if($this->form_validation->run() == TRUE)
			{
				if($this->blog_m->update_data('post_details',$post_arr,$id))
				{
					$this->session->set_flashdata('post','<div>Post Added Successfully</div>');
					$this->data['post_details'] = $this->blog_m->get_user_post();
					header('Location:'.base_url().'index.php/blog/view_post');
				}
				else
				{
					$this->session->set_flashdata('not_register','<div>Unable to Update</div');
				}
		   }
  
		}  
		else
		{

			$post_id = $this->input->get('id');
			$delete_post = $this->blog_m->delete_post('post_details',$post_id);
			if($delete)
			{
				$this->session->set_flashdata('delete','<div>Post Deleted Successfully</div>');
			}
			// $this->data['is_edit'] = 1;
			header('Location:'.base_url().'index.php/blog/view_post');
		}
	}
	public function login_select()
	{
		$this->load->view('loginselect_view.php');
	}


	
}
?>
