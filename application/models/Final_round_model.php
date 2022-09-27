<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Final_round_model extends CI_Model
{


	public $table = 'final_round123';
	
    public function __construct()
    {
        parent::__construct();
    } 

    public function is_exist($data)
    {    
        $this->db->where($data);
        return $this->db->get('final_round'); 
    } 


    public function insert($data)
    {
        
        $insert = $this->db->insert('final_round', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }

    
    public function get_all_candidate()
    { 
        return $this->db
            ->select('distinct(final_round.candidate), candidate.*')
            ->where('candidate.id = final_round.candidate')
            ->order_by('candidate.number')
			->get('final_round, candidate');
    }

	public function is_all_done_scoring()
	{ 
		$query = $this->db  
			->select('judge')
			->distinct()
            ->where('judge != 0') 
			->get('final_round');
			
		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		return 0;
		
	}
    
    public function update($data)
    { 
        return $this->db
            ->where('id', $data['id'])
            ->update('final_round', $data);
    }


    public function if_exist($data)
    {   
        $this->db->where('candidate', $data['candidate']);
        $this->db->where('judge', $data['judge']);
        return $this->db->get('final_round'); 
    } 

     
    function get_candidate_score($data)
    { 
        $this->db->where($data);
        return $this->db->get('final_round')->result_array()[0]['score']; 

    }

    function get_candidate_consolidated_score($data)
    {
        $this->db->where($data);
        $this->db->where('user.id = final_round.judge');
        return $this->db->get('user, final_round');//->result_array()[0]['score']; 
    }

    
    function get_tot_score($data)
    {  
        $this->db->select('final_round.candidate, sum(rank) as tot_score');
        $this->db->where($data); 
        $this->db->where('final_round.judge != 0');
        return $this->db->get('final_round');//->result_array()[0]['score']; 
    }

    



    
    
    
    // function get_all_score()
    // { 
    //     return $this->db->get('final_round')->result_array()[0]['score']; 
    // }

    

    // public function get_user($data)
    // {  
    //     $this->db->where($data);
    //     return $this->db->get('final_round')->result_array()[0];
    // } 
  

    // public function delete($id)
    // {
    //     return $this->db
    //         ->where('id', $id)
    //         ->delete('final_round');
    // }

    // function get_candidate_rank_consolidate($data)
    // {
    //     $this->db->where($data);
    //     $this->db->where("user.id =  final_round.judge");
    //     return $this->db->get('final_round, user');
    // }
    
    // function get_judge()
    // {
        
    //     $this->db->select(' DISTINCT(judge)');  
    //     $this->db->from('final_round, user');  
    //     $this->db->where('final_round.judge', 'user.id');  
    //     $this->db->where('user.role_type', 'judge');  
    //     return $this->db->get_compiled_select();

        
    // }

    function get_ranking_specific_judge($data)
    {
        return $this->db
            ->where($data)
            ->order_by('score', 'DESC')
            ->get('final_round')->result_array();
    }

    function get_consolidated_ranking($data)
    {
        return $this->db
            ->where('score != 0')
            ->where($data)
            ->order_by('score', 'asc')
            ->get('final_round')->result_array();
    }

    function update_rank($data)
    {
        return $this->db
            ->where('candidate', $data['candidate'])
            ->where('judge', $data['judge']) 
            ->update('final_round', $data);
    }

    
    
    public function get_top_five_candidate()
    { 
        return $this->db 
            ->where('judge',0)
            ->where('candidate.id = final_round.candidate')
            ->where('score != 0')
            ->order_by('rank','asc')
            ->limit('5')
			->get('candidate, final_round');
    }   
	
	public function update_status($data)
	{
		return $this->db 
			->where('judge', $data['judge']) 
			->update('final_round', $data);
	}

	public function get_status($data)
	{
		$status =  $this->db 
			->select('distinct(status)')
            ->where($data)
			->get('final_round');

		if($status->num_rows() > 0){
			return $status->result_array()[0]['status'];
		}
		return "unlocked";
			
	}
	

 
}
