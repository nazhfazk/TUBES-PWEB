<?php
require "model_guru.php";
session_start();
if ($_SESSION["role"] != "Admin") {
    echo "<script>alert('Request Ditolak');location='login.php'</script>";
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets1/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets1/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets1/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets1/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <div class="header-right">
                <a href="model_admin.php?logout" class="btn btn-danger" title="Logout" name="logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>
            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="" href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="siswa.php">Siswa</a>
                    </li>
                    <li>
                        <a class="active-menu" href="guru.php">Guru</a>
                    </li>
                    <li>
                        <a href="inputNilai.php">Nilai</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">
                Tambah Data
            </button>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>NRP</th>
                        <th>Nama Guru</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $model = new model_guru();
                    $guru = $model->getGuru();
                    foreach ($guru as $data) :
                    ?>
                        <tr>
                            <td>
                                <?= $data["nrp"] ?>
                            </td>
                            <td>
                                <?= $data["nm_guru"] ?>
                            </td>
                            <td>
                                <?= $data["nm_kelas"] ?>
                            </td>
                            <td>
                                <a href="ubahGuru.php?ubah=<?= $data["nrp"] ?>" class="badge">Edit</a> | <a onclick="return confirm('Hapus Data?')" href="model_guru.php?hapus=<?= $data["nrp"] ?>" class="badge">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>







            <!-- Modal -->
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="model_guru.php?tambah" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NRP</label>
                                    <input type="text" class="form-control" name="nrp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Guru</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nm_guru">
                                </div>
                                <div>
                                    <label for="kelas">Wali Kelas </label>
                                    <select name="id_kelas" id="wali_kelas">
                                        <option disabled selected>Kelas</option>
                                        <?php $kelas = $model->getKelas();
                                        foreach ($kelas as $row) : ?>
                                            <option value="<?= $row['id_kelas'] ?>"><?= $row["nm_kelas"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Tambah Data</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>





        </div>

















        <script src="assets2/js/jquery-1.10.2.js"></script>
        <script src="assets1/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets1/js/bootstrap.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets1/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets1/js/custom.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->



</body>