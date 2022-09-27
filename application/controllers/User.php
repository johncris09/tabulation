<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    
    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id') ) { 
            redirect('login'); 
        }
    } 

	public function check_password()
	{
		$data = array(
			'password' => md5( $this->input->post('password')), 
		);
		
		$num_row = $this->user_model->login($data);  

        echo json_encode($num_row);
	}
  
        
}
         