<script src="<?php echo base_url();?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
<link href="<?php echo base_url();?>assets/Global/css/starter.css" rel="stylesheet">
<script language="Javascript">
</script>
<div class="container">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
		        <h1 class="page-header">
				Konfirmasi Pembayaran
	            </h1>
	        </div>
	    </div>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td width="30%"><strong>Nomor Konfirmasi</strong></td>
					<td><?php echo $row[0]->ID_KONFIRMASI ?></td>
				</tr>
				<tr>
					<td><strong>ID Pesanan</strong></td>
					<td>
						<a href="<?php echo site_url('Pesanan_belumlunas');?>/view_pesananbelumlunas/<?php echo $row[0]->ID_NOTA?>"> #
						<?php echo $row[0]->ID_NOTA?>
						</a>
					</td>
				</tr>
				<tr>
					<td><strong>Tanggal</strong></td>
					<td><?php echo $row[0]->TANGGAL ?></td>
				</tr>
				<tr>
					<td><strong>Nama</strong></td>
					<td><?php echo $row[0]->UPDATE_BY ?></td>
				</tr>
				<tr>
					<td><strong>Jumlah</strong></td>
					<td><?php echo $row[0]->JUMLAH?></td>
				</tr>
				<tr>
					<td><strong>Bank</strong></td>
					<td><?php echo $row[0]->BANK?></td>
				</tr>
				<tr>
					<td><strong>Rekening</strong></td>
					<td><?php echo $row[0]->REKENING?></td>
				</tr>
				<tr>
					<td><strong>Status</strong></td>
					<td>
					<?php
					if($row[0]->STATUS=='A'){
						echo 'Approve';
					} else
					if($row[0]->STATUS=='P'){
						echo 'Pending';
					} else
					if($row[0]->STATUS=='R'){
						echo 'Reject';
					}
					?></td>
				</tr>
			</tbody>
		</table>
			<a href="<?php echo site_url('confirmation');?>/doApprove/<?php echo $row[0]->ID_KONFIRMASI?>" class="btn btn-success">Approve</a>
			<a href="<?php echo site_url('confirmation');?>/doApproveAndLunas/<?php echo $row[0]->ID_KONFIRMASI?>" class="btn btn-success">Approve & Lunas</a>
			<a href="<?php echo site_url('confirmation');?>/doReject/<?php echo $row[0]->ID_KONFIRMASI?>" class="btn btn-danger">Reject</a>
			<a href="<?php echo site_url('confirmation');?>" class="btn btn-danger">Back</a>
    </div>
 </div>