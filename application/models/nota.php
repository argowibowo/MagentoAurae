<?php

if (!defined('BASEPATH')
)
    exit('No direct script access allowed');

class nota extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function create($array_data) {
        $this->db->insert('tbl_items', $array_data);
    }

    function getAll() {
        $this->db->select('*')->from('lg_nota');
        return $this->db->get();
    }

    function get_nota($id) {
        $this->db->select('*')->from('lg_nota');
        $this->db->where('ID_NOTA', $id);
        return $this->db->get();
    }

    function get_nota_detail($id){
        //For selecting one or more columns
        $this->db->select('*');
        //For determine one or more tables to select from
        $this->db->from('lg_nota');
        //For joining with another table, table name as first argument and condition string as second argument
        $this->db->join('lg_nota_detail', 'lg_nota.ID_NOTA = lg_nota_detail.ID_NOTA');
        $this->db->join('ms_item', 'ms_item.ID_ITEM = lg_nota_detail.ID_PRODUCT');
        $this->db->join('ms_category', 'ms_category.ID_CATEGORY = ms_item.ID_CATEGORY');
        //assign where condition
        $this->db->where('lg_nota.ID_NOTA', $id);
        //function without any argument. It actually runs the query that was built on last few statements.
        return $this->db->get();
        //returns result objects array
        //return $query->result();
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

    function countTotal($date){
    	$this->db->select_sum('lg_nota_detail.stock');
		$this->db->where('tanggal',$date);
		$this->db->from('lg_nota');
		$this->db->join('lg_nota_detail', 'lg_nota.id_nota = lg_nota_detail.id_nota');
		$this->db->group_by("tanggal");
		$query = $this->db->get();
 		if($query->num_rows() > 0){
 			foreach ($query->result() as $row){
 				return $row->stock;
 			}
 		} else {
 			return "0";
 		}
    }

    function getZeroStock(){
    	$this->db->select('ms_item.nama_item,ms_stock.warna,ms_stock.stock');
    	$this->db->where('ms_stock.stock',0);
    	$this->db->from('ms_item');
    	$this->db->join('ms_stock','ms_item.id_item = ms_stock.id_item');
    	$this->db->limit(10);
    	$query = $this->db->get();
    	return $query->result();
    }

    function getLatestNota(){
    	$this->db->select('ms_customer.id,ms_item.nama_item,ms_stock.warna,lg_nota_detail.stock,lg_nota_detail.subtotal');
    	$this->db->from('ms_customer');
    	$this->db->join('lg_nota','ms_customer.id = lg_nota.id_customer');
    	$this->db->join('lg_nota_detail', 'lg_nota.id_nota = lg_nota_detail.id_nota');
    	$this->db->join('ms_stock','lg_nota_detail.id_product = ms_stock.id_stok');
    	$this->db->join('ms_item','ms_stock.id_item = ms_item.id_item');
    	$this->db->order_by('lg_nota.tanggal', 'desc');
    	$this->db->limit(10);
    	$query = $this->db->get();
    	return $query->result();
    }
}

?>