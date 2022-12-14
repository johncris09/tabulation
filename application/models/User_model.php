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
			->get('user');
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

    
    public function get_judge($data)
    { 
        return $this->db 
            ->where('role_type', 'judge')
            ->where($data)
			->get($this->table)
            ->result_array();
    } 


    public function get_chairman()
    { 
        return $this->db 
            ->where('judge_no', 'judge1')
			->get($this->table)
            ->result_array()[0];
    }
 
    public function get_user($data)
    {  
        $this->db->where($data);
        return $this->db->get($this->table)->result_array()[0];
    } 
 

	
    public function get_per_judge_role($judge_role)
    { 
        return $this->db 
            ->where('judge_no', $judge_role)
			->get($this->table)
            ->result_array()[0];
    }
    
    
    public function update($data)
    { 
        return $this->db
            ->where("id", $data['id'])
            ->update($this->table, $data);
    } 
 
}
