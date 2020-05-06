<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Mandiri</title>
    <link rel="shortcut icon" href="<?php echo config_item('base_url'); ?>assets/icon/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo config_item('base_url'); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo config_item('base_url'); ?>assets/css/style.css">
</head>
<body>
	<div class="d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
		<img src="<?php echo config_item('base_url'); ?>assets/img/404.svg" alt="404" height="200">
		<h1 class="mt-2"><?php echo $heading; ?></h1>
		<?php echo $message; ?>
		<a class="btn btn-primary" href="<?php echo config_item('base_url'); ?>">Back to Home</a>
	</div>
</body>
</html>