<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Settings extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id') ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Settings"; 

		if( strtolower ($_SESSION['role_type'] ) == "admin"){  
			$data['settings'] = $this->settings_model->get_all_settings();
			$this->load->view('admin/settings', $data);   
		}else{
			show_404();
		}
		
	}

	public function update()
	{
		$data = array(
			'status' =>  $this->input->post('status'), 
			'settings' =>  $this->input->post('settings'), 
		);
		$update = $this->settings_model->update($data); 
		
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

		echo json_encode($data);
	}
 

	public function get_settings()
	{
		$data = array(
			'settings' =>  $this->input->post('settings'), 
		);
		$settings = $this->settings_model->get_settings($data);
		echo json_encode($settings);
	}
 
        
}
         