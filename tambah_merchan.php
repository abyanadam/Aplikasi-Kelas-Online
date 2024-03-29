<?php
session_start();
include_once("lib/koneksi.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<title>SMK Negeri 2 Kerinci</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">

	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="themea/twitter.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="dist/sweetalert.min.js"></script>
	<style type="text/css">
		.style2 {
			font-family: "Times New Roman", Times, serif;
			font-size: 16px;
		}

		.style7 {
			font-size: 16px;
			font-family: "Trebuchet MS";
		}
	</style>
</head>

<body>
	<p align="center">
		<img src="images/smkn2kerinci.jpg" alt="" width="90%"></p>

	<div class="navbar" id="menu">
		<?php include_once("menu.php"); ?>
	</div>
	<div class="page">
		<br>
		<div class="row">

			<div class="col-md-8">
				<div class="alert alert-info">
					<marquee>Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
					</marquee>
				</div>

				<div class="modal-header">
					<h4>Tambah Merchandise</h4>
				</div>
				<div style="margin-top:10px;">
					<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
						<div class="control-group">
							<label class="control-label">Nama Merchandise</label>
							<div class="controls">
								<input name="nama" type="text" class="form-control">

							</div>
						</div>


						<div class="control-group">
							<label>Kategori Merchandise</label>
							<div class="form-label-group">
								<select class="form-control" name="kategori">
									<option value="">Pilih Kategori</option>

									<?php
									// include 'libkoneksi.php';
									$s = mysql_query("SELECT * FROM tbl_kategori");
									while ($data = mysql_fetch_array($s)) {
										echo '<option value="' . $data['id_kategori'] . '">' . $data['nama_kategori'] . '</option>';

										// $tgl = $pecah['tgl'];
									}


									?>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Harga Diskon</label>
							<div class="controls">
								<input name="diskon" type="number" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Harga Asli</label>
							<div class="controls">
								<input name="asli" type="number" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Warna</label>
							<div class="controls">
								<input name="warna" type="text" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Ukuran</label>
							<div class="controls">
								<input name="ukuran" type="text" class="form-control">
							</div>
						</div>

						<fieldset class="form-group">
							<div class="control-group">
								<label class="col-form-label col-sm-1">Label</label>
								<div class="col-sm-6">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="label[]" value="Diskon">
										<label class="form-check-label" for="radio1">
											Diskon
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="label[]" value="Terbaru">
										<label class="form-check-label" for="radio2">
											Terbaru
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="label[]" value="Terbatas">
										<label class="form-check-label" for="radio3">
											Terbatas
										</label>
									</div>
								</div>
							</div>
						</fieldset>

						<div class="control-group">
							<label class="control-label" for="nama">Bahan</label>
							<div class="controls">
								<input name="bahan" type="text" class="form-control">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="nama">Stok</label>
							<div class="controls">
								<input name="stok" type="text" class="form-control">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="nama">Gambar</label>
							<div class="controls">
								<input name="gambar" type="file" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="simpan"></label>
							<div class="controls">
								<input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
								<input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
							</div>
						</div>

						<?php
						if (isset($_POST['simpan'])) {
							$nama     = $_POST['nama'];
							$kategori = $_POST['kategori'];
							$diskon   = $_POST['diskon'];
							$asli     = $_POST['asli'];
							$warna    = $_POST['warna'];
							$ukuran   = $_POST['ukuran'];
							$a = $_POST['label'];
							$label = implode(" ", $a);

							$bahan    = $_POST['bahan'];
							$stok     = $_POST['stok'];

							$nama_gambar = $_FILES['gambar']['name'];
							$lokasi      = $_FILES['gambar']['tmp_name'];

							if (!empty($lokasi)) {
								move_uploaded_file($lokasi, "images/" . $nama_gambar);
							}

							$simpan = mysql_query("INSERT INTO `tbl_barang`(nama_barang,
                                                                                id_kategori,
                                                                                harga_diskon,
                                                                                harga_asli,
                                                                                warna,
                                                                                ukuran, 
                                                                                label, 
                                                                                bahan,
                                                                                stok,
                                                                                gambar) 
                                                                                VALUES
                                                                        		('$nama',
                                                                                '$kategori',
                                                                                '$diskon',
                                                                                '$asli',
                                                                                '$warna',
                                                                                '$ukuran',
                                                                                '$label',
                                                                                '$bahan',
                                                                                '$stok',
                                                                                '$nama_gambar'
																				)");

							// mysql_query("INSERT INTO tbl_barang VALUES ('$nama','$kategori','$diskon','$asli','$warna','$ukuran','$label','$bahan','$stok','$nama_gambar')")
							// 	or die(mysql_error);

							// var_dump($simpan);
							// exit;

							if ($simpan) {
								echo "
                        <script language=javascript>
                            alert('Data Tersimpan');
                            window.location='merchan.php';
                        </script>
                        ";
							} else {
								echo "
                                <script language=javascript>
                                    alert('Data tidak Tersimpan');
                                    window.location='merchan.php';
                                </script>
                    ";
							}
						}

						if (isset($_POST['batal'])) {
							echo "<script language=javascript>
							window.location = 'merchan.php';
						</script>";
							exit;
						}
						?>
					</form>
				</div>
			</div>
			<div class="col-md-4">

				<div class="sidebar-module">
					<?php

					include "sidebar.php";
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . <strong>SMK Negeri 2 Kerinci</strong></h6>
	</div>
	<?php
	include_once("modal-login.php");
	?>
</body>

</html>