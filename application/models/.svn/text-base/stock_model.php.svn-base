<?php

/**
 * Description of category
 *
 * @author admin
 */
class Stock_model extends CI_Model{

	public function __construct() {
		parent::__construct();
	}

	function getDetail($id) {
		$this->db->select('*')->from('ms_item');
		$this->db->where('ID_ITEM', $id);
		return $this->db->get();
	}

    function getAllStock(){
        //$this -> db -> select('s.ID_STOK, i.ID_ITEM, i.NAMA_ITEM, s.WARNA, s.STOCK, i.HARGA_JUAL, i.BERAT');
     	//$this -> db -> from('MS_ITEM as i');
        //$this -> db ->join('MS_STOCK as s','s.ID_ITEM = i.ID_ITEM');
        //$this -> db -> where('i.REC_STATUS_ITEM','A');
     	//$this -> db -> where('rec_status', 'a');

//     	$query = $this -> db -> get();

//     	if($query -> num_rows() > 0){
//             return $query->result();
//     	}
//     	else{
//             return false;
//     	}

    	/*$this -> db ->select('s.ID_STOK, i.ID_ITEM, i.NAMA_ITEM, case when SUM(n.STOCK) is null then 0 else SUM(n.STOCK) end AS "Terjual", s.WARNA, s.STOCK, i.HARGA_JUAL, i.BERAT');
    	$this -> db ->from('ms_item as i');
    	$this -> db ->join('ms_stock as s','s.ID_ITEM = i.ID_ITEM');
    	$this -> db ->join('lg_nota_detail as n','n.ID_PRODUCT = s.ID_STOK','left');
    	$this -> db ->where('i.REC_STATUS_ITEM','A');
    	$this -> db ->group_by('i.NAMA_ITEM');
        $this -> db ->group_by('n.ID_PRODUCT');
        $this -> db ->group_by('s.ID_STOK');*/
    	//$this -> db -> where('rec_status', 'a');
        $sql = "select s.ID_STOK, i.ID_ITEM, i.NAMA_ITEM, case when SUM(n.STOCK) is null then 0 else SUM(n.STOCK) end AS 'Terjual', s.WARNA, s.STOCK, i.HARGA_JUAL, i.BERAT from ms_item as i join ms_stock as s on s.ID_ITEM = i.ID_ITEM left join lg_nota_detail as n on n.ID_PRODUCT = s.ID_STOK where i.REC_STATUS_ITEM = 'A' group by i.NAMA_ITEM,n.ID_PRODUCT,s.ID_STOK";
        //$this->db->query($sql);

    	//$query = $this -> db -> get();
        $query = $this->db->query($sql);

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

    function updateStock($array_data, $id) {
        $this->db->where('ID_STOK', $id);
        $this->db->limit(1);
        $this->db->update('ms_stock', $array_data);
    }
}

?>
