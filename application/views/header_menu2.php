<body>
	<!-- Navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url('home');?>"><span class="glyphicon glyphicon-home"></span> Xander Shop</a>
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				<!-- <li <?php if($menu=='home'){?>class="active"<?php }?>>
						<a href="<?php echo site_url('home');?>">Home</a>
					</li> -->
                    <li class="dropdown<?php if($menu=='pesanan'){?> active<?php }?>">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        Pesanan <span class="caret"></span></a>
        		        <ul class="dropdown-menu" role="menu">
                	        <li><a href="<?php echo site_url('pesanan_all');?>">Pesanan (All) </a></li>
                            <li><a href="<?php echo site_url('pesanan_belumlunas');?>">Pesanan <span class="label label-danger">Belum lunas</span></a></li>
                            <li><a href="<?php echo site_url('pesanan_lunas');?>">Pesanan <span class="label label-success">Lunas</span></a></li>
                    	    <li><a href="<?php echo site_url('add_pesanan');?>">Buat Pesanan Baru </a></li>
                        </ul>
                    </li>
					<li <?php if($menu=='customer'){?>class="active"<?php }?>>
						<a href="<?php echo site_url('customer');?>">
						<i class="glyphicon glyphicon-list"></i>
						Customer</a>
					</li>
					<li <?php if($menu=='category'){?>class="active"<?php }?>>
						<a href="<?php echo site_url('category');?>">
						<i class="glyphicon glyphicon-list"></i>
						Category</a>
					</li>
					<li class="dropdown<?php if($menu=='catalog'){?> active<?php }?>">
              			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-list"></i>
              			Catalog <span class="caret"></span></a>
              				<ul class="dropdown-menu" role="menu">
                				<li class="dropdown-header">Catalog Pre Order</li>
                				<li><a href="<?php echo site_url('catalog_publish_po');?>">Data Produk <span class="label label-success">Publish</span></a></li>
                				<li><a href="<?php echo site_url('catalog_unpublish_po');?>">Data Produk <span class="label label-danger">Unpublish</span></a></li>
                				<li class="divider"></li>
                				<li class="dropdown-header">Catalog Ready Stock</li>
                				<li><a href="<?php echo site_url('catalog_publish_rs');?>">Data Produk <span class="label label-success">Publish</span></a></li>
                				<li><a href="<?php echo site_url('catalog_unpublish_rs');?>">Data Produk <span class="label label-danger">Unpublish</span></a></li>
              				</ul>
            		</li>
                    <li <?php if($menu=='stock'){?>class="active"<?php }?>>
						<a href="<?php echo site_url('stock');?>">
						<i class="glyphicon glyphicon-list"></i>
						Stock</a>
					</li>
					<li <?php if($menu=='confirmation'){?>class="active"<?php }?>>
						<a href="<?php echo site_url('confirmation');?>">
						<i class="glyphicon glyphicon-edit"></i>
						Konfirmasi</a>
					</li>
					<li class="dropdown<?php if($menu=='report'){?> active<?php }?>">
              			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-list"></i>
              			Laporan <span class="caret"></span></a>
              				<ul class="dropdown-menu" role="menu">
                				<li><a href="<?php echo site_url('catalog_publish_po');?>">Laporan Harian </a></li>
                				<li><a href="<?php echo site_url('catalog_unpublish_po');?>">Laporan Bulanan </a></li>
              				</ul>
            		</li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown <?php if($menu=='profile'){?> active<?php }?>">
              			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              				<span class="glyphicon glyphicon-user"></span>&nbsp;Account <span class="caret"></span></a>
              			<ul class="dropdown-menu" role="menu">
                			<li><a href="<?php echo site_url('profile');?>"><span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a></li>
                			<li><a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Pesan</a></li>
                			<li class="divider"></li>
                			<li><a href="<?php echo site_url('home/logout'); ?>"><span class="glyphicon glyphicon-off"></span>&nbsp;Keluar</a></li>
              			</ul>
            		</li>
				</ul>
			</div>
		</div>
	</nav>
