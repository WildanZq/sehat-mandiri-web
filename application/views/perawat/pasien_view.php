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
    <a href="<?php echo base_url('perawat'); ?>">Home</a>
    <h1>Daftar Pasien</h1>
    <p>getPasienByIdPerawat</p>
    <?php print_r($pasien); ?>
    <a href="detailPasien?id=1">Detail pasien</a>
</body>
</html>