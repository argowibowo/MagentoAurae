<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('customer_model','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('inputEmail', 'email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
   	if(empty($data)){
		$data = new stdClass();
 	}
 	 $data->loginMessage = 'Username/password salah.';

   	 $this->load->view('header2', $data);
     $this->load->view('login');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
       //$session_data = $this->session->userdata('logged_in');
         //$data['username'] = $session_data['username'];
         //$this->load->view('home_view', $data);
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('inputEmail');

   //query the database
   $result = $this->customer_model->getLoginDetail($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->EMAIL
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>