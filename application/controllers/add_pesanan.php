<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Add_pesanan extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->model('pesanan_model');
   $this->load->model('customer_model');
   $this->load->model('catalog_publish_rs_model');
   $this->load->model('stock_model');
 }

 function index(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $data['menu'] = 'pesanan';
     $data['custs'] = $this->customer_model->getAllCust();
     $data['prdks'] = $this->catalog_publish_rs_model->getAllItem();
     $data['varians'] = $this->stock_model->getAllStock();

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('add_pesanan_view', $data);
     $this->load->view('footer', $data);
   }
   else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function doInsertPesanan(){
     $form_data = $this->input->post();
     $data_json = $this->input->post("hid_updVal");
     $data_cust = $this->input->post("cb_custName");
     $data_status = $this->input->post("hid_statVal");
     //echo $data_json;
     $data_json = stripslashes($data_json);
     $data_json = json_decode($data_json,true);

     $varTotal = 0;

     foreach($data_json as $json1){
            $varTotal = $varTotal + $json1['SUBTOTAL'];
     }

     $dataArr = array("ID_CUSTOMER" => $data_cust,
           "STATUS" => $data_status,
           "TOTAL" => $varTotal,
     		"TANGGAL" =>date('Y-m-d',strtotime("0 days"))
     );
     $this->pesanan_model->insertPesanan($dataArr,$data_json);
     redirect('add_pesanan');
 }
}
?>