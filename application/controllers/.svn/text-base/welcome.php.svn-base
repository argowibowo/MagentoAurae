<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('javascript');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->library('session');
            if (!$this->session->userdata('user_input')) {
			$data["msg"] = "No session!";
		} else {
			$userinput = $this->session->userdata('user_input');
			$data["msg"] = "User input say's: $userinput";
		}
            if ($this->input->post('userInput'))
            {
                $data["stat"] = "masuk input";
                $this->session->set_userdata('user_input', $this->input->post('userInput'));
                //prompt the user that data has been save, give a link to session_output
		//echo "<br>Session has been save! <a href='" . base_url() . "index.php/session_output'> Get the session from other page  </a>";
            }
            $data["stat"] = "tidak masuk input";
            $this->load->view('welcome_message',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */