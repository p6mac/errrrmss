<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model {

	protected $table_name = 'accounts';

	public function __construct()
	{
		parent::__construct();	
	}

	public function get_one($username){

		$condition = array('username' => $username);
		$query = $this->db->get_where($this->table_name, $condition);

		return $query->row_array();


	}

	public function register($account)
	{	
		$condition = array('username' => $account['username']);
		$query = $this->db->get_where($this->table_name, $condition);

		if ( empty($query))
		{
			$fields = array(
				'username' => $account['username'],
				'password' => $account['password']);

			$this->db->insert($this->table_name, $fields);
			return TRUE;
		}

		return FALSE;	
	}
}

