<script src="<?php echo base_url();?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
<link href="<?php echo base_url();?>assets/Global/css/starter.css" rel="stylesheet">
<div class="container">
	<div class="container-fluid">
		<div class="row">
        	<div class="col-lg-12">
            	<h1 class="page-header">
                	Settings <small> Edit profile</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#general_settings" data-toggle="tab"><b>Update profile</b></a></li>
	            </ul>
				<form name="form" action="<?php echo site_url('profile/doUpdate');?>" method="post" accept-charset="utf-8">
		            <div id="myTabContent" class="tab-content" >
						<div class="tab-pane fade active in" id="general_settings">
							<div class="form-horizontal">
								<p>
								<?php if(!empty($message)){ ?>
									<div class="alert alert-success" role="alert">
							       	<strong>Update Success!</strong>
							       	<?php echo $message; ?>
									</div>
								<?php } ?>
								</p>
								<div class="control-group">
									<label class="control-label" for="user_name">Email</label>
									<div class="controls">
										<input type="text" class="col-lg-8" id="user_email"  placeholder="user_email" name="email" value="<?php echo $adminData[0]->EMAIL;?>">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="user_email">Username</label>
									<div class="controls">
										<input type="text" class="col-lg-8" id="user_name" placeholder="Nama" name="name" value="<?php echo $adminData[0]->NAMA;?>" />
									</div>
									<div class="clearfix"></div>
								</div>
								<h4>Set new password</h4>
								<div class="control-group">
									<label class="control-label" for="user_pass">Password</label>
									<div class="controls">
										<input type="password" class="col-lg-8" id="user_pass" placeholder="password" name="password"/>
									<br/><br/>
									<small>Empty if you not change password</small>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
		            </div>
				<button type="submit" name="update_settings" class="btn btn-success">Update Settings</button>
				</form>
			</div>
        </div>
        <!-- /.row -->
	</div>
</div>