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
			$data = array();
			$user = $this->accounts_model->get_one($this->input->post('username'));
			$hash = 'l>4\/Lm4c\/s1c()d31gn1t3r1s4w3s()m3';
			$password = password_hash(
           			$this->input->post('password'),
           			PASSWORD_DEFAULT);

			//password
			if ($this->input->post('username') === $user['username']) {
				
				$user_data = array();

				$user_data['id'] = $user['id'];
				$user_data['username'] = $user['username'];
				$user_data['password'] = $user['password'];
				$user_data['logged_in'] = true;

				$this->session->set_userdata($user_data);

                redirect(base_url() . 'home');

			} else {
				$data['class'] = 'alert-danger';
				$data['status'] = true;
 				$data['message'] = 'Invalid Account / Password.';
				$this->load->view('auth/login', $data);
			}
	}

	public function register()
	{	
		
		$this->load->view('auth/register');
	}

	public function process_register()
	{	
		$data = array();
		$data['status'] = true;
		$hash = 'l>4\/Lm4c\/s1c()d31gn1t3r1s4w3s()m3';
		$user = $this->accounts_model->get_one($this->input->post('username'));
		if (!$user) {
			if ($this->input->post('password') === $this->input->post('passwordAgain')) {
				$params['username'] = $this->input->post('username');
				$params['password'] = password_hash(
            						$this->input->post('password'),
            						PASSWORD_BCRYPT,
            						array('salt' => $hash ));

				$this->accounts_model->register($params);
				
				$data['message'] = 'Successfully Registered';
				$data['class'] = 'alert-info';
				$this->load->view('auth/login', $data);
			} else {
				$data['class'] = 'alert-danger';
				$data['message'] = "Password Doesn't Match";
				$this->load->view('auth/register', $data);
			}
		} else {
			$data['class'] = 'alert-danger';
			$data['message'] = 'Username is already taken';
			$this->load->view('auth/register', $data);
		}
	}
}
