<?php
if (!defined('BASEPATH')
)
    exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getAdminData(){
    	$this -> db -> select('*');
    	$this -> db -> from('ms_customer');
    	$this -> db -> where('STATUS', 'S');
    	$this -> db -> limit(1);

    	$query = $this -> db -> get();

    	if($query -> num_rows() == 1){
    		return $query->result();
    	}
    	else{
    		return false;
    	}
    }

    function updateAdminData($email,$name,$password){
    	$data = array(
    			'email' => $email,
    			'nama' => $name,
    			'password' => $password
    	);

    	$this->db->where('status', 'S');

    	$this->db->update('ms_customer', $data);
    }
}
?>