<?php

$menuguest = <<<MENUG
			<div class="navbar-inner">
				<ul class="nav">
				</ul>
			</div>
MENUG;
$menuuser = <<<MENUU
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="index.php">Dashboard</a></li>
					<li class="dropdown">
                            <a href="#" class="dropdown-toggle" >Kelola Data</a>
                            <ul class="dropdown-menu">
                                <li><a href="guru.php">Kelola Data Guru</a></li>
                                <li><a href="siswa.php">Kelola Data Siswa</a></li>
                                <li><a href="kelas.php">Kelola Data Kelas</a></li>
								<li><a href="jurusan.php">Kelola Data Jurusan</a></li>
								<li><a href="pelanggaran.php">Kelola Data Pelanggaran</a></li>
								<li><a href="kelola.php">Kelola Data Siswa yang Melanggar</a></li>
								<li><a href="merchan.php">Kelola Data Merchandise</a></li>
                            </ul>
                        </li>

                    <li><a href="surat.php">Cetak Surat Pelanggaran</a></li>
					<li class="dropdown">
                            <a href="#" class="dropdown-toggle" >Laporan</a>
                            <ul class="dropdown-menu">
                                <li><a href="laporan_pelanggaran.php" target="_blank">laporan Pelanggaran Siswa</a></li>
                                <li><a href="siswa_melanggar.php">Laporan Pelanggaran Per Siswa</a></li>

								<li><a href="laporan_jenis.php" target="_blank">Laporan Jenis Pelanggaran</a></li>
								<li><a href="laporan_konseling.php" target="_blank">Laporan Daftar Konseling</a></li>
								
                            </ul>
                        </li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>

MENUU;

$menuBK = <<<MENUU
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="index.php">Dashboard</a></li>
					
					<li class="dropdown">
                            <a href="#" class="dropdown-toggle" >Kelola Data</a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="kelola.php">Kelola Data Siswa yang Melanggar</a></li>
								
                                <li><a href="konseling.php">Kelola Data Konseling</a></li>
								
                            </ul>
                        </li>

					<li class="dropdown">
                            <a href="#" class="dropdown-toggle" >Laporan</a>
                            <ul class="dropdown-menu">
                                <li><a href="laporan_pelanggaran.php" target="_blank">laporan Pelanggaran Siswa</a></li>
								<li><a href="laporan_konseling.php" target="_blank">Laporan Daftar Konseling</a></li>
                            </ul>
                        </li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>

MENUU;
$menuGuru = <<<MENUU
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="index.php">Dashboard</a></li>
					<li><a href="dataSiswa.php">Siswa Pelanggar</a></li>
					<li><a href="respon.php">Konfirmasi Pesanan </a></li>
                    <li><a href="suratPemanggilan.php" >Cetak Surat Pemanggilan</a></li>

					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>

MENUU;

$kepala = <<<MENUU
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="index.php">Dashboard</a></li>
					<li class="dropdown">
                            <a href="#" class="dropdown-toggle" >Laporan</a>
                            <ul class="dropdown-menu">
                                <li><a href="laporan_pelanggaran.php" target="_blank">laporan Pelanggaran Siswa</a></li>
								<li><a href="laporan_jenis.php" target="_blank">Laporan Jenis Pelanggaran</a></li>
								<li><a href="laporan_konseling.php" target="_blank">Laporan Daftar Konseling</a></li>
                            </ul>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
				</ul>
			</div>

MENUU;

$siswa = <<<MENUU
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="index.php">Dashboard</a></li>
					<li><a href="pelanggaranSiswa.php" >Pelanggaran</a></li>
					<li><a href="chating.php" >Chating</a></li>
					<li><a href="viewrespon.php" >Riwayat Pesan</a></li>
                    <li><a href="logout.php">Logout</a></li>
				</ul>
			</div>

MENUU;

$member = <<<MENUU
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="index.php">Dashboard</a></li>
					<li><a href="index.php?p=view_kelas_online">Kelas Online</a></li>
				</ul>
			</div>

MENUU;

if (isset($_SESSION['nip']) && isset($_SESSION['nama_guru'])) {


	if ($_SESSION['level'] == 'Guru_Piket') {
		echo $menuuser;
	}
	if ($_SESSION['level'] == 'Wali_Kelas') {
		echo $menuGuru;
	}
	if ($_SESSION['level'] == 'Guru_BK') {
		echo $menuBK;
	}
	if ($_SESSION['level'] == 'Kepala_Sekolah') {
		echo $kepala;
	}
	if ($_SESSION['level'] == '') {
		echo $menuguest;
	}


	// $level=='Guru_Piket' || $level=='Wali_Kelas' || $level=='Guru_BK' || $level='Kepala_Sekolah'

}
if (isset($_SESSION['nis']) && isset($_SESSION['nama_siswa'])) {
	if ($_SESSION['level'] == 'Siswa') {
		echo $siswa;
	}
} else {
	echo $menuguest;
}

if (isset($_SESSION['email']) && isset($_SESSION['nama'])) {
	if ($_SESSION['level'] == 'Member') {
		echo $member;
	}
} else {
	echo $menuguest;
}
