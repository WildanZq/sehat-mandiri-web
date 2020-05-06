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
            <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('perawat/registrasi'); ?>">Daftar Sekarang</a>
        </div>
    </nav>
    <div class="w-100 h-100vh px-4 px-md-5 pt-2 pt-md-3 overflow-hidden relative">
        <h1 class="display-3 mt-5 pt-5 mb-2">Periksa di Rumah</h1>
        <p>Bergabung sekarang untuk dapat memantau kondisi pasien setiap hari secara daring</p>
        <img class="home-doc-img d-none d-md-block" src="<?php echo base_url('assets\img\doctors.svg'); ?>" alt="doctor">
        <div class="login-wrapper bg-primary d-flex align-items-center justify-content-center text-white p-4 p-lg-5">
            <div class="login-tab">
                <button class="active" id="tab-perawat">Perawat</button>
                <button id="tab-pasien">Pasien</button>
            </div>
            <div class="px-3 px-md-5 py-2 w-100" id="login-perawat">
                <h1 class="h2 mb-md-4 mb-3">Masuk Sebagai Perawat</h1>
                <?php
                if ($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('success').'</div>';
                }
                ?>
                <?php
                if ($this->session->flashdata('danger')) {
                    echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('danger').'</div>';
                }
                ?>
                <form method="POST" action="<?php echo base_url('auth/loginPerawat'); ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password_perawat">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="******" id="password_perawat">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-warning mt-2" type="submit">Masuk</button>
                        <a href="<?php echo base_url('perawat/registrasi'); ?>" class="text-white mt-2 mt-md-0">
                            Belum punya akun? Daftar
                        </a>
                    </div>
                </form>
            </div>
            <div class="px-3 px-md-5 py-2 d-none w-100" id="login-pasien">
                <h1 class="h2 mb-md-4 mb-3">Masuk Sebagai Pasien</h1>
                <?php
                if ($this->session->flashdata('danger')) {
                    echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('danger').'</div>';
                }
                ?>
                <form method="POST" action="<?php echo base_url('auth/loginPasien'); ?>">
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input class="form-control" type="text" name="no_hp" placeholder="08xxxxxxxx" id="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="password_pasien">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="******" id="password_pasien">
                    </div>
                    <button class="btn btn-warning mt-2" type="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const pasien = document.getElementById('login-pasien');
        const perawat = document.getElementById('login-perawat');
        const tabPasien = document.getElementById('tab-pasien');
        const tabPerawat = document.getElementById('tab-perawat');
        tabPasien.onclick = function() {
            this.classList.add('active');
            tabPerawat.classList.remove('active');
            pasien.classList.remove('d-none');
            perawat.classList.add('d-none');
        }
        tabPerawat.onclick = function() {
            this.classList.add('active');
            tabPasien.classList.remove('active');
            perawat.classList.remove('d-none');
            pasien.classList.add('d-none');
        }
    </script>
</body>
</html>
