<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{


	public $table = 'user';
	
    public function __construct()
    {
        parent::__construct();
    }

    public function login($data)
    { 
        return $this->db->where($data)
			->get('user')
			->num_rows();
    }

	
    public function get_all_user()
    { 
        return $this->db 
			->get($this->table);
    }
    public function get_all_judge()
    { 
        return $this->db 
            ->where('role_type', 'judge')
			->get($this->table)
            ->result_array();
    }
 

 
}