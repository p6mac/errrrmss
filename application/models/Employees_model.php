<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Employees_model extends CI_Model
	{
		protected $table_name = 'employees';
		
		public function __construct()
		{
			parent::__construct();
		}

		public function get_all()
		{
			$query = $this->db->get($this->table_name);
			return $query->result();
		}

		public function get_one($id)
		{	
			$condition = array('id' => $id);
			$query = $this->db->get_where($this->table_name, $condition);

			return $query->row_array();
		}

		public function add($params)
		{
			$fields = array(
				'first_name'=> $params['first_name'],
				'last_name'	=> $params['last_name'],
				'birthdate' => $params['birthdate'],
				'address' 	=> $params['address'],
				'age' 		=> $params['age'],
				'salary' 	=> $params['salary']);

			$this->db->insert($this->table_name, $fields);

		}

		public function update($params)
		{
				$fields = array(
				'first_name'=> $params['first_name'],
				'last_name'	=> $params['last_name'],
				'birthdate' => $params['birthdate'],
				'address' 	=> $params['address'],
				'age' 		=> $params['age'],
				'salary' 	=> $params['salary']);

				$this->db->where('id', $params['id']);
				$this->db->update($this->table_name, $fields);

		}

		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete($this->table_name);
		}
	}
?>