<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Confirmation extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->library('grocery_CRUD');
   $this->load->model('Confirmation_model');
 }

 function index(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $crud = new grocery_CRUD();
     $crud->set_theme('datatables');

     $crud->set_table('lg_konfirmasi');

     $crud->display_as('UPDATE_BY','Nama');
     $crud->display_as('ID_CUSTOMER','Customer');
     $crud->display_as('ID_NOTA','Order Id');
     $crud->display_as('TANGGAL','Tanggal');
     $crud->display_as('JUMLAH','Jumlah');
     $crud->display_as('BANK','Bank');
     $crud->display_as('REKENING','Bank Account Number');
     $crud->display_as('STATUS','Status');

     $crud->set_relation('id_customer','ms_customer','nama',array('rec_status' => 'A'));
     //      $crud->set_relation('ID_NOTA','LG_NOTA','ID_NOTA',array('TIPE' => 'S'));
     $crud->set_relation('id_nota','lg_nota','id_nota');

     $crud->columns('UPDATE_BY','ID_NOTA','TANGGAL','JUMLAH','BANK','REKENING','STATUS');
//     $crud->columns('ID_CUSTOMER','ID_NOTA','TANGGAL','AMOUNT','BANK','REKENING','STATUS');

     $crud->unset_read();
//      $crud->unset_add();
     $crud->unset_delete();
     $crud->unset_edit();

     $crud->field_type('STATUS','dropdown',array('P' => 'Pending', 'A' => 'Approve', 'R' => 'Reject'));

     $crud->add_action('Lihat Detail', '', 'confirmation/doDetail','');

     $crud->unique_fields('ID_NOTA');

     $crud->set_subject('Konfirmasi Pembayaran');

     $crud->callback_before_insert(array($this,'doBeforeInsert'));

     if ($crud->getState() == 'edit' || $crud->getState() == 'add'||$crud->getState() == 'list') {
     	$crud->field_type('NAMA', 'hidden');
     	$crud->field_type('UPDATE_BY', 'hidden');
     }

     $crud->required_fields('ID_CUSTOMER','ID_NOTA','TANGGAL','JUMLAH','BANK','REKENING','STATUS');
     $data = $crud->render();

     $data->menu = 'confirmation';

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('confirmation_view', $data);
     $this->load->view('footer', $data);
   }
   else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function doDetail($id){
	//$this->Confirmation_model->getDetail($id);
    if(empty($data)){
		$data = new stdClass();
 	}
 	$data->menu = 'confirmation';
	$data->row = $this->Confirmation_model->getDetail($id);
	$this->load->view('header2', $data);
    $this->load->view('header_menu2', $data);
    $this->load->view('confirmation_detail_view', $data);
    $this->load->view('footer', $data);
 }

 function doBeforeInsert($post_array){
 	$post_array['UPDATE_BY'] = 'Admin';
 	return $post_array;
 }

 function doReject($id){
	$data = array('STATUS' => 'R');
	$this->db->where('ID_KONFIRMASI', $id);
	$this->db->update('LG_KONFIRMASI', $data);
 	redirect('confirmation');
 }

 function doApprove($id){
 	$data = array('STATUS' => 'P');
 	$this->db->where('ID_KONFIRMASI', $id);
 	$this->db->update('LG_KONFIRMASI', $data);
 	redirect('confirmation');
 }

 function doApproveAndLunas($id){
 	$data = array('STATUS' => 'A');
 	$this->db->where('ID_KONFIRMASI', $id);
 	$this->db->update('LG_KONFIRMASI', $data);
 	redirect('confirmation');
 }
}
?>