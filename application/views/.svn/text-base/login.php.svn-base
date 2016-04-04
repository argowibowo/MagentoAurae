<link href="<?php echo base_url();?>assets/Global/css/login.css" rel="stylesheet">
<div class="container jumbotron page-header">
	<form class="form-signin" action="<?php echo base_url();?>index.php/verifylogin" method="post" name="doLogin">
		<h2><Strong><center>Admin Xandershop</center></Strong></h2>
		<p class="form-signin-heading">Sign In</p>
		<?php if(!empty($loginMessage)){ ?>
			<div class="alert alert-danger" role="alert">
        	<strong>Login Gagal!</strong>
        	<?php echo $loginMessage; ?>
			</div>
		<?php } ?>
		<label for="inputEmail" class="sr-only">ID</label>
		<input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
		<button class="btn btn-lg btn-success btn-block" type="submit">Sign In</button>
	</form>
</div>