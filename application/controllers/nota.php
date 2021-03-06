<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class nota extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('nota');
 }
 
 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['notas'] = $this->nota->getAll()->result();
     $this->load->view('home_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     //redirect('login', 'refresh');
     $data['notas'] = $this->nota->getAll()->result();
     $this->load->view('home_view', $data);
   }
 }
 
 function addCart($id_item)
 {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $id_item;
     $this->load->view('add_cart_view', $data);
 }
}
 
?>