<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Talent_presentation_model extends CI_Model
{


	public $table = 'talent_presentation';
	
    public function __construct()
    {
        parent::__construct();
    } 

    public function insert($data)
    {
        
        $insert = $this->db->insert($this->table, $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }

	public function is_all_done_scoring()
	{ 
		$query = $this->db  
			->select('judge')
			->distinct()
            ->where('judge != 0') 
			->get('talent_presentation');
			
		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		return 0;
		
	}

    
    public function update($data)
    { 
        return $this->db
            ->where('id', $data['id'])
            ->update($this->table, $data);
    }




    public function if_exist($data)
    {   
        $this->db->where('candidate', $data['candidate']);
        $this->db->where('judge', $data['judge']);
        return $this->db->get($this->table); 
    } 

    function get_candidate_score($data)
    { 
        $this->db->where($data);
        return $this->db->get($this->table)->result_array()[0]['score']; 

    }
	
    function get_candidate_consolidated_score($data)
    {
        $this->db->where($data);
        $this->db->where('user.id = talent_presentation.judge');
        return $this->db->get('user, talent_presentation');//->result_array()[0]['score']; 
    }

    
    function get_tot_score($data)
    {  
        $this->db->select('talent_presentation.candidate, sum(rank) as tot_score');
        $this->db->where($data); 
        $this->db->where('talent_presentation.judge != 0');
        return $this->db->get('talent_presentation');//->result_array()[0]['score']; 
    }
    
    function get_all_score()
    { 
        return $this->db->get($this->table)->result_array()[0]['score']; 
    }

    

    public function get_user($data)
    {  
        $this->db->where($data);
        return $this->db->get($this->table)->result_array()[0];
    } 
  

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    function get_candidate_rank_consolidate($data)
    {
        $this->db->where($data);
        $this->db->where("user.id =  talent_presentation.judge");
        return $this->db->get('talent_presentation, user');
    }
    
    function get_judge()
    {
        
        $this->db->select(' DISTINCT(judge)');  
        $this->db->from('talent_presentation, user');  
        $this->db->where('talent_presentation.judge', 'user.id');  
        $this->db->where('user.role_type', 'judge');  
        return $this->db->get_compiled_select();

        
    }

    function get_ranking_specific_judge($data)
    {
        return $this->db
            ->where($data)
            ->order_by('score', 'DESC')
            ->get($this->table)->result_array();
    }

    function get_consolidated_ranking($data)
    {
        return $this->db
            ->where('score != 0')
            ->where($data)
            ->order_by('score', 'asc')
            ->get($this->table)->result_array();
    }

    function update_rank($data)
    {
        return $this->db
            ->where('candidate', $data['candidate'])
            ->where('judge', $data['judge']) 
            ->update($this->table, $data);
    }
 
    public function get_top_candidate()
    { 
        return $this->db 
            ->where('talent_presentation.judge = 0')
            ->where('candidate.id = talent_presentation.candidate')
            ->order_by('rank asc')
			->get('talent_presentation, candidate');
    }

	public function update_status($data)
	{
		return $this->db 
			->where('judge', $data['judge']) 
			->update($this->table, $data);
	}

	public function get_status($data)
	{
		$status =  $this->db 
			->select('distinct(status)')
            ->where($data)
			->get('talent_presentation');

		if($status->num_rows() > 0){
			return $status->result_array()[0]['status'];
		}
		return "unlocked";
			
	}

	public function delete_previous_score($data)
	{ 
		return $this->db
            ->where($data)
            ->delete('talent_presentation');
	}

	public function get_candidate_rank_summary($data)
    { 
        $this->db->where($data);
        return $this->db->get($this->table)->result_array()[0]['rank']; 

    }

	public function get_candidate_score_summary($data)
    { 
        $this->db->where($data);
        return $this->db->get($this->table)->result_array()[0]['score']; 

    }

	public function get_summary_candidate_final_rank($data)
	{ 
        $this->db->where($data);  
        return $this->db->get('talent_presentation');
	}

	
 
}
