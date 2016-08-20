<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('employees_model');
	}

	public function index()
	{
		
		$params['first_name'] = $this->input->post('first_name');
		$params['last_name']  = $this->input->post('last_name');
		$params['birthdate']  = $this->input->post('birthdate');
		$params['address'] 	  = $this->input->post('address');
		$params['age'] 		  = $this->calculateAge($this->input->post('birthdate'));
		$params['salary'] 	  = $this->input->post('salary');

		if ($this->input->post('submit')) {
			$this->employees_model->add($params);
		}
		$data['employees'] = $this->employees_model->get_all();	
		$this->load->view('home/main', $data);
	}

	public function edit(){

		$employee = $this->employees_model->get_one($this->input->get('id'));

		$data['user_info'] = $employee;
		$this->load->view('home/edit_employee', $data);
	}

	public function delete()
	{	
		$id = $this->input->get('id');
		$this->employees_model->delete($id);


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

		redirect(base_url() . 'home', 'refresh');
	}


	public function calculateAge($date)
	{
		$birthdate = new DateTime($date);
		$today = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}
	// public function index()
	// {
	//    	if($this->session->userdata('logged_in'))
	//    	{
	//     $session_data = $this->session->userdata('logged_in');
	//      $data['username'] = $session_data['username'];
	//     $this->load->view('', $data);
	//    	}
	//    	else
	//    	{
	//      //If no session, redirect to login page
	//      redirect('login', 'refresh');
	//    	}
	// }
 
 	function logout()
 	{

   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('home', 'refresh');
 	}
 
}
