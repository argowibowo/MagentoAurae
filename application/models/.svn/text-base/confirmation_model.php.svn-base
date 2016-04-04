<?php

/**
 * Description of category
 *
 * @author admin
 */
class Confirmation_model extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

	function getDetail($id) {
		$this->db->select('*')->from('lg_konfirmasi');
		$this->db->where('id_konfirmasi', $id);
		$query = $this ->db->get();
		return $query->result();
	}

    function delete($array_data, $id) {
        $this->db->where('lg_konfirmasi', $id);
        $this->db->limit(1);
        $this->db->update('id_konfirmasi', $array_data);
    }

    function updateStatus($array_data, $id) {
    	$this->db->where('lg_konfirmasi', $id);
    	$this->db->limit(1);
    	$this->db->update('id_konfirmasi', $array_data);
    }
}

?>
