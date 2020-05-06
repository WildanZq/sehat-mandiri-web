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
        <h1 class="display-3 mt-5 pt-5 mb-2 mb-md-3"><?php echo $this->session->userdata('nama'); ?></h1>
        <table class="mb-3">
            <tr>
                <td class="font-weight-bold pr-5">Jenis Kelamin</td>
                <td><?php echo $this->session->userdata('jenis_kelamin') == 1 ? 'Laki-laki' : 'Perempuan'; ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold pr-5">Usia</td>
                <td><?php echo $this->session->userdata('usia'); ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold pr-5">Nomor HP</td>
                <td><?php echo $this->session->userdata('no_hp'); ?></td>
            </tr>
        </table>
        <div class="row">
            <form class="col-md-6" method="POST" action="<?php echo base_url('pasien/changePassword'); ?>">
                <h3 class="mb-3">Ganti Password</h3>
                <?php
                if ($this->session->flashdata('danger')) {
                    echo '<div class="alert alert-danger mt-4" role="alert">'.$this->session->flashdata('danger').'</div>';
                }
                ?>
                <?php
                if ($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success mt-4" role="alert">'.$this->session->flashdata('success').'</div>';
                }
                ?>
                <div class="form-group">
                    <label for="password-old">Password Lama</label>
                    <input class="form-control" type="password" name="pass_lama" placeholder="******" id="password-old" required>
                </div>
                <div class="form-group">
                    <label for="password-new">Password Baru</label>
                    <input class="form-control" type="password" name="pass_baru" placeholder="******" id="password-new" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-warning shadow" type="submit">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/nav.js'); ?>"></script>
</body>
</html>