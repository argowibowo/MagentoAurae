<link href="<?php echo base_url();?>assets/Global/css/starter.css" rel="stylesheet">
<script language="Javascript">
    function updateStatusPesanan(){
        var f = document.frmPesananDetail;
        //alert(f.cb_Status.value);
        f.hid_updVal.value = "<?php echo $id?>";
        f.hid_statVal.value = f.cb_Status.value;
        f.method = "POST";
        f.action = "<?php echo site_url('pesanan_belumlunas/updateStatusPesanan');?>";
        f.submit();
        //f.refresh();
    }
</script>
<form name="frmPesananDetail">
<div class="container">
	<!-- Page Heading -->
	<div class="row">
            <div class="col-lg-12">
	    	<h1 class="page-header">Pesanan <small> Detail</small></h1>
	    </div>
	</div>
	<div class="row">
		<div class="col-lg-12">
	    	<div class="insert-box border-bottom">
	        	<div class="col-md-3">
                            <strong>ID PESANAN</strong><br/>
                            <strong>CUSTOMER / PELANGGAN</strong><br/>
                            <strong>EMAIL</strong>
			</div>
			<div class="col-md-3">
				: # <?php echo $notas[0]->ID_NOTA ?><br/>
				: <?php echo $notas[0]->NAMA ?> (<?php echo $notas[0]->ID ?>)<br/>
				: <?php echo $notas[0]->EMAIL ?>
			</div>
			<div class="col-md-3">
				<strong>TANGGAL ORDER </strong><br/>
				<strong>JENIS PESANAN </strong><br/>
				<strong>STATUS PEMBAYARAN </strong><br/>
			</div>
			<div class="col-md-3">
				: <?php echo $notas[0]->TANGGAL ?><br/>
				: <br/>
				: <font color="red"><strong>
                                    <?php if($notas[0]->STATUS == 'B')
                                        echo 'Belum Lunas';
                                          else
                                        echo 'Lunas';?>
                                </strong></font>
			</div>
			<div class="clearfix"></div>
		</div>
	        <div class="insert-box">
                    <div class="well">
			<div class="row">
                            <div class="col-md-3">
                                <select name="cb_Status" class="form-control">
                                    <option value="B" >Belum Lunas</option>
                                    <option> --- </option>
                                    <option value="B" >Belum Lunas</option>
                                    <option value="L">Lunas</option>
				</select>
                            </div>
                            <div class="col-md-3">
                                <input type="button" onClick="updateStatusPesanan()" class="btn btn-success btn-sm" value="Ubah Status">
                            </div>
                            <div class="col-md-6">
                            <p>
                                <a href="" class="btn btn-success btn-sm" ><i class="fa fa-print"></i> PRINT NOTA</a>
				<a href="" class="btn btn-info btn-sm" ><i class="fa fa-print"></i> PRINT DATA EKSPEDISI</a>
				<a href="<?php echo site_url('pesanan_all/updateCancelPesanan/'.$id);?>" class="btn btn-danger btn-sm" ><i class="fa fa-times"></i> CANCEL PESANAN</a>
				<p/>
                            </div>
			</div>
                    </div>
                    <input type="hidden" name="customer_id" value="229" />
                    <h4>PENGIRIMAN (Shipping) <span class="pull-right"><a href="<?php echo site_url('pesanan_belumlunas/view_pesanan_pengiriman/'.$notas[0]->ID_NOTA);?>" class="btn"><strong>Edit Pengiriman</strong></a></span></h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="btn-primary">
                                <th>DARI</th>
                                <th>DIKIRIM KE</th>
                            </tr>
			</thead>
			<tbody>
                            <tr>
                                <td><?php echo $notas[0]->SHIPPING_FROM?></td>
				<td><?php echo $notas[0]->SHIPPING_TO?></td>
                            </tr>
			</tbody>
                    </table>
                    <h4>ITEM PESANAN</h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="btn-primary">
                                <th>#</th>
                                <th width="30%">Item</th>
                                <th width="20%">Deskripsi</th>
                                <th width="20%">Harga</th>
                                <th>QTY</th>
                                <th width="20%">Subtotal</th>
                                <th>Action</th>
                            </tr>
			</thead>
			<tbody>
                            <?php $tot = 0?>
                            <?php $count = 0?>
                            <?php foreach ($details as $detail): ?>
                                <?php $count++?>
                                <?php $tot = $tot + $detail->SUBTOTAL?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $detail->NAMA_ITEM ?></td>
                                    <td><?php echo $detail->WARNA ?></td>
                                    <td>Rp.<?php echo $detail->HARGA_JUAL ?></td>
                                    <td><input type="number" min="1" name="qty" class="form-control" value="<?php echo $detail->STOCK ?>" /></td>
                                    <td>Rp.<?php echo $detail->SUBTOTAL ?></td>
                                    <td><a href="" class="btn-sm btn btn-danger">Cancel</a></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
				<td colspan="4"><a href="#" data-toggle="modal" data-target="#myModal" id="form_add_item"><strong>[+] Tambah Item Pesanan</strong></a></td>
				<td><button type="submit" class="btn btn-info btn-sm" name="update_order">SIMPAN</button></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Ongkos Pengiriman</td>
				<td>Ke <strong>Palembang</strong></td>
				<td>Rp.20.000,00</td>
				<td>0.00 Kgs</td>
				<td>Rp.0,00</td>
				<td></td>
                            </tr>
			</tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="btn-inverse">
                                <th><big>TOTAL</big></th>
				<th width="30%"><big>Rp.<?php echo $tot?></big></th>
				</tr>
				</thead>
                    </table>
                </div>
                </div>
        </div>
</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">Tambahkan Item ke Pesanan <strong>#227</strong></h4>
	      		</div>
	      		<div class="modal-body">
	      			<input type="hidden" name="add_form_order_id" value="227" />
	      			<div class="row">
	      				<div class="col-md-5">
	      		 		Produk <br/>
			        	<select name="add_form_product" id="add_form_product" class="form-control">
			        		<option> - </option>
			        	</select>
	      				</div>
	      				<div class="col-md-5">
	      			 		Variant <br/>
			        		<select name="add_form_variant" id="add_form_variant" class="form-control">
			        			<option> - </option>
			        		</select>
			        		<span id="notif_stock"></span>
	      				</div>
	      				<div class="col-md-2">
	      					QTY <br/>
	      			 		<input type="number" min="1" name="add_form_qty" id="add_form_qty" class="form-control" />
	      				</div>
	      			</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	       	 		<button type="submit" class="btn btn-primary">Tambahkan</button>
	      		</div>
	    </div>
	  </div>
	</div>
    <input type="hidden" name="hid_updVal">
    <input type="hidden" name="hid_statVal">
</form>