<link href="<?php echo base_url();?>assets/Global/css/starter.css" rel="stylesheet">
<script language="Javascript">
    function checkShippingFee(chk){
        var f = document.frmPengiriman;
        if (f.shipping_manual.checked)
            f.shipping_fee.readOnly = false;
        else{
            f.shipping_fee.readOnly = true;
            f.shipping_fee.value = 0;
        }
    }
    
    function updatePengiriman(){
        var f = document.frmPengiriman;
        
        f.method = "POST";
        f.action = "<?php echo site_url('pesanan_belumlunas/doUpdatePesanan');?>";
        f.submit();
        f.refresh();
    }
    
    function calcTotal(){
        var f = document.frmPengiriman;
        f.total_after.value = parseInt(f.shipping_fee.value) + parseInt(f.subtotal_before.value);
    }
</script>
<form name="frmPengiriman">
<div class="container">
    <div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">
	               Edit Pengiriman Pesanan - <small>Dropship Detail</small>
	            </h1>
	        </div>
	    </div>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td><strong>No ID Pesanan</strong></td>
					<td><input type="hidden" name="hid_idnota" id="hid_idnota" value="<?php echo $notas[0]->ID_NOTA ?>"/><?php echo $notas[0]->ID_NOTA ?></td>
				</tr>
				<tr>
					<td><strong>Customer </strong></td>
					<td><?php echo $notas[0]->NAMA ?> (<?php echo $notas[0]->ID ?>)</td>
				</tr>
				<tr>
					<td><strong>Dikirim Dari</strong></td>
					<td>
					<span id="notif_from"><font color="red">Wajib diisi*</font></span><br/>
					<textarea name="shipping_from" class="form-control"><?php echo $notas[0]->SHIPPING_FROM?></textarea></td>
				</tr>
				<tr>
					<td><strong>Kepada</strong></td>
					<td>
					<span id="notif_to"><font color="red">Wajib diisi*</font></span><br/>
					<textarea name="shipping_to" class="form-control"><?php echo $notas[0]->SHIPPING_TO?></textarea></td>
				</tr>
				<tr>
					<td><strong>Provinsi</strong></td>
					<td>
					<span id="notif_provinsi"><font color="red">Wajib diisi*</font></span><br/>
					<select name="prov_id" class="form-control" id="prov_id">
						<option value="6" >DKI Jakarta</option>
						<option value="">- Pilih Provinsi -</option>
						<option value="1">Aceh</option>
						<option value="2">Bali</option>
						<option value="3">Banten</option>
						<option value="4">Bengkulu</option>
						<option value="5">Daerah Istimewa Yogyakarta</option>
						<option value="6">DKI Jakarta</option>
						<option value="7">Gorontalo</option>
						<option value="8">Jambi</option>
						<option value="9">Jawa Barat</option>
						<option value="10">Jawa Tengah</option>
						<option value="11">Jawa Timur</option>
						<option value="12">Kalimantan Barat</option>
						<option value="13">Kalimantan Selatan</option>
						<option value="14">Kalimantan Tengah</option>
						<option value="15">Kalimantan Timur</option>
						<option value="16">Kalimantan Utara</option>
						<option value="17">Kepulauan Bangka Belitung</option>
						<option value="18">Kepulauan Riau</option>
						<option value="19">Lampung</option>
						<option value="20">Maluku</option>
						<option value="21">Maluku Utara</option>
						<option value="22">Nusa Tenggara Barat</option>
						<option value="23">Nusa Tenggara Timur</option>
						<option value="24">Papua</option>
						<option value="25">Papua Barat</option>
						<option value="26">Riau</option>
						<option value="27">Sulawesi Barat</option>
						<option value="28">Sulawesi Selatan</option>
						<option value="29">Sulawesi Tengah</option>
						<option value="30">Sulawesi Tenggara</option>
						<option value="31">Sulawesi Utara</option>
						<option value="32">Sumatera Barat</option>
						<option value="33">Sumatera Selatan</option>
						<option value="34">Sumatera Utara</option>
				</select>
				</td>
				</tr>
				<tr>
					<td><strong>Kota</strong></td>
					<td>
					<span id="notif_kota"></span><br/>
					<select name="kota_id" class="form-control" id="kota_id">
						<option value="94" >Jakarta Barat</option>
						<option value="">- Pilih Kota -</option>
					</select>
					</td>
				</tr>
				<tr>
					<td><strong>Total Belanja</strong><span class="pull-right">Rp. </span></td>
					<td><input type="hidden" name="subtotal_before" id="subtotal_before" value="<?php echo $notas[0]->TOTAL ?>"/><?php echo $notas[0]->TOTAL ?></td>
				</tr>
				<tr>
					<td><strong>Total Berat</strong></td>
					<td><input type="hidden" name="shipping_weight" id="shipping_weight" value="0.00 "/>0.00 Kg ---> Ongkir <strong>0 Kg</strong></td>
				</tr>
				<tr>
					<td><strong>Total Ongkos Kirim</strong><span class="pull-right">Rp. </span></td>
                                        <td>
                                            <?php if($notas[0]->SHIPPING_FEE != 0):?>
                                            <label><input checked="true" type="checkbox" name="shipping_manual" id="shipping_manual" onclick="checkShippingFee(this);calcTotal()"/> Ongkos kirim manual </label>
                                                <input type="number" name="shipping_fee" onblur="calcTotal()" id="shipping_fee" class="form-control" value="<?php echo $notas[0]->SHIPPING_FEE?>"/></td>
                                            <?php else:?>
                                                <label><input  type="checkbox" name="shipping_manual" id="shipping_manual" onclick="checkShippingFee(this);calcTotal()"/> Ongkos kirim manual </label>
                                                <input type="number" name="shipping_fee" onblur="calcTotal()" id="shipping_fee" class="form-control" value="<?php echo $notas[0]->SHIPPING_FEE?>" readonly /></td>
                                            <?php endif;?>
				</tr>
				<tr>
					<td><strong>Total Pembayaran</strong><span class="pull-right">Rp. </span></td>
                                        <td><input type="text" name="total_after" id="total_after" class="form-control input-lg" value="" readonly /></td>
				</tr>
			</tbody>
		</table>
                <input type="button" onClick="updatePengiriman()" class="btn btn-success" value="Simpan Pesanan">
		<br/>
    </div>
 </div>
</form>
<script language="Javascript">
    window.onload = calcTotal();
</script>