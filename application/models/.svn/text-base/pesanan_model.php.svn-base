<?php

/**
 * Description of category
 *
 * @author admin
 */
class Pesanan_model extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

	function getDetail($id) {
		$this->db->select('*')->from('ms_item');
		$this->db->where('ID_ITEM', $id);
		return $this->db->get();
	}

    function getAllStock(){
        $this -> db -> select('s.ID_STOK, i.ID_ITEM, i.NAMA_ITEM, s.WARNA, s.STOCK');
    	$this -> db -> from('ms_item as i');
        $this -> db ->join('ms_stock as s','s.ID_ITEM = i.ID_ITEM');
    	//$this -> db -> where('rec_status', 'a');

    	$query = $this -> db -> get();

    	if($query -> num_rows() > 0){
            return $query->result();
    	}
    	else{
            return false;
    	}
    }
    
    function getNotaById($id){
        $this -> db -> select('l.ID_NOTA, m.NAMA, m.ID, m.EMAIL, l.TANGGAL, l.STATUS, l.SHIPPING_FROM, l.SHIPPING_TO, l.TOTAL, l.SHIPPING_FEE');
    	$this -> db -> from('lg_nota as l');
        $this -> db ->join('ms_customer as m','m.ID = l.ID_CUSTOMER');
        $this->db->where('l.ID_NOTA', $id);
    	//$this -> db -> where('rec_status', 'a');

    	$query = $this -> db -> get();

    	if($query -> num_rows() > 0){
            return $query->result();
    	}
    	else{
            return false;
    	}
    }
    
    function get_nota_detail($id){
        $this->db->select('lg_nota_detail.ID_PRODUCT, ms_item.NAMA_ITEM, ms_stock.WARNA, ms_item.HARGA_JUAL, lg_nota_detail.STOCK, lg_nota_detail.SUBTOTAL');
        $this->db->from('lg_nota_detail');
        $this->db->join('ms_stock', 'ms_stock.ID_STOK = lg_nota_detail.ID_PRODUCT');
        $this->db->join('ms_item', 'ms_item.ID_ITEM = ms_stock.ID_ITEM');
        $this->db->where('lg_nota_detail.ID_NOTA', $id);
        return $this->db->get()->result();
    }
    
    function get_nota_det_small($id){
        $this->db->select('ID_PRODUCT, STOCK');
        $this->db->from('lg_nota_detail');
        $this->db->where('ID_NOTA', $id);
        return $this->db->get()->result();
    }

    function delete($array_data, $id) {
        $this->db->where('ID_ITEM', $id);
        $this->db->limit(1);
        $this->db->update('ms_item', $array_data);
    }
    
    function insertPesanan($array_data,$data_json) {
        $this->db->trans_start();
        $this->db->insert('lg_nota', $array_data);
        $insert_id = $this->db->insert_id();
        
        foreach($data_json as $json1){
            $dataArrDet = array("ID_PRODUCT" => $json1['ID_STOK'],
               "STOCK" => $json1['STOCK'],"SUBTOTAL" => $json1['SUBTOTAL'],"ID_NOTA" => $insert_id);
            $this->insertPesananDet($dataArrDet);
            $this->updateStock($json1['ID_STOK'],$json1['HID_STOCK']-$json1['STOCK']);
        }
        
        $this->db->trans_complete();
    }
    
    function updateStock($id_stock,$stock) {
        $array_data = array("STOCK" => $stock);
        $this->db->where('ID_STOK', $id_stock);
        $this->db->limit(1);
        $this->db->update('ms_stock', $array_data);
    }
    
    function insertPesananDet($array_data) {
        $this->db->insert('lg_nota_detail', $array_data);
    }
    
    function updateStatusPesanan($array_data, $id) {
        $this->db->where('ID_NOTA', $id);
        $this->db->limit(1);
        $this->db->update('lg_nota', $array_data);
    }
    
    function updateCancelPesanan($array_data, $id) {
        $this->db->trans_start();
        
        $this->updateStatusPesanan($array_data, $id);
        
        $results = $this->get_nota_det_small($id);
        
        foreach($results as $rslt){
            //$this->updateStock($rslt->ID_PRODUCT,$rslt->STOCK);
            $sql = "UPDATE ms_stock set STOCK = STOCK + ".$rslt->STOCK." where ID_STOK = ".$rslt->ID_PRODUCT;
            $query = $this->db->query($sql);
        }
        
        $this->db->trans_complete();
    }
}

?>
