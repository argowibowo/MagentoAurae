<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Pesanan_all extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->database();
   $this->load->helper('url');
   $this->load->library('grocery_CRUD');
   $this->load->model('pesanan_model');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $crud = new grocery_CRUD();
     $crud->set_theme('datatables');
//     $crud->where('lg_nota.STATUS','L');
     $crud->set_table('lg_nota');
     $crud->set_relation('ID_CUSTOMER', 'ms_customer', 'NAMA',array('REC_STATUS' => 'A'));

     $crud->columns('ID_NOTA','ID_CUSTOMER','TANGGAL','SHIPPING_FROM','SHIPPING_TO','TOTAL','STATUS');

     $crud->display_as('ID_NOTA','ID Pesanan');
     $crud->display_as('ID_CUSTOMER','Customer');
     $crud->display_as('TANGGAL','Tanggal Order');
     $crud->display_as('SHIPPING_FROM','From');
     $crud->display_as('SHIPPING_TO','To');
     $crud->display_as('TOTAL','Total');
     $crud->display_as('STATUS','Status Pembayaran');

     $crud->set_subject('Nota');

     //$crud->fields('ID_NOTA','NAMA','TANGGAL','SHIPPING_FROM','SHIPPING_TO','TOTAL','STATUS');

     $crud->unset_add();
     $crud->unset_delete();
     $crud->unset_edit();
     $crud->unset_read();
     $crud->add_action('LIHAT', '', 'pesanan_all/view_pesanan','ui-icon-search');
     $crud->add_action('JADIKAN BELUM LUNAS', '', 'pesanan_all/update_status_pesanan','ui-icon-circle-minus');

     $data = $crud->render();

     $data->menu = 'pesanan';

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('pesanan_all_view', $data);
     $this->load->view('footer', $data);
   }
   else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function view_pesanan_pengiriman($id_nota){
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username'];
     $data['id'] = $id_nota;
     $data['menu'] = 'pesanan';
     $data['notas'] = $this->pesanan_model->getNotaById($id_nota);

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('pesanan_pengiriman_view', $data);
     $this->load->view('footer', $data);
 }

 function view_pesanan($id_nota){
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username'];
     $data['id'] = $id_nota;
     $data['menu'] = 'pesanan';
     $data['notas'] = $this->pesanan_model->getNotaById($id_nota);
     $data['details'] = $this->pesanan_model->get_nota_detail($id_nota);

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('pesanan_detail_view', $data);
     $this->load->view('footer', $data);
 }

 function doUpdatePesanan(){
     $id_update = $this->input->post("hid_idnota");
     $from = $this->input->post("shipping_from");
     $to = $this->input->post("shipping_to");
     $fee = $this->input->post("shipping_fee");

     $dataArr = array("SHIPPING_FROM" => $from,
         "SHIPPING_TO" => $to,
         "SHIPPING_FEE" => $fee);
     $this->pesanan_model->updateStatusPesanan($dataArr, $id_update);
     $this->view_pesananbelumlunas($id_update);
 }
 
 function update_status_pesanan($id){
   $status = 'B';
   $dataArr = array("STATUS" => $status);
   $this->pesanan_model->updateStatusPesanan($dataArr, $id);
   redirect("pesanan_all");
 }
 
 function updateCancelPesanan($id){
   $id_update = $id;
   $dataArr = array("STATUS" => 'C');
   $this->pesanan_model->updateCancelPesanan($dataArr, $id_update);
   redirect("pesanan_all");
 }
}

?>