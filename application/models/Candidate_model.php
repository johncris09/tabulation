<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_model extends CI_Model
{


	public $table = 'candidate';
	
    public function __construct()
    {
        parent::__construct();
    }
 
	
    public function get_all_candidate()
    { 
        return $this->db 
			->get($this->table);
    }

     

    public function get_candidate($data)
    {  
        $this->db->where($data);
        return $this->db->get($this->table)->result_array()[0];
    }  

     


 
}