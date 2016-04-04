<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Category extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->library('grocery_CRUD');
   $this->load->model('category_model');
 }

 function index(){
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $crud = new grocery_CRUD();
     $crud->set_theme('datatables');

     $crud->where('REC_STATUS','A');
     $crud->set_table('ms_category');
     $crud->columns('NAMA','TIPE');

     $crud->fields('NAMA','TIPE','REC_STATUS');
     $crud->required_fields('NAMA','TIPE');
     if ($crud->getState() == 'edit' || $crud->getState() == 'add' || $crud->getState() == 'list') {
     	$crud->field_type('REC_STATUS', 'hidden');
     }

     $crud->display_as('NAMA','Nama');
     $crud->display_as('TIPE','Tipe');

     $crud->set_subject('Category');

     $crud->field_type('TIPE','dropdown',array('RS' => 'Ready Stock', 'PO' => 'PO'));

     $crud->add_action('Delete', '', 'category/doDelete','ui-icon-circle-minus');
     $crud->unset_delete();
	 $crud->unset_read();
     $crud->callback_before_insert(array($this,'doBeforeInsert'));

     $data = $crud->render();

     $data->menu = 'category';

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('category_view', $data);
     $this->load->view('footer', $data);
   }
   else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function doBeforeInsert($post_array){
 	$post_array['REC_STATUS'] = 'A';
 	return $post_array;
 }

 function doDelete($id){
   $dataArr = array("rec_status" => 'N');
   $this->category_model->delete($dataArr, $id);
   redirect("category");
 }
}

?>