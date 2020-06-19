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

            <div class="col-md-8">
                <div class="alert alert-info">
                    <marquee>Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
                    </marquee>
                </div>
                <?php

                $i = 1;
                $s = mysql_query("SELECT * FROM tb_pemateri");

                ?>

                <div>
                    <div class="modal-header">
                        <h3>List Pemateri</h3>
                    </div>
                    <div style="margin-top:10px" class="text-right">
                        <a href="tambah_pemateri.php"><input name="tambah" type="submit" id="dataTable" value="Tambah Pemateri" class="btn btn-primary"></a>
                    </div>
                    <div style="margin-top:10px">
                        <table class="table table-condensed table-bordered table-hover">

                            <td width="5%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>No</h5>
                                </font>
                            </td>
                            <td width="20%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Nama Pemateri</h5>
                                </font>
                            </td>
                            <td width="20%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Jabatan</h5>
                                </font>
                            </td>
                            <td width="20%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Foto</h5>
                                </font>
                            </td>

                            <td width="15%">
                                <font face="Comic Sans MS, cursive" class="text-error text-center">
                                    <h5>Aksi</h5>
                                </font>
                            </td>
                            </thead>

                            <?php
                            $s = mysql_query("SELECT * FROM tb_pemateri");
                            while ($data = mysql_fetch_array($s)) {
                            ?>
                                <tbody align="center">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['jabatan']; ?></td>
                                    <td>
                                        <center>
                                            <img width="75px" src="images/<?php echo $data['foto'] ?>" alt="Tidak Ada Gambar">
                                        </center>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="edit_pemateri.php?id=<?php echo $data['id_pemateri']; ?>" title="Edit">Edit</a>
                                        <a class="btn btn-danger" href="hapus_pemateri.php?id=<?php echo $data['id_pemateri']; ?>" d title="Hapus">Hapus</a>
                                    </td>
                                </tbody>
                            <?php $i++;
                            } ?>
                        </table>



                    </div>
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
        <h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . All Right Reserved. <strong>SMK Negeri 2 Kerinci</strong></h6>
    </div>
    <?php
    include_once("modal-login.php");
    ?>
</body>

</html>