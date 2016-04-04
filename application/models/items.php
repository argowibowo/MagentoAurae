<?php
 
if (!defined('BASEPATH')
)
    exit('No direct script access allowed');
 
class items extends CI_Model {
 
    public function __construct() {
        parent::__construct();
    }
 
    function create($array_data) {
        $this->db->insert('tbl_items', $array_data);
    }
 
    function getAll() {
        $this->db->select('*')->from('tbl_items');
        return $this->db->get();
    }
 
    function get($id) {
        $this->db->select('*')->from('tbl_items');
        $this->db->where('id_item', $id);
        return $this->db->get();
    }
 
    function update($array_data, $id) {
        $this->db->where('id', $id);
        $this->db->limit(1);
        $this->db->update('tbl_items', $array_data);
    }
 
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_items');
    }
 
}
 
?>