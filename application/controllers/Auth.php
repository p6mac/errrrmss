<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('accounts_model');
		$this->load->library('session');
	}

	public function index()
	{	

		$this->load->view('auth/login');
		
	}

	public function login()
	{
		$response = array();
			$response['status'] = true;
			$user = $this->accounts_model->get_one($this->input->post('username'));
			$password = password_hash(
           			$this->input->post('password'),
           			PASSWORD_BCRYPT,
           			array('salt' => 'UycSAbzwYLMsah7Rj2yvzH2TcRRaYZnyCysT7AdD'));

			if ($this->input->post('username') === $user['username'] && $password === $user['password']) {
				
				$user_data = array();

				$user_data['id'] = $user['id'];
				$user_data['username'] = $user['username'];
				$user_data['password'] = $user['password'];

				$this->session->set_userdata($user_data);

                redirect(base_url() . 'home');
			} 
	}

	public function register()
	{	
		$response = array();
		$params['username'] = $this->input->post('username');
		if ($this->input->post('register')) {
			if ($this->input->post('password') === $this->input->post('passwordAgain')) {
				$response['status'] = 'true';
				$response['message'] = 'Successfully Registered';
				$params['password'] = password_hash(
            						$this->input->post('password'),
            						PASSWORD_BCRYPT,
            						array('salt' => 'UycSAbzwYLMsah7Rj2yvzH2TcRRaYZnyCysT7AdD'));
				$this->accounts_model->register($params);
			} else
			 $response['message'] = 'Username is already taken';
		}
		$this->load->view('auth/register');
	}
}
