<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('employees_model');
		$this->load->library('session');
	}

	public function index()
	{
		$data = array();
		if (isset($this->session->userdata['logged_in'])) {

			$data['username'] = $this->session->userdata['username'];
			$data['employees'] = $this->employees_model->get_all();
			$data['notif'] = $this->session->tempdata();
			$this->load->view('home/main', $data);
		} else {
			$data['status'] = true;
			$data['class'] = 'alert-danger';
			$data['message'] = "Access Forbidden! Please Login in";
			$this->load->view('auth/login', $data);	
		}
		
	}

	public function add()
	{
		$params['first_name'] = $this->input->post('first_name');
		$params['last_name']  = $this->input->post('last_name');
		$params['birthdate']  = $this->input->post('birthdate');
		$params['address'] 	  = $this->input->post('address');
		$params['age'] 		  = $this->calculateAge($this->input->post('birthdate'));
		$params['salary'] 	  = $this->input->post('salary');

		$this->employees_model->add($params);

		$data['status'] = true;
		$data['message'] = 'Successfully Added Employee';
		$this->session->set_tempdata($data, NULL, 3);
		redirect(base_url(). 'home', 'refresh');
	}

	public function edit(){

		$employee = $this->employees_model->get_one($this->input->get('id'));
		$data['username'] = $this->session->userdata['username'];
		$data['user_info'] = $employee;
		$this->load->view('home/edit_employee', $data);
	}

	public function delete()
	{	
		$id = $this->input->get('id');
		$this->employees_model->delete($id);

		$data['status'] = true;
		$data['message'] = 'Successfully Deleted Employee';
		$this->session->set_tempdata($data, NULL, 3);
		redirect(base_url() . 'home', 'refresh');
	}

	public function update()
	{
		$params['id'] = $this->input->post('id');
		$params['first_name'] = $this->input->post('first_name');
		$params['last_name']  = $this->input->post('last_name');
		$params['birthdate']  = $this->input->post('birthdate');
		$params['address'] 	  = $this->input->post('address');
		$params['age'] 		  = $this->calculateAge($this->input->post('birthdate'));
		$params['salary'] 	  = $this->input->post('salary');

		$this->employees_model->update($params);

		$data['status'] = true;
		$data['message'] = 'Successfully Updated Employee';
		$this->session->set_tempdata($data, NULL, 3);
		redirect(base_url() . 'home', 'refresh');
	}


	public function calculateAge($date)
	{
		$birthdate = new DateTime($date);
		$today = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}
 
 	function logout()
 	{

   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		$data['status'] = true;
   		$data['class'] = 'alert-info';
   		$data['message'] = "You have successfully logged out!";
   		$this->load->view('auth/login', $data);
 	}
 
}
