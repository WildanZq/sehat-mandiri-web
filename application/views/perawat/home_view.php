<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Home Perawat</h1>
<a href="<?php echo base_url('pasien/registrasi'); ?>">Tambah Pasien</a>
<?php echo $this->session->flashdata('success'); ?>
<a href="<?php echo base_url('auth/logout'); ?>">Logout</a>
<br>
<a href="<?php echo base_url('home/pasien'); ?>">Lihat Pasien</a>