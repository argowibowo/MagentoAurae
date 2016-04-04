<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Catalog_publish_po extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->library('grocery_CRUD');
   $this->load->model('catalog_publish_po_model');
 }

 function index(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $crud = new grocery_CRUD();
     $crud->set_theme('datatables');

     $crud->where('REC_STATUS_ITEM','A');
     $crud->set_table('ms_item');

     $crud->columns('NAMA_ITEM','ID_CATEGORY','HARGA_JUAL','FOTO');

     $crud->display_as('ID_CATEGORY','Category');
     $crud->display_as('NAMA_ITEM','Nama Item');
     $crud->display_as('HARGA_AWAL','Harga Modal');
     $crud->display_as('HARGA_JUAL','Harga Jual');
     $crud->display_as('BERAT','Berat');
     $crud->display_as('KETERANGAN','Deskripsi');
     $crud->display_as('MIN_ORDER','Minimal Order');
     $crud->display_as('FOTO','Image');

     $crud->fields('NAMA_ITEM','ID_CATEGORY','HARGA_AWAL','HARGA_JUAL','BERAT','KETERANGAN','MIN_ORDER','FOTO','REC_STATUS_ITEM','PUBLISH_STATUS','variant');
     $crud->required_fields('NAMA_ITEM','ID_CATEGORY','HARGA_AWAL','HARGA_JUAL','BERAT','MIN_ORDER','FOTO');
     // biar yg muncul di drop down list yg tipenya ready stock
     // dan buat join table
     $crud->set_relation('ID_CATEGORY','ms_category','NAMA',array('TIPE' => 'PO'));
     // supaya yg muncul di search awal tabel foreign dengan kondisi
     $crud->where('TIPE','PO');
     $crud->where('REC_STATUS','A');
     $crud->where('PUBLISH_STATUS','P');

     $crud->set_subject('Produk');

     if ($crud->getState() == 'edit' || $crud->getState() == 'add'||$crud->getState() == 'list') {
     	$crud->field_type('REC_STATUS_ITEM', 'hidden');
     	$crud->field_type('PUBLISH_STATUS', 'hidden');
     	$crud->field_type('REC_STATUS', 'hidden');
     }

     $crud->unset_texteditor('KETERANGAN','full_text');
     $crud->change_field_type('KETERANGAN', 'text');

     $crud->field_type('HARGA_AWAL', 'integer');
     $crud->field_type('HARGA_JUAL', 'integer');
     $crud->field_type('BERAT', 'integer');
     $crud->field_type('MIN_ORDER', 'integer');

     $crud->add_action('Delete', '', 'catalog_publish_po/doDelete','ui-icon-circle-minus');
     $crud->unset_delete();
     $crud->unset_read();

     $crud->add_action('Unpublish', '', 'catalog_publish_po/doUnpublish','ui-icon-circle-minus');

     $crud->add_action('Order', '', 'catalog_publish_po/doDelete','ui-icon-cart');

     $crud->callback_before_insert(array($this,'doBeforeInsert'));

     $crud->set_field_upload('FOTO','assets/uploads/files');


     $crud->callback_add_field('variant', array($this,'doInsertVariant'));
     $crud->callback_edit_field('variant', array($this,'doBeforeUpdate'));
     // buat insert/update stock
     $crud->callback_after_insert(array($this,'insertStockAfterInsert'));
     $crud->callback_after_update(array($this,'insertStockAfterUpdate'));
     $crud->callback_before_update(array($this,'doBeforeUpdate'));

     $data = $crud->render();

     $data->menu = 'catalog';

     $this->load->view('header2', $data);
     $this->load->view('header_menu2', $data);
     $this->load->view('catalog_publish_po_view', $data);
     $this->load->view('footer', $data);
   }
   else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function insertStockAfterInsert($post_array,$primary_key){
 	$varian1="";
 	$varian2="";
 	$varian3="";
 	$varian4="";
 	$varian5="";
 	$varian6="";
 	$varian7="";
 	$varian8="";
 	$varian9="";
 	$varian10="";

 	$stok1="";
 	$stok2="";
 	$stok3="";
 	$stok4="";
 	$stok5="";
 	$stok6="";
 	$stok7="";
 	$stok8="";
 	$stok9="";
 	$stok10="";

	$loop = 0;
 	$stocks = $this->input->post('stock');
 	foreach ($stocks as $stock){
		if($loop==0){
			$stok1 = $stock;
		}
		if($loop==1){
			$stok2 = $stock;
		}
		if($loop==2){
			$stok3 = $stock;
		}
		if($loop==3){
			$stok4 = $stock;
		}
		if($loop==4){
			$stok5 = $stock;
		}
		if($loop==5){
			$stok6 = $stock;
		}
		if($loop==6){
			$stok7 = $stock;
		}
		if($loop==7){
			$stok8 = $stock;
		}
		if($loop==8){
			$stok9 = $stock;
		}
		if($loop==9){
			$stok10 = $stock;
		}
		$loop++;
 	}

	$loop = 0;
 	$variantNames = $this->input->post('variant_name');
 	foreach ($variantNames as $variantName){
		if($loop==0){
			$varian1 = $variantName;
		}
		if($loop==1){
			$varian2 = $variantName;
		}
		if($loop==2){
			$varian3 = $variantName;
		}
		if($loop==3){
			$varian4 = $variantName;
		}
		if($loop==4){
			$variant5 = $variantName;
		}
		if($loop==5){
			$varian6 = $variantName;
		}
		if($loop==6){
			$varian7 = $variantName;
		}
		if($loop==7){
			$varian8 = $variantName;
		}
		if($loop==8){
			$varian9 = $variantName;
		}
		if($loop==9){
			$varian10 = $variantName;
		}
		$loop++;
 	}

 	// stok 1
 	if(!empty($stok1) && !empty($varian1)){
		$data = array(
				'ID_ITEM' => $primary_key,
				'WARNA' => $varian1,
				'STOCK' => $stok1
		);
		$this->db->insert('ms_stock', $data);
 	}

 	// stok 2
 	if(!empty($stok2) && !empty($varian2)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian2,
 				'STOCK' => $stok2
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 3
 	if(!empty($stok3) && !empty($varian3)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian3,
 				'STOCK' => $stok3
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 4
 	if(!empty($stok4) && !empty($varian4)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian4,
 				'STOCK' => $stok4
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 5
 	if(!empty($stok5) && !empty($varian5)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian5,
 				'STOCK' => $stok5
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 6
 	if(!empty($stok6) && !empty($varian6)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian6,
 				'STOCK' => $stok6
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 7
 	if(!empty($stok7) && !empty($varian7)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian7,
 				'STOCK' => $stok7
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 8
 	if(!empty($stok8) && !empty($varian8)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian8,
 				'STOCK' => $stok8
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 9
 	if(!empty($stok9) && !empty($varian9)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian9,
 				'STOCK' => $stok9
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 10
 	if(!empty($stok10) && !empty($varian10)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian10,
 				'STOCK' => $stok10
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 }

 function insertStockAfterUpdate($post_array,$primary_key){

	// delete insert
 	$this->db->where('ID_ITEM', $primary_key);
 	$this->db->delete('ms_stock');

 	$varian1="";
 	$varian2="";
 	$varian3="";
 	$varian4="";
 	$varian5="";
 	$varian6="";
 	$varian7="";
 	$varian8="";
 	$varian9="";
 	$varian10="";

 	$stok1="";
 	$stok2="";
 	$stok3="";
 	$stok4="";
 	$stok5="";
 	$stok6="";
 	$stok7="";
 	$stok8="";
 	$stok9="";
 	$stok10="";

 	$loop = 0;
 	$stocks = $this->input->post('stock');
 	foreach ($stocks as $stock){
 		if($loop==0){
 			$stok1 = $stock;
 		}
 		if($loop==1){
 			$stok2 = $stock;
 		}
 		if($loop==2){
 			$stok3 = $stock;
 		}
 		if($loop==3){
 			$stok4 = $stock;
 		}
 		if($loop==4){
 			$stok5 = $stock;
 		}
 		if($loop==5){
 			$stok6 = $stock;
 		}
 		if($loop==6){
 			$stok7 = $stock;
 		}
 		if($loop==7){
 			$stok8 = $stock;
 		}
 		if($loop==8){
 			$stok9 = $stock;
 		}
 		if($loop==9){
 			$stok10 = $stock;
 		}
 		$loop++;
 	}

 	$loop = 0;
 	$variantNames = $this->input->post('variant_name');
 	foreach ($variantNames as $variantName){
 		if($loop==0){
 			$varian1 = $variantName;
 		}
 		if($loop==1){
 			$varian2 = $variantName;
 		}
 		if($loop==2){
 			$varian3 = $variantName;
 		}
 		if($loop==3){
 			$varian4 = $variantName;
 		}
 		if($loop==4){
 			$variant5 = $variantName;
 		}
 		if($loop==5){
 			$varian6 = $variantName;
 		}
 		if($loop==6){
 			$varian7 = $variantName;
 		}
 		if($loop==7){
 			$varian8 = $variantName;
 		}
 		if($loop==8){
 			$varian9 = $variantName;
 		}
 		if($loop==9){
 			$varian10 = $variantName;
 		}
 		$loop++;
 	}

 	// stok 1
 	if(!empty($stok1) && !empty($varian1)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian1,
 				'STOCK' => $stok1
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 2
 	if(!empty($stok2) && !empty($varian2)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian2,
 				'STOCK' => $stok2
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 3
 	if(!empty($stok3) && !empty($varian3)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian3,
 				'STOCK' => $stok3
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 4
 	if(!empty($stok4) && !empty($varian4)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian4,
 				'STOCK' => $stok4
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 5
 	if(!empty($stok5) && !empty($varian5)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian5,
 				'STOCK' => $stok5
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 6
 	if(!empty($stok6) && !empty($varian6)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian6,
 				'STOCK' => $stok6
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 7
 	if(!empty($stok7) && !empty($varian7)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian7,
 				'STOCK' => $stok7
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 8
 	if(!empty($stok8) && !empty($varian8)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian8,
 				'STOCK' => $stok8
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 9
 	if(!empty($stok9) && !empty($varian9)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian9,
 				'STOCK' => $stok9
 		);
 		$this->db->insert('ms_stock', $data);
 	}

 	// stok 10
 	if(!empty($stok10) && !empty($varian10)){
 		$data = array(
 				'ID_ITEM' => $primary_key,
 				'WARNA' => $varian10,
 				'STOCK' => $stok10
 		);
 		$this->db->insert('ms_stock', $data);
 	}
 }

 function doBeforeInsert($post_array){
 	$post_array['REC_STATUS_ITEM'] = 'A';
 	$post_array['PUBLISH_STATUS'] = 'P';
 	return $post_array;
 }

 function doBeforeUpdate($post_array,$primary_key){
 	$value = "";
 	$this->db->select("*");
 	$this->db->where('ID_ITEM =', $primary_key);
 	$query = $this->db->get('ms_stock');

 	$value .= '<div class="well">
				<table cellpadding="10px" width="500px">
					<thead>
						<tr>
							<th>Check !</th>
							<th>Variant</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody>';
 	$loop = 0;
 	if ($query->num_rows() > 0){
 		foreach ($query->result() as $row){
 			$value.= '<tr>';
 			$value.='	<td><input type="checkbox" class="form-control"  name="check_variant[]"/></td>';
 			$value.='	<td><input type="text" style="width:200px;" class="form-control" name="variant_name[]" value="';
 			$value.= $row->WARNA;
 			$value.= '"/></td>';
 			$value.= '	<td><input type="number" style="width:150px;"class="form-control" name="stock[]" min="0" value="';
 			$value.= $row->STOCK;
 			$value.= '"/></td>';
 			$value.= '<tr/>';
 			$loop++;
 		}
 	}

 	for($x=0;$x<10-$loop;$x++){
 		$value.= '<tr>';
 		$value.='	<td><input type="checkbox" class="form-control"  name="check_variant[]"/></td>';
 		$value.='	<td><input type="text" style="width:200px;" class="form-control" name="variant_name[]"/></td>';
 		$value.= '	<td><input type="number" style="width:150px;"class="form-control" name="stock[]" min="0"/></td>';
 		$value.= '<tr/>';
 	}

 	$value.= '						</tbody>
    			</table>
    		</div>
    	</div>
		<div class="clear"></div>';
 	return $value;
 }

 function doDelete($id){
   $dataArr = array("REC_STATUS_ITEM" => 'N');
   $this->catalog_publish_po_model->delete($dataArr, $id);
   redirect("catalog_publish_po");
 }

function doInsertVariant(){
    return '<div class="well">
				<table cellpadding="10px" width="500px">
					<thead>
						<tr>
							<th>Check !</th>
							<th>Variant</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody>
    					<tr>
							<td><input type="checkbox" class="form-control"  name="check_variant[]"/></td>
							<td><input type="text" style="width:200px;" class="form-control" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;"class="form-control" name="stock[]" min="0"/></td>
						</tr>
    					<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="0"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_0" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_0" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="1"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_1" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_1" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="2"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_2" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_2" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="3"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_3" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_3" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="4"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_4" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_4" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="5"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_5" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_5" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="6"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_6" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_6" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="7"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_7" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_7" name="stock[]" min="0"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" class="form-control check_list" name="check_variant[]" onclick="check_variant()" value="8"/></td>
							<td><input type="text" style="width:200px;" class="form-control" id="variant_name_8" name="variant_name[]" /></td>
							<td><input type="number" style="width:150px;" class="form-control" id="stock_8" name="stock[]" min="0"/></td>
						</tr>
						</tbody>
    			</table>
    		</div>
    	</div>
		<div class="clear"></div>';
}
 // buat publish/unpublish
 function doUnpublish($id){
 	$dataArr = array("PUBLISH_STATUS" => 'U');
 	$this->catalog_publish_po_model->update2Unpublish($dataArr, $id);
 	redirect("catalog_publish_po");
 }
}
?>