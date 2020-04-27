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

    <form method="POST" action="<?php echo site_url('auth/login_perawat'); ?>">
    	<?php echo $this->session->flashdata('danger'); ?>
    	<input type="text" name="username"><br>
    	<input type="password" name="password"><br>
    	<input type="submit" value="LOGIN">
    </form>
</body>
</html>