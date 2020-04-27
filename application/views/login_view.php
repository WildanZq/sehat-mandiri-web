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
    <?php echo $this->session->flashdata('danger'); ?>
    <?php echo $this->session->flashdata('success'); ?>
    <a href="perawat/registrasi">Registrasi perawat</a>
    <h1>Login Perawat</h1>
    <form method="POST" action="<?php echo base_url('auth/loginPerawat'); ?>">
    	<input type="text" name="username" placeholder="Username"><br>
    	<input type="password" name="password" placeholder="Password"><br>
    	<input type="submit" value="LOGIN">
    </form>
    <h1>Login Pasien</h1>
    <form method="POST" action="<?php echo base_url('auth/loginPasien'); ?>">
    	<input type="text" name="no_hp" placeholder="No Hp"><br>
    	<input type="password" name="password" placeholder="Password"><br>
    	<input type="submit" value="LOGIN">
    </form>
</body>
</html>