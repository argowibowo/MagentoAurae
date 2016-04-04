<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Stock extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->model('stock_model');
 }

 function index(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $data['menu'] = 'stock';
     $data['stocks'] = $this->stock_model->getAllStock();

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('stock_view', $data);
     $this->load->view('footer', $data);
   }
   else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function doUpdate(){
     $form_data = $this->input->post();
     $data_json = $this->input->post("hid_updVal");
     echo $data_json;
     $data_json = stripslashes($data_json);
     $data_json = json_decode($data_json,true);
     
     foreach($data_json as $json1){
       $dataArr = array("STOCK" => $json1['qty']);
       $this->stock_model->updateStock($dataArr, $json1['idStok']);
    }
    redirect('stock');
 }
}
?>