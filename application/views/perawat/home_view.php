<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Mandiri</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <img class="logo absolute" src="<?php echo base_url('assets\icon\logo.svg'); ?>" alt="LOGO">
    <nav>
        <div class="nav-wrapper">
            <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('perawat'); ?>">Pasien</a>
            <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('perawat/akun'); ?>">
                <?php echo $this->session->userdata('nama'); ?>
            </a>
            <a class="btn btn-sm btn-primary shadow" href="<?php echo base_url('auth/logout'); ?>">Keluar</a>
        </div>
    </nav>
    <div class="w-100 px-4 px-md-5 pt-2 pt-md-3 overflow-hidden relative pb-4">
        <h1 class="display-3 mt-5 pt-5 mb-2 mb-md-3">Daftar Pasien</h1>
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success mt-4" role="alert">'.$this->session->flashdata('success').'</div>';
        }
        ?>
        <div class="pasien-wrapper row mt-4">
            <?php
            foreach ($pasien as $key => $value) {
                $jk = $value->jk == 1 ? 'Laki-laki' : 'Perempuan';
                echo "
                <div class=\"col-lg-3 col-md-4\">
                    <div class=\"card pasien-card shadow-sm\">
                        <div class=\"card-header bg-primary pt-4\">
                            <h3 class=\"h5 w-100 text-truncate mb-2\">$value->nama_pasien</h3>
                        </div>
                        <div class=\"card-body\">
                            <table class=\"w-100\">
                                <tr><td>Jenis Kelamin</td><td>$jk</td></tr>
                                <tr><td>Usia</td><td>$value->usia</td></tr>
                            </table>
                        </div>
                        <div class=\"card-footer bg-white border-top-0 d-flex justify-content-between pt-0\">
                            <a class=\"text-danger\" href=\"".base_url("pasien/deletePasien/$value->id_pasien")."\">Hapus</a>
                            <a href=\"".base_url("perawat/detailPasien/$value->id_pasien")."\">Lihat detail</a>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <a href="<?php echo base_url('perawat/registrasiPasien'); ?>" class="col-lg-3 col-md-4 decoration-0">
                <div class="card pasien-card shadow-sm create shadow">
                    <span class="font-weight-bold h5">Tambah Pasien</span>
                </div>
            </a>
        </div>
    </div>
</body>
</html>