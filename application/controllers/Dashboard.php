<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id') ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Dashboard"; 

		if( strtolower ($_SESSION['role_type'] ) == "admin"){  
			$this->load->view('admin/dashboard', $data);   
		}else{
			$this->load->view('user/dashboard', $data);  
		}
		
	}

	
    public function signout()
    { 
        
        $all_sessions = $this->session->all_userdata();
        // unset all sessions
        foreach ($all_sessions as $key => $val) {
            $this->session->unset_userdata($key);
        } 
		redirect('login');
    } 
 
        
}
         