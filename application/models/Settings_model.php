<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model
{


	public $table = 'settings';
	
    public function __construct()
    {
        parent::__construct();
    }
 
	
    public function get_all_settings()
    { 
        return $this->db 
			->get($this->table);
    } 

	
    public function get_settings($data)
    { 
        return $this->db 
			->where($data)
			->get($this->table)
			->result_array()[0]['status'];
    } 

	
    function update($data)
    {
        return $this->db
			->where('status', $data['status'] == 1 ? 0: 1) 
            ->where('settings', $data['settings'] ) 
            ->update($this->table, $data);
    }
 
  

 
}
