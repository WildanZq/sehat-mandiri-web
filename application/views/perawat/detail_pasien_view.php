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
    <img class="logo absolute fixed-md" src="<?php echo base_url('assets\icon\logo.svg'); ?>" alt="LOGO">
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
    <div class="w-100 px-4 px-md-5 pt-2 pt-md-3 overflow-hidden relative pb-4">
        <div class="row">
            <div class="col-md-6 d-none d-md-block"></div>
            <div class="col-md-6 relative fixed-md d-flex flex-column detail-pasien-wrapper">
                <h1 class="display-3 mt-md-5 pt-5 mb-2"><?php echo $pasien->nama_pasien; ?></h1>
                <table>
                    <tr>
                        <td class="font-weight-bold pr-5">Jenis Kelamin</td>
                        <td><?php echo $pasien->jk == 1 ? 'Laki-laki' : 'Perempuan'; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold pr-5">Usia</td>
                        <td><?php echo $pasien->usia; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold pr-5">Nomor HP</td>
                        <td><?php echo $pasien->no_hp; ?></td>
                    </tr>
                </table>
                <div class="bg-primary pesan-wrapper flex-2 mt-3 p-2 d-flex flex-column overflow-auto">
                    <h2 class="h5 ml-2 mt-2 ml-md-3">Pesan</h2>
                    <div class="pesan-container px-md-3 px-2 py-2 bg-white flex-2 text-dark overflow-auto border border-dark" id="pesan">
                        <?php
                        foreach ($pesan as $key => $value) {
                            $waktu = date("H:i", strtotime($value->waktu));
                            $jenis = $value->pengirim == 'perawat' ? 'out' : 'in';
                            echo "<p class=\"pesan-$jenis\" style=\"--waktu: '$waktu'\">$value->pesan</p>";
                        }
                        ?>
                    </div>
                    <div>
                        <form action="<?php echo base_url('pesan/createPesanPerawat'); ?>" method="post">
                            <div class="form-group mb-0 mt-1 d-flex">
                                <input class="d-none" type="text" name="id_pasien" value="<?php echo $this->uri->segment(3); ?>">
                                <input class="form-control" type="text" name="pesan" placeholder="Ketik pesan...">
                                <button type="submit" class="btn btn-warning">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-md-5 pt-md-5">
                <h2 class="h3 mb-4 mt-md-0 mt-3 pt-md-5">Laporan Pasien</h2>
                <?php
                $rlaporan = array_reverse($laporan);
                foreach ($rlaporan as $key => $value) {
                    $date = date("d M Y H:i", strtotime($value->waktu));
                    echo '
                    <h3 class="h5 font-weight-normal mb-3 text-primary">'.$date.'</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="w-100">
                                <tr>
                                    <td class="font-weight-bold pr-5">Suhu Tubuh</td>
                                    <td class="text-right">'.$value->suhu_tubuh.'°C</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pr-5">Demam</td>
                                    <td class="text-right">'.($value->demam == 1 ? 'Ya' : 'Tidak').'</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pr-5">Batuk Pilek</td>
                                    <td class="text-right">'.($value->batuk_pilek == 1 ? 'Ya' : 'Tidak').'</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="w-100">
                                <tr>
                                    <td class="font-weight-bold pr-5">Sesak Nafas</td>
                                    <td class="text-right">'.($value->sesak_nafas == 1 ? 'Ya' : 'Tidak').'</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pr-5">Sakit Tenggorokan</td>
                                    <td class="text-right">'.($value->sakit_tenggorokan == 1 ? 'Ya' : 'Tidak').'</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 border-top mt-2 pt-1">
                            <p class="font-weight-bold mb-0">Keluhan Lainnya</p>
                            <p>'.($value->lainnya ? $value->lainnya : '-').'</p>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/nav.js'); ?>"></script>
    <script>
        const pesan = document.getElementById('pesan');
        pesan.scrollTop = pesan.scrollHeight - pesan.clientHeight;
    </script>
</body>
</html>