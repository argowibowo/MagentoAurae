<script src="<?php echo base_url();?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
<link href="<?php echo base_url();?>assets/Global/css/starter.css" rel="stylesheet">
<script language="Javascript">
    function addPesanan(){
        var f = document.frmPesanan;
        var cbVarian = document.getElementsByName("cbVar");
        var numRows = cbVarian.length;

        //add status
        if(f.optSts[0].checked){
            f.hid_statVal.value = f.optSts[0].value;
        }
        else if(f.optSts[1].checked){
            f.hid_statVal.value = f.optSts[1].value;
        }
        else if(f.optSts[2].checked){
            f.hid_statVal.value = f.optSts[2].value;
        }
        else if(f.optSts[3].checked){
            f.hid_statVal.value = f.optSts[3].value;
        }

        //get stock
        var jsonString = "[";
        var cnt=0;
        for (var i = 1; i < numRows; i++) {
            if (f.qty[i-1].value.trim != "" && f.qty[i-1].value != 0){
                if (cnt == 0)
                    jsonString=jsonString+'{"ID_STOK":"'+f.cbVar[i-1].value+'","HID_STOCK":"'+f.hid_qty[i-1].value+'","STOCK":"'+f.qty[i-1].value+'","SUBTOTAL":"'+f.subtotal[i-1].value+'"}';
                else
                    jsonString=jsonString+',{"ID_STOK":"'+f.cbVar[i-1].value+'","HID_STOCK":"'+f.hid_qty[i-1].value+'","STOCK":"'+f.qty[i-1].value+'","SUBTOTAL":"'+f.subtotal[i-1].value+'"}';
                cnt++;
            }
        }
        jsonString=jsonString+"]";
        f.hid_updVal.value = jsonString;
        f.method = "POST";
        f.action = "<?php echo site_url('add_pesanan/doInsertPesanan');?>";
        f.submit();
        f.refresh();
    }

    function getVarian(e){
        var f = document.frmPesanan;
        var cbVar = document.getElementsByName("cbVar");
        var cbPrdk = document.getElementsByName("cbPrdk");
        //get the index of object
        var lgth = cbPrdk.length;
        var idx = 0;
        for(j=0;j<lgth;j++){
            if(cbPrdk[j] == e){
                idx = j;
                break;
            }
        }

        //clear option first
        lgth = cbVar[idx].options.length;
        for(i=0;i<lgth;i++){
            cbVar[idx].options[i] = null;
        }
        cbVar[idx].options[0] = null;
        //then add the option ti the select option
        <?php foreach ($varians as $varian): ?>
            if(e.value == "<?php echo $varian->ID_ITEM?>"){
                var option = document.createElement("option");
                option.text = "<?php echo $varian->WARNA?> ("+"<?php echo $varian->STOCK?>)";
                option.value = "<?php echo $varian->ID_STOK?>";
                cbVar[idx].add(option);
            }
        <?php endforeach; ?>
    }
    function calcSubTotal(e){
        var f = document.frmPesanan;
        //get the index of object
        var lgth = f.qty.length;
        var idx = 0;
        for(j=0;j<lgth;j++){
            if(f.qty[j] == e){
                idx = j;
                break;
            }
        }

        //then calculate
        var cnt = 0;
        <?php foreach ($varians as $varian): ?>
            if(f.cbPrdk[idx].value == "<?php echo $varian->ID_ITEM?>" && cnt == 0){
                f.subtotal[idx].value = f.qty[idx].value * <?php echo $varian->HARGA_JUAL?>;
                f.berat[idx].value = f.qty[idx].value * <?php echo $varian->BERAT?>;
                cnt++;
            }
        <?php endforeach; ?>
    }
    function checkStock(e){
        var f = document.frmPesanan;
        //get the index of object
        var lgth = f.qty.length;
        var idx = 0;
        for(j=0;j<lgth;j++){
            if(f.qty[j] == e){
                idx = j;
                break;
            }
        }

        //then calculate
        <?php foreach ($varians as $varian): ?>
            if(f.cbVar[idx].value == "<?php echo $varian->ID_STOK?>"){
                if(e.value > <?php echo $varian->STOCK?>)
                {
                    alert("Stock tidak cukup untuk "+e.value+" pesanan");
                    f.qty[idx].focus();
                }
                f.hid_qty[idx].value = <?php echo $varian->STOCK?>;
            }
        <?php endforeach; ?>
    }
    function cekDaftarBrg(e){
        var f = document.frmPesanan;
        var lgth = f.qty.length;

        for(j=0;j<lgth;j++){
            if(f.cbVar[j].value != 0 && f.cbVar[j].value == e.value && f.cbVar[j] != e){
                //alert("Barang \""+cbProduk[j].options[cbProduk[j].selectedIndex].text+"\" varian \""+cbVarian[j].options[cbVarian[j].selectedIndex].text+"\" sudah ada dalam daftar pesanan");
                alert("Barang \""+f.cbPrdk[j].options[f.cbPrdk[j].selectedIndex].text+"\" varian \""+f.cbVar[j].options[f.cbVar[j].selectedIndex].text+"\" sudah ada dalam daftar pesanan");
                e.focus();
                break;
            }
        }
    }
