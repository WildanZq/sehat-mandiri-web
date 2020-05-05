<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Mandiri</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/icon/icon.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <img class="logo absolute" src="<?php echo base_url('assets\icon\logo.svg'); ?>" alt="LOGO">
    <nav class="mobile-nav" id="nav-mobile">
        <div class="nav-mobile-wrapper">
            <a class="mb-3 text-white font-weight-bold" href="<?php echo base_url('perawat'); ?>">Pasien</a>
            <a class="mb-3 text-white font-weight-bold" href="<?php echo base_url('perawat/account'); ?>">
                <?php echo $this->session->userdata('nama'); ?>
            </a>
            <a class="mb-3 text-white font-weight-bold" href="<?php echo base_url('auth/logout'); ?>">Keluar</a>
        </div>
    </nav>
    <nav class="nav">
        <div class="nav-wrapper">
            <div class="d-block d-md-none">
                <button class="btn btn-sm btn-primary shadow nav-mobile-btn" id="nav-btn"><span></span></button>
            </div>
            <div class="d-none d-md-block">
                <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('perawat'); ?>">Pasien</a>
                <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('perawat/account'); ?>">
                    <?php echo $this->session->userdata('nama'); ?>
                </a>
                <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </nav>
    <div class="w-100 px-4 px-md-5 pt-2 pt-md-3 pb-4 overflow-hidden relative">
        <h1 class="display-3 mt-5 pt-5 mb-2 mb-md-3">Tambah Pasien</h1>
        <form class="form-sm" method="POST" action="<?php echo base_url('pasien/createPasien'); ?>">
            <?php
            if ($this->session->flashdata('danger')) {
                echo '<div class="alert alert-danger mt-4" role="alert">'.$this->session->flashdata('danger').'</div>';
            }
            ?>
            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input class="form-control" type="text" name="no_hp" placeholder="08xxxxxxxxxx" id="no_hp" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="******" id="password" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama_pasien" placeholder="Doni" id="nama" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="jk" required>
                    <option value="1">Laki-laki</option>
                    <option value="0">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usia">Usia</label>
                <input class="form-control" type="number" name="usia" placeholder="30" id="usia" required>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-warning shadow" type="submit">Tambah</button>
            </div>
        </form>
    </div>
    <script src="<?php echo base_url('assets/js/nav.js'); ?>"></script>
</body>
</html>