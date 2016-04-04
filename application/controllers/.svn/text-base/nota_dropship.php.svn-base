<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class nota_dropship extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('nota');
   $this->load->model('cust');
 }
 
 function index()
 {
 }
 
 function view_dropship($id)
    {
        $data['notas'] = $this->nota->get_nota($id)->result();
        $data['details'] = $this->nota->get_nota_detail($id)->result();
        
        $data['custs'] = $this->cust->get_cust($data['notas'][0]->ID_CUSTOMER)->result();
        $this->load->view('nota_dropship_view', $data);
        //echo "Just a test function for more button and id: <b>".(int)$id."</b><br/>";
        //echo "Just a test function for more button and idCust: <b>".(int)$data['notas'][0]->ID_CUSTOMER."</b><br/>";
    }
}
 
?>