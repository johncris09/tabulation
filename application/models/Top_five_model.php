<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Top_five_model extends CI_Model
{


	public $table = 'top_five';
	
    public function __construct()
    {
        parent::__construct();
    } 

    

    public function insert($data)
    {
        
        $insert = $this->db->insert('top_five', $data);
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
			->get('top_five');   

		if($query->num_rows() == 5){
			return true;
		}
        return false;
		
	}
    
    public function get_top_candidate()
    { 
        return $this->db
            ->select('candidate.id, candidate.number, candidate.name, top_five.rank')
            ->where('judge',0)
            ->where('top_five.candidate = candidate.id')
            ->where('score != 0')
            ->order_by('rank','asc')
			->get('candidate, top_five');
    } 

	public function is_judge_done_scoring($data)
	{ 
		$query = $this->db
            ->select("count(status) as num_row")
            ->where($data) 
            ->where("status", "locked") 
			->get('top_five');
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
        $this->db->where('user.id = top_five.judge');
        return $this->db->get('user, top_five');//->result_array()[0]['score']; 
    }

    
    function get_tot_score($data)
    {  
        $this->db->select('top_five.candidate, sum(rank) as tot_score');
        $this->db->where($data); 
        $this->db->where('top_five.judge != 0');
        return $this->db->get('top_five');//->result_array()[0]['score']; 
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
        $this->db->where("user.id =  top_five.judge");
        return $this->db->get('top_five, user');
    }
    
    function get_judge()
    {
        
        $this->db->select(' DISTINCT(judge)');  
        $this->db->from('top_five, user');  
        $this->db->where('top_five.judge', 'user.id');  
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
			->get('top_five');

		if($status->num_rows() > 0){
			return $status->result_array()[0]['status'];
		}
		return "unlocked";
			
	}

    public function get_scoring_status($data)
    {
        $status =  $this->db  
            ->where($data)
			->get('top_five');

		if($status->num_rows() > 0){
			return $status->result_array()[0]['status'];
		}
		return "unlocked";
    }

	public function delete_previous_score($data)
	{ 
		return $this->db
            ->where($data)
            ->delete('top_five');
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
        return $this->db->get('top_five');
	}

 
 
}
 

