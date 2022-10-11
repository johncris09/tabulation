<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evening_gown_model extends CI_Model
{


	public $table = 'evening_gown';
	
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
			->select('judge, count(status) as num_row') 
            ->where('judge != 0') 
            ->where('status', 'locked') 
            ->group_by('judge') 
			->get('evening_gown');   

		if($query->num_rows() == 5){
			return true;
		}
        return false;
		
	}


	public function is_judge_done_scoring($data)
	{ 
		$query = $this->db
            ->select("count(status) as num_row")
            ->where($data) 
            ->where("status", "locked") 
			->get('evening_gown');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                if($row['num_row'] == 12){ 
                    return true;
                }else{
                    return false;  
                } 
            }
        }
        return false;   
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
        $this->db->where('user.id = evening_gown.judge');
        return $this->db->get('user, evening_gown');//->result_array()[0]['score']; 
    }

    
    function get_tot_score($data)
    {  
        $this->db->select('evening_gown.candidate, sum(rank) as tot_score');
        $this->db->where($data); 
        $this->db->where('evening_gown.judge != 0');
        return $this->db->get('evening_gown');//->result_array()[0]['score']; 
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
        $this->db->where("user.id =  evening_gown.judge");
        return $this->db->get('evening_gown, user');
    }
    
    function get_judge()
    {
        
        $this->db->select(' DISTINCT(judge)');  
        $this->db->from('evening_gown, user');  
        $this->db->where('evening_gown.judge', 'user.id');  
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
            ->where('evening_gown.judge = 0')
            ->where('candidate.id = evening_gown.candidate')
            ->order_by('rank asc')
			->get('evening_gown, candidate');
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
			->get('evening_gown');

		if($status->num_rows() > 0){
			return $status->result_array()[0]['status'];
		}
		return "unlocked";
			
	} 
	
	public function delete_previous_score($data)
	{ 
		return $this->db
            ->where($data)
            ->delete('evening_gown');
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
        return $this->db->get('evening_gown');
	}
	
}
