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
        <?php include_once("menu1.php"); ?>
    </div>
    <div class="page">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <marquee>Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
                    </marquee>
                </div>
                <div>
                    <div class="modal-header">
                        <h3>List Akun Member</h3>
                    </div>
                    <div style="margin-top:15px" class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <td width="2%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>No</h5>
                                    </font>
                                </td>
                                <td width="10%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Nama</h5>
                                    </font>
                                </td>
                                <td width="10%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Email</h5>
                                    </font>
                                </td>
                                <td width="8%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Password</h5>
                                    </font>
                                </td>
                                <td width="8%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Jenis Kelamin</h5>
                                    </font>
                                </td>
                                <td width="5%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>No Hp</h5>
                                    </font>
                                </td>
                                <td width="10%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Alamat</h5>
                                    </font>
                                </td>
                                <td width="12%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Aksi</h5>
                                    </font>
                                </td>
                            </thead>

                            <?php
                            $no = 1;
                            $s = mysql_query("SELECT * FROM pendaftaran");
                            while ($data = mysql_fetch_array($s)) {
                            ?>
                                <tbody align="center">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td><?php echo $data['jenis_kelamin']; ?></td>
                                    <td><?php echo $data['nohp']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="edit_member.php?id=<?php echo $data['pendaftaran_id']; ?>">
                                            Edit</a>
                                        <a class="btn btn-danger" href="hapus_member.php?id=<?php echo $data['pendaftaran_id']; ?>">
                                            Delete</a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-4">

                <!-- <div class="sidebar-module">
                    <?php

                    include "sidebar.php";
                    ?>
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>List Akun Member Yang Mendaftar Kelas</h3>
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered table-hover">
                        <thead>
                            <td width="5%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>No</h5>
                                </font>
                            </td>
                            <td width="20%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Id Pendaftaran</h5>
                                </font>
                            </td>
                            <td width="20%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Kelas</h5>
                                </font>
                            </td>
                            <td width="20%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Status</h5>
                                </font>
                            </td>
                            <td width="20%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Aksi</h5>
                                </font>
                            </td>
                        </thead>

                        <?php
                        $no = 1;
                        $s = mysql_query("SELECT * FROM daftar_kelas JOIN pendaftaran ON daftar_kelas.pendaftaran_id = pendaftaran.pendaftaran_id JOIN kelas_online ON daftar_kelas.kelas_id = kelas_online.kelas_id");
                        while ($data = mysql_fetch_array($s)) {
                        ?>
                            <tbody align="center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="edit_status_member.php?id=<?php echo $data['id']; ?>">
                                        Edit</a>
                                </td>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="panel-footer">
        <h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . All Right Reserved. <strong>SMK Negeri 2 Kerinci</strong></h6>
    </div>
    <?php
    include_once("modal-login.php");
    ?>
</body>

</html>