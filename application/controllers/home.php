<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('nota');
   $this->load->library('grocery_CRUD');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
//      $data['notas'] = $this->nota->getAll()->result();

     $data['menu']='home';
//     $data->menu = 'home';

     $labels = array(
     		date('D, d-M-Y',strtotime("-6 days")),
     		date('D, d-M-Y',strtotime("-5 days")),
     		date('D, d-M-Y',strtotime("-4 days")),
     		date('D, d-M-Y',strtotime("-3 days")),
     		date('D, d-M-Y',strtotime("-2 days")),
     		date('D, d-M-Y',strtotime("-1 days")),
     		date('D, d-M-Y',strtotime("0 days"))
     );

     $data['labels'] = $labels;

     $recordData = array(
     		$this->nota->countTotal(date('Y-m-d',strtotime("-6 days"))),
     		$this->nota->countTotal(date('Y-m-d',strtotime("-5 days"))),
     		$this->nota->countTotal(date('Y-m-d',strtotime("-4 days"))),
     		$this->nota->countTotal(date('Y-m-d',strtotime("-3 days"))),
     		$this->nota->countTotal(date('Y-m-d',strtotime("-2 days"))),
     		$this->nota->countTotal(date('Y-m-d',strtotime("-1 days"))),
     		$this->nota->countTotal(date('Y-m-d',strtotime("0 days")))
     );

     $data['recordData'] = $recordData;

     $data['zeroStock'] = $this->nota->getZeroStock();
     $data['latestNota'] = $this->nota->getLatestNota();

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('index', $data);
     $this->load->view('footer', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 public function get_notas()
    {
        $this->grocery_crud->set_table('lg_nota');
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    function _example_output($output = null)

    {
    	$this->load->view('header2',$output);
//        $this->load->view('home_view',$output);
    }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login','refresh');
 }

}

?>