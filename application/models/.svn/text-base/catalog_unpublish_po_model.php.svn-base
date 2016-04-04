<?php

/**
 * Description of category
 *
 * @author admin
 */
class Catalog_unpublish_po_model extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

	function getDetail($id) {
		$this->db->select('*')->from('ms_item');
		$this->db->where('ID_ITEM', $id);
		return $this->db->get();
	}

    function getItem($name){
        $this -> db -> select('*');
    	$this -> db -> from('ms_item');
    	$this -> db -> where('NAMA_ITEM', $name);
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
        $this->db->where('ID_ITEM', $id);
        $this->db->limit(1);
        $this->db->update('ms_item', $array_data);
    }

    function update2Publish($array_data, $id) {
    	$this->db->where('ID_ITEM', $id);
    	$this->db->limit(1);
    	$this->db->update('ms_item', $array_data);
    }
}

?>
