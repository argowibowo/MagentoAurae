<?php

if (!defined('BASEPATH')
)
    exit('No direct script access allowed');

Class customer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_cust($id) {
        $this->db->select('*')->from('ms_customer');
        $this->db->where('ID', $id);
        return $this->db->get();
    }

    function getCustomer($id, $password){
    	$this -> db -> select('*');
    	$this -> db -> from('ms_customer');
    	$this -> db -> where('email', $id);
    	$this -> db -> where('password', $password);
    	$this -> db -> limit(1);

    	$query = $this -> db -> get();

    	if($query -> num_rows() == 1){
    		return $query->result();
    	}
    	else{
    		return false;
    	}
    }

    // method ini digunakan untuk mengecek login
    // menambahkan pengecekan user dr table ms_customer
    // perbedaan antara pelanggan dengan user adalah status user ada S (Super)
    function getLoginDetail($id, $password){
    	$this -> db -> select('*');
    	$this -> db -> from('ms_customer');
    	$this -> db -> where('email', $id);
    	$this -> db -> where('password', $password);
    	$this -> db -> where('STATUS','S');
    	$this -> db -> limit(1);

    	$query = $this -> db -> get();

    	if($query -> num_rows() == 1){
    		return $query->result();
    	}
    	else{
    		return false;
    	}
    }

    function getAllCust(){
        $this -> db -> select('ID, NAMA');
    	$this -> db -> from('ms_customer');
    	$this -> db -> where('rec_status', 'A');
    	$this -> db -> where('status', 'A');

    	$query = $this -> db -> get();

    	if($query -> num_rows() > 0){
            return $query->result();
    	}
    	else{
            return false;
    	}
    }

    function updateStatusDelete($array_data, $id) {
        $this->db->where('ID', $id);
        $this->db->limit(1);
        $this->db->update('ms_customer', $array_data);
    }

    private $query_str = '';

    function get_list() {
        $query=$this->db->query($this->query_str);
	$results_array=$query->result();
	return $results_array;
}

    public function set_query_str($query_str) {
    	$this->query_str = $query_str;
    }
}

?>