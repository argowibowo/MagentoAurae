<script src="<?php echo base_url();?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/Global/js/Chart.min.js"></script>
<!-- Container -->
<div class="container">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
				Dashboard
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="span3 col-md-4">
				<a href="<?php echo site_url('pesanan_all');?>" class="btn btn-warning btn-block btn-lg"><i class="fa fa-shopping-cart"></i> Pesanan </a>
			</div>
			<div class="span3 col-md-4">
				<a href="<?php echo site_url('customer');?>" class="btn btn-danger btn-block btn-lg"><i class="fa fa-user"></i> Pelanggan </a>
			</div>
			<div class="span3 col-md-4">
				<a href="#" class="btn btn-success btn-block btn-lg"><i class="fa fa-search"></i> Laporan</a>
			</div>
		</div>
	<hr/>
	<div class="row">
		<div class="statistik-wrapper">
			<div class="col-lg-12">
				<h4 class="page-header">Statistik Penjualan </h4>
				<div style="width:100%; margin-bottom: 15px;">
					<div>
						<canvas id="canvas" height="250" width="960"></canvas>
					</div>
				</div>
<script>
var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

var lineChartData = {
	labels : [
	      	"<?php echo $labels[0]; ?>",
  	      	"<?php echo $labels[1]; ?>",
  	      	"<?php echo $labels[2]; ?>",
  	      	"<?php echo $labels[3]; ?>",
   	      	"<?php echo $labels[4]; ?>",
   	      	"<?php echo $labels[5]; ?>",
     		"<?php echo $labels[6]; ?>"
	      	],
	//labels : ["Sun, 08-Feb-2015","Mon, 09-Feb-2015","Tue, 10-Feb-2015","Wed, 11-Feb-2015","Thu, 12-Feb-2015","Fri, 13-Feb-2015","Sat, 14-Feb-2015"],
	datasets : [{
		label: "Statistik Pesanan",
		fillColor : "rgba(151,187,205,0.2)",
		strokeColor : "rgba(151,187,205,1)",
		pointColor : "rgba(151,187,205,1)",
		pointStrokeColor : "#fff",
		pointHighlightFill : "#c00000",
		pointHighlightStroke : "rgba(151,187,205,1)",
// 		data : [22,19,17,22,22,15,6]
		data : [
		      	<?php echo $recordData[0]; ?>,
	  	      	<?php echo $recordData[1]; ?>,
	  	      	<?php echo $recordData[2]; ?>,
	  	      	<?php echo $recordData[3]; ?>,
	   	      	<?php echo $recordData[4]; ?>,
	   	      	<?php echo $recordData[5]; ?>,
	     		<?php echo $recordData[6]; ?>
				]
	}]
}

window.onload = function(){
	var ctx = document.getElementById("canvas").getContext("2d");
	window.myLine = new Chart(ctx).Line(lineChartData, {
	responsive: true
});
}
</script>

</div>
</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Informasi Pesanan</h4>
		<ul id="myTab" class="nav nav-tabs" role="tablist">
			<li class="active"><a href="#pesanan-trakhir" role="tab" data-toggle="tab">Pesanan Terakhir</a></li>
			<li><a href="#stock-table" role="tab" data-toggle="tab">Peringatan Stock</a></li>
		</ul>
<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="pesanan-trakhir">
				<div class="col-lg-12 table-wrapper">
				<table class="table table-bordered table-hover table-striped">
					<thead>
					<tr>
						<th>#</th>
						<th>Customer ID</th>
						<th>Item</th>
						<th>QTY</th>
						<th>Subtotal</th>
					</tr>
					</thead>
					<tbody>
					<?php $loop=0;?>
					 <?php foreach ($latestNota as $nota): ?>
					 <?php $loop++;?>
                		<tr>
                			<td><?php echo $loop;?>
		                    <td><?php echo $nota->id; ?></td>
   		                    <td><?php echo $nota->nama_item; ?></td>
							<td><?php echo $nota->stock; ?></td>
							<td><?php echo intVal($nota->subtotal)*intVal($nota->stock); ?></td>
                		</tr>
                	<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="stock-table">
			<div class="col-lg-12 table-wrapper">
				<table class="table table-bordered table-hover table-striped">
					<thead>
					<tr>
						<th>Item</th>
						<th>Color</th>
						<th>Sisa Stock</th>
					</tr>
					</thead>
					<tbody>
					 <?php foreach ($zeroStock as $stock): ?>
                		<tr>
		                    <td><?php echo $stock->nama_item ?></td>
		                    <td><?php echo $stock->warna ?></td>
		                    <td><?php echo $stock->stock ?></td>
                		</tr>
                	<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>