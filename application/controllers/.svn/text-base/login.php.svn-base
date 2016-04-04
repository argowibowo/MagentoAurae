<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
 	}

 	function index(){
        if($this->session->userdata('logged_in')){
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['menu'] = 'home';
                $this->load->view('header2', $data);
                $this->load->view('header_menu2', $data);
                $this->load->view('index', $data);
                $this->load->view('footer', $data); 
        }else{
        	if(empty($data)){
 				$data = new stdClass();
 			}
 			$data->menu = 'home';
			$this->load->helper ( array (
					'form' 
			) );
			$this->load->view ( 'header2', $data );
			$this->load->view ( 'login', $data );
    	}
 	}
 	
 	public function doLogin(){
 		if(empty($data)){
 			$data = new stdClass();
 		}
 		$data->test="test";
	    redirect('home', 'refresh',$data);
 	}
}
?>