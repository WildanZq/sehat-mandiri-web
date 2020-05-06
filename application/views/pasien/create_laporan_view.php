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
            <a class="mb-3 text-white font-weight-bold" href="<?php echo base_url('pasien'); ?>">Beranda</a>
            <a class="mb-3 text-white font-weight-bold" href="<?php echo base_url('pasien/account'); ?>">
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
                <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('pasien'); ?>">Beranda</a>
                <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('pasien/account'); ?>">
                    <?php echo $this->session->userdata('nama'); ?>
                </a>
                <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </nav>
    <div class="w-100 px-4 px-md-5 pt-2 pt-md-3 pb-4 overflow-hidden relative">
        <h1 class="display-3 mt-5 pt-5 mb-2 mb-md-3">Tambah Laporan</h1>
        <div class="row">
            <form class="col-12" method="POST" action="<?php echo base_url('laporan/createLaporan'); ?>">
                <?php
                if ($this->session->flashdata('danger')) {
                    echo '<div class="alert alert-danger mt-4" role="alert">'.$this->session->flashdata('danger').'</div>';
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="suhu">Suhu Tubuh</label>
                            <div class="input-group mb-3">
                                <input type="number" name="suhu" id="suhu" class="form-control" placeholder="26" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">°C</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="demam">Apakah Anda Demam</label>
                            <select class="form-control" name="demam" id="demam" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="batuk">Apakah Anda Batuk Pilek</label>
                            <select class="form-control" name="batuk" id="batuk" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sesak">Apakah Anda Sesak Nafas</label>
                            <select class="form-control" name="sesak" id="sesak" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tenggorokan">Apakah Anda Sakit Tenggorokan</label>
                            <select class="form-control" name="tenggorokan" id="tenggorokan" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keluhan">Keluhan Lainnya</label>
                            <input class="form-control" type="text" name="keluhan" placeholder="Keluhan" id="keluhan">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-warning shadow" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/nav.js'); ?>"></script>
</body>
</html>