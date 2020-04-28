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
    <form method="POST" action="<?php echo base_url('pasien/createPasien'); ?>">
        <?php echo $this->session->flashdata('danger'); ?>
        <input type="text" name="no_hp" placeholder="No Hp"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="text" name="nama_pasien" placeholder="Nama"><br>
        <input type="text" name="jenis_kelamin" placeholder="Jenis kelamin"><br>
        <input type="text" name="usia" placeholder="Usia" ><br>
        <input type="submit" value="DAFTAR">
    </form>
</body>
</html>