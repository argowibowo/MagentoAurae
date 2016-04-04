<?php

/**
 * Description of category
 *
 * @author admin
 */
class Category_model extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

	function getDetailCategory($id) {
		$this->db->select('*')->from('ms_category');
		$this->db->where('ID_CATEGORY', $id);
		return $this->db->get();
	}

    function getCategory($type,$name){
        $this -> db -> select('*');
    	$this -> db -> from('ms_category');
    	$this -> db -> where('tipe', $type);
    	$this -> db -> where('name', $name);
    	$this -> db -> where('rec_status', 'a');

    	$query = $this -> db -> get();

    	if($query -> num_rows() > 0){
    		return $query->result();
    	}
    	else{
    		return false;
    	}
    }

    function delete($array_data, $id) {
        $this->db->where('ID_CATEGORY', $id);
        $this->db->limit(1);
        $this->db->update('ms_category', $array_data);
    }
}

?>
