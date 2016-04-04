<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Profile extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->model('profile_model');
 }

 function index(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $data['menu'] = 'profile';

     $data['adminData'] = $this->profile_model->getAdminData();

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('profile_view', $data);
     $this->load->view('footer', $data);
   }
   else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function doUpdate(){
	if(!empty($_POST)){
		$email = $_POST['email'];
		$name = $_POST['name'];
		$password = $_POST['password'];

		$this->profile_model->updateAdminData($email,$name,$password);

		if(empty($data)){
			$data = new stdClass();
		}
		$data->message = 'Update Success.';
		$data->menu = 'Profile';

		$data->adminData = $this->profile_model->getAdminData();

		$this->load->view('header2', $data);
		$this->load->view('header_menu2', $data);
		$this->load->view('profile_view', $data);
		$this->load->view('footer', $data);
	} else {
 		redirect('profile');
	}
 }
}
?>