</SCRIPT>
<form name="frmPesanan">
<div class="container">
    <h1 class="page-header">Buat Pesanan</h1>
    <div>
        <p>Customer</p>
        <table class="table table-bordered table-striped" id="tblCust">
            <tr>
                <td>
                    <select style="width: 100%" name="cb_custName">
                    <?php foreach ($custs as $cust): ?>
                        <option value="<?php echo $cust->ID?>"><?php echo $cust->NAMA?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
            </tr>
	</table>
	</div>
    <div>
        <p>Item Pesanan</p>
        <table class="table table-bordered table-striped" id="tblItem">
            <thead>
		<tr>
                    <th width="1%"></th>
                    <th width="30%">Produk Item</th>
                    <th width="15%">Varian</th>
                    <th width="15%">Qty</th>
                    <th width="15%">Berat</th>
                    <th width="15%">Subtotal</th>
                 </tr>
            </thead>
             <tbody>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="opt" value="1"></td>
                    <td>
                        <select name="cbPrdk" style="width: 100%" onchange="getVarian(this)">
                            <option value=""></option>
                        <?php foreach ($prdks as $prdk): ?>
                            <option value="<?php echo $prdk->ID_ITEM?>"><?php echo $prdk->NAMA_ITEM?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%" name="cbVar" onchange="cekDaftarBrg(this)">
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" onchange="calcSubTotal(this);checkStock(this)">
                        <input type="hidden" name="hid_qty">
                    </td>
                    <td><input readonly="true" type="text" name="berat"></input></td>
                    <td><input readonly="true" type="text" name="subtotal"></input></td>
                </tr>
              </tbody>
	</table>
    </div>
    <div>
        <p>Status Pesanan</p>
        <table class="table table-bordered table-striped" id="tblItem">
             <tbody>
                <tr>
                    <td><input type="radio" name="optSts" value="K"> Pesanan Dalam Proses (Keep) <br> Pesanan barang tersimpan di List Pesanan Dalam Proses </td>
                    <td><input type="radio" name="optSts" value="B"> Pesanan Dropship (Belum Lunas) <br> Pesanan telah memiliki Nota / ID Pesanan, dengan metode Pengiriman Alamat, namun Belum Lunas </td>
                </tr>
                <tr>
                    <td><input type="radio" name="optSts" value="L"> Pesanan Bayar Ditempat (Lunas) <br> Pesanan telah memiliki Nota / ID Pesanan dan Lunas </td>
                    <td><input type="radio" name="optSts" value="D"> Pesanan Dropship (Lunas) <br> Pesanan telah memiliki Nota / ID Pesanan, dengan metode Pengiriman Alamat, dan telah Lunas </td>
                </tr>
              </tbody>
	</table>
    </div>
    <div>
        <p><input type="button" onClick="addPesanan();" class="btn btn-success" value="Buat Pesanan"></p>
    </div>
</div>
    <input type="hidden" name="hid_updVal">
    <input type="hidden" name="hid_statVal">
</form>