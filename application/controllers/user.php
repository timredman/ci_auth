<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
		$this->load->library('form_validation');
			
	}	
	
	public function index()
	{
		//View title
		$h_data['page_title'] = $this->lang->line('user_manage');
		
		$data['users'] = $this->User_model->get_all_users();

		$this->load->view('header', $h_data);
		$this->load->view('user/list', $data);
		$this->load->view('footer');
	}
	
	public function add()
	{	
		//View title
		$h_data['page_title'] = $this->lang->line('user_add');
		
		//Validate our entries
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_confirm]|md5');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required');
						
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('header', $h_data);		
			$this->load->view('user/add');
			$this->load->view('footer');
		
		} else {
			
			//All good! Lets add the user
			$user['firstname'] = $this->input->post('firstname');
            $user['lastname'] = $this->input->post('lastname');
            $user['username'] = $this->input->post('username');
            $user['password'] = $this->input->post('password');
            $user['email'] = $this->input->post('email');

			if ($this->User_model->add_user($user)) {
				$this->session->set_flashdata('status', 'added');
            
				redirect('/user/', 'refresh');
			}
		}
	}
	
	public function edit()
	{
		//User ID, need to ensure user is ok to edit this and the segment is an integer!
		$id = $this->uri->segment(3);
		
		//Grab user id object
        $user_details = $this->User_model->get_user($id);
        
        if($row = $user_details->row()) {
        
        	$data['id'] = $row->id;
        	$data['firstname'] = $row->firstname;
        	$data['lastname'] = $row->lastname;
        	$data['username'] = $row->username;
        	$data['email'] = $row->email;
				
			//View title
			$h_data['page_title'] = $this->lang->line('user_edit');

			//Validate our entries
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[2]|max_length[50]');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'trim|matches[password_confirm]|md5');
			$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim');
		
			if ($this->form_validation->run() == FALSE) {
		
				$this->load->view('header', $h_data);
				$this->load->view('user/edit', $data);
				$this->load->view('footer');
		
			} else {
			
				//All good! Lets edit the user
				$user['firstname'] = $this->input->post('firstname');
            	$user['lastname'] = $this->input->post('lastname');
            	$user['username'] = $this->input->post('username');
            	$user['password'] = $this->input->post('password');
            	$user['email'] = $this->input->post('email');

				if ($this->User_model->edit_user($user)) {
					$this->session->set_flashdata('status', 'edited');
            
					redirect('/user/', 'refresh');
				}
			}
		} else {
		
			//Eeek no user found! Tidy this up!
			$this->load->view('header', $h_data);
			$this->load->view('user/edit', $data);
			$this->load->view('footer');		

		}
	}
	
	public function delete()
	{
		//User ID, need to ensure user is ok to edit this and the segment is an integer!
		$id = $this->uri->segment(3);
		
		//View title
		$h_data['page_title'] = $this->lang->line('user_delete');
		
		//Grab user id object
        $fullname = $this->User_model->get_user_fullname($id);
		
		if($row = $fullname->row()) {
			$data['id'] = $row->id;
			$data['firstname'] = $row->firstname;
			$data['lastname'] = $row->lastname;
		}
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('header', $h_data);
			$this->load->view('user/delete', $data);
			$this->load->view('footer');
		
		} else {
			
			$user['id'] = $id;
			$user['deleted'] = 1;
			
			if ($this->User_model->delete_user($user)) {
				$this->session->set_flashdata('status', 'deleted');
				
				redirect('/user/', 'refresh');
			}
			
		}
		
	}
	
}
?>