<!--v1.1 Argo Wibowo Init Version-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Drop-down menu</title>
    <link href="<?php echo base_url();?>assets/css/style2.css" rel="stylesheet" type="text/css" />
    <?php 
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>

        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</head>