<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Swim_wear extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id') ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Best in Sweam Wear"; 
		$data['candidate'] = $this->candidate_model->get_all_candidate();
		if( strtolower ($_SESSION['role_type'] ) == "admin"){ 
			$data['judge'] = $this->user_model->get_all_judge(); 
			// $data['score'] = $this->swim_wear_model->get_all_score(); 
			$this->load->view('admin/swim_wear', $data);   
		}else{
			$this->load->view('user/swim_wear', $data);  
		}
		
	}
	
	
    public function insert()
    {
 
        $data = array(
			'candidate' =>  $this->input->post('candidate'),
			'score' =>  $this->input->post('score'),
			'judge' =>  $this->input->post('judge'), 
		);  

		// if exist then update
		// else insert
		$record = $this->swim_wear_model->if_exist($data);

		if( $record->num_rows() > 0){ 
			$id = $record->result_array()[0]['id'] ; // score id

			$update_score = array(
				'id' => $id,
				'candidate' => $data['candidate'],
				'judge' => $data['judge'],
				'score' => $data['score'],
			);
			$update = $this->swim_wear_model->update($update_score); 
			
            if($update){ 
            	$data = array(
            		'response' => true,
            		'message'  => 'Successfully Approved!',
            	);
    
            }else{ 
            	$data = array(
            		'response' => false,
            		'message'  => 'Something went wrong.',
            	);
            }


		}else{  
			$insert = $this->swim_wear_model->insert($data);
			if($insert){ 
				$data = array(
					'response' => true,
					'message'  => 'Inserted Successfully!',
				);
	
			}else{ 
				$data = array(
					'response' => false,
					'message'  => 'Something went wrong.',
				);
			}

		} 
        echo json_encode($data );
    }
	


	function get_candidate_score()
	{
		
        $data = array(
			'candidate' =>  $this->input->post('candidate'), 
			'judge' =>  $this->input->post('judge'), 
		);  
		$get_candidate_score = $this->swim_wear_model->get_candidate_score($data);


		$data = $get_candidate_score;
		
        echo json_encode($data );
	}

	
	
	function get_candidate_consolidated_score()
	{
		
        $data = array(
			'candidate' =>  $this->input->post('candidate'), 
			'judge_no' =>  $this->input->post('judge_no'), 
		);  
		$get_candidate_score = $this->swim_wear_model->get_candidate_consolidated_score($data);
		if($get_candidate_score->num_rows() > 0){
			$data['rank']=  ($get_candidate_score->result_array()[0]['rank'] * 100 ) /100;
		}
 
		
        echo json_encode($data );
	}

	
	function get_tot_score()
	{
		
        $data = array(
			'candidate' =>  $this->input->post('candidate'),  
		);  
		$get_tot_score = $this->swim_wear_model->get_tot_score($data);
		if($get_tot_score->num_rows() > 0){
			$data['tot_score']=  ($get_tot_score->result_array()[0]['tot_score'] * 100 ) /100;
		}
  
		
        echo json_encode($data );
	}




	function get_candidate_score_consolidate($candidate_id)
	{
		$data = array(
			'candidate' => $candidate_id
		);
		$arrcore = $this->swim_wear_model->get_candidate_score_consolidate($data);
		return $arrcore;
	
	}

	function get_ranking_specific_judge()
	{
		$data = array(
			'judge' => $_SESSION['id'],
		);
		$result = $this->swim_wear_model->get_ranking_specific_judge($data);
  
		$rank = 0;
		$last_score = false;
		$rows = 0;
		$y = [];  // rank handler
		$x = [];  // candidate handler
 

		foreach($result as $row){
			$rows++;
			if( $last_score!= $row['score'] ){
				$last_score = $row['score'];
				$rank = $rows;  
			} 
			$x[] = array(
				'candidate' => $row['candidate'], 
				'rank' => $rank,
			);

			
			$y[] = $rank; 
		}  
		
		$uarr = array_unique($y); 
		$duplicate = array_diff($y, array_diff($uarr, array_diff_assoc($y, $uarr)));
		$arr = array_count_values($y); // get total duplicate of   n

		$i = 0;
		$average =0;
		$index = 0; 

		foreach($arr as $key => $row){ 
			if($arr[$key] > 1){
				$index = $key -1 ;
				$tot = 0;
				for($j = 0; $j<$arr[$key]; $j++ ){ 
					$index++; 
					$tot += $index;  
				}   
				$average =  $tot/ $arr[$key];
				$index = $key -1 ; 
				for($j = 0; $j<$arr[$key]; $j++ ){ 
					$x[$index]['rank'] = $average;
					$index++; 
				} 
			} 
		}  
		echo json_encode($x);
		
	} 

	
	function get_consolidated_ranking()
	{
		$data = array(
			'judge' => 0,
		);
		$result = $this->swim_wear_model->get_consolidated_ranking($data);
		$x = $result;

		$rank = 0;
		$last_score = false;
		$rows = 0;
		$y = [];  // rank handler
		$x = [];  // candidate handler
 

		foreach($result as $row){
			$rows++;
			if( $last_score!= $row['score'] ){
				$last_score = $row['score'];
				$rank = $rows;  
			} 
			$x[] = array(
				'candidate' => $row['candidate'], 
				'rank' => $rank,
			);

			
			$y[] = $rank; 
		}  
		
		$uarr = array_unique($y); 
		$duplicate = array_diff($y, array_diff($uarr, array_diff_assoc($y, $uarr)));
		$arr = array_count_values($y); // get total duplicate of   n

		$i = 0;
		$average =0;
		$index = 0; 

		foreach($arr as $key => $row){ 
			if($arr[$key] > 1){
				$index = $key -1 ;
				$tot = 0;
				for($j = 0; $j<$arr[$key]; $j++ ){ 
					$index++; 
					$tot += $index;  
				}   
				$average =  $tot/ $arr[$key];
				$index = $key -1 ; 
				for($j = 0; $j<$arr[$key]; $j++ ){ 
					$x[$index]['rank'] = $average;
					$index++; 
				} 
			} 
		}  
		echo json_encode($x);
		
	} 
	


	

	function update_rank()
	{
		 
		$data = array(
			'candidate' =>  $this->input->post('candidate'),
			'rank' =>  $this->input->post('rank'),
			'judge' =>  $this->input->post('judge'), 
		);  
 

		$update = $this->swim_wear_model->update_rank($data); 
			
		if($update){ 
			$data = array(
				'response' => true,
				'message'  => 'Score Successfully Submitted',
			);

		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Something went wrong.',
			);
		}
		echo json_encode($data);


	}
	

	
	
    public function insert_consolidated_score()
    {
 
        $data = array(
			'candidate' =>  $this->input->post('candidate'),
			'score' =>  $this->input->post('score'),
			'judge' =>  $this->input->post('judge'), 
		);  

		// if exist then update
		// else insert
		$record = $this->swim_wear_model->if_exist($data);


		// update score
		if( $record->num_rows() > 0){ 
			$id = $record->result_array()[0]['id'] ; // score id

			$update_score = array(
				'id' => $id,
				'candidate' => $data['candidate'],
				'judge' => $data['judge'],
				'score' => $data['score'],
			);
			$update = $this->swim_wear_model->update($update_score); 
			
            if($update){ 
            	$data = array(
            		'response' => true,
            		'message'  => 'Successfully Approved!',
            	);
    
            }else{ 
            	$data = array(
            		'response' => false,
            		'message'  => 'Something went wrong.',
            	);
            }


		}else{  
			$insert = $this->swim_wear_model->insert($data);
			if($insert){ 
				$data = array(
					'response' => true,
					'message'  => 'Inserted Successfully!',
				);
	
			}else{ 
				$data = array(
					'response' => false,
					'message'  => 'Something went wrong.',
				);
			}

		} 
        echo json_encode($data);
    }


        
} 