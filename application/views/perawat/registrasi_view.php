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
    <nav class="nav">
        <div class="nav-wrapper">
            <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('auth'); ?>">Login</a>
        </div>
    </nav>
    <div class="w-100 px-4 px-md-5 pt-2 pt-md-3 pb-4 overflow-hidden relative">
        <h1 class="display-3 mt-5 pt-5 mb-2 mb-md-3">Daftar Sebagai Perawat</h1>
        <div class="row">
            <form class="col-md-6" method="POST" action="<?php echo base_url('perawat/createPerawat'); ?>">
                <?php
                if ($this->session->flashdata('danger')) {
                    echo '<div class="alert alert-danger mt-4" role="alert">'.$this->session->flashdata('danger').'</div>';
                }
                ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="******" id="password" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama_perawat" placeholder="Doni" id="nama" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-warning shadow" type="submit">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>