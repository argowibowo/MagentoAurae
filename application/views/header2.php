<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico">

<title>Xandershop - Admin</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles -->
<link href="<?php echo base_url();?>assets/Global/css/starter.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	  <script src="<?php echo base_url();?>assets/Global/js/html5shiv.min.js"></script>
  	  <script src="<?php echo base_url();?>assets/Global/js/respond.min.js"></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- load css and js -->
    <?php //$css_files;
    	if (empty($css_files)){}
    	else{
    		foreach($css_files as $file): ?>
        	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach;} ?>

</head>
