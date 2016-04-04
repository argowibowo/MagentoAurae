<script src="<?php echo base_url();?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
<link href="<?php echo base_url();?>assets/Global/css/starter.css" rel="stylesheet">
<script language="Javascript">
    function updateStock(){
        var f = document.frmStock;
        var tbl = document.getElementById("tblStock");
        var numRows = tbl.rows.length;
        var jsonString = "[";
        var cnt=0;
        for (var i = 1; i < numRows-1; i++) {
            var cells = tbl.rows[i].getElementsByTagName('td');
            if (f.qty[i-1].value.trim != "" && f.qty[i-1].value != 0){
                var total = 0;
                total = parseInt(f.qty[i-1].value) + parseInt(f.stock[i-1].value);
                if (cnt == 0)
                    jsonString=jsonString+'{"idStok":"'+cells[0].innerHTML+'","qty":"'+total+'"}';
                else
                    jsonString=jsonString+',{"idStok":"'+cells[0].innerHTML+'","qty":"'+total+'"}';
                cnt++;
            }
        }
        jsonString=jsonString+"]";
        f.hid_updVal.value = jsonString;
        f.method = "POST";
        f.action = "<?php echo site_url('stock/doUpdate');?>";
        f.submit();
        f.refresh();
    }
</SCRIPT>
<form name="frmStock">
<div class="container">
    <h1 class="page-header">Stock</h1>
    <div>
        <p><input type="button" onClick="updateStock();" class="btn btn-success" value="Update Stock"></p>
        <table class="table table-bordered table-striped" id="tblStock">
			<thead>
				<tr>
                	<th width="5%">No</th>
					<th>Product</th>
					<th width="20%">Color / Variant</th>
					<th width="10%">Terjual</th>
					<th width="10%">Sisa Stock</th>
					<th width="10%">Tambah Stock</th>
                 	<th style="display: none">Id Item</th>
                 </tr>
             </thead>
             <tbody>
             	<?php foreach ($stocks as $stock): ?>
                <tr>
                    <td id="idStok"><?php echo $stock->ID_STOK ?></td>
                    <td><?php echo $stock->NAMA_ITEM ?></td>
                    <td><?php echo $stock->WARNA ?></td>
                    <td class="terjual"><?php echo $stock->Terjual?></td>
                    <td class="stok"><?php echo $stock->STOCK ?></td>
                    <input type="hidden" name="stock" value="<?php echo $stock->STOCK ?>">
                    <td><input type="number" name="qty" min="1" max="1000"></td>
                    <td style="display: none" id="idItem"><?php echo $stock->ID_ITEM ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
					<th colspan="3">TOTAL</th>
					<th id="totalTerjual"></th>
					<th id="totalStock"></th>
					<th></th>
				</tr>

              </tbody>
		</table>
	</div>
</div>
    <input type="hidden" name="hid_updVal">
</form>

<script language="Javascript">
function calculateStock() {
	var tds = document.getElementById('tblStock').getElementsByTagName('td');
    var sum = 0;
    for(var i = 0; i < tds.length; i ++) {
        if(tds[i].className.localeCompare('stok') == 0) {
            sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
        }
    }
    document.getElementById("totalStock").innerHTML = sum;
}

function calculateTerjual() {
	var tds = document.getElementById('tblStock').getElementsByTagName('td');
    var sum = 0;
    for(var i = 0; i < tds.length; i ++) {
        if(tds[i].className.localeCompare('terjual') == 0) {
            sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
        }
    }
    document.getElementById("totalTerjual").innerHTML = sum;
}

window.onload = function() {
	calculateTerjual();
	calculateStock();
}
// or to execute some function
//window.onload = calculate();
</script>