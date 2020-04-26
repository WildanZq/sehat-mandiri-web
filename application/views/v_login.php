<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Mandiri</title>
</head>
<body>
    login
    <form action="<?= base_url('auth'); ?>" method="post">
    	id
    	<input type="text" name="id">
    	password
    	<input type="text" name="password">
    	<input type="submit" name="klik">
    </form>	
</body>
</html>