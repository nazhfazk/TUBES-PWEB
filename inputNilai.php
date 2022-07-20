<?php
require_once "model_siswa.php";
require_once "model_guru.php";
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
    <script src="assets2/js/jquery-1.10.2.js"></script>
    <script src="assets1/js/jquery-1.10.2.js"></script>

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
                        <a href="guru.php">Guru</a>
                    </li>
                    <li>
                        <a class="active-menu" href="inputNilai.php">Nilai</a>
                    </li>

                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                Input Nilai
            </button>
            <div style="margin-top:5px;"></div>

            <form action="" method="POST">
                <input type="text" name="keyword" name="keyword" style="margin-right:3px;"><button name="tombol-cari" class="btn btn-primary">Cari</button>
            </form>

            <table class="table table-hover">
                <thead>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                    <?php
                    $siswa = new Siswa();
                    $guru = new model_guru();
                    $hasil = $guru->query("SELECT * FROM siswa join mengambil on siswa.nis=mengambil.nis join matpel on mengambil.kd_matpel=matpel.kd_matpel");
                    if (isset($_POST["tombol-cari"])) {
                        $keyword = $_POST["keyword"];
                        $hasil = $guru->query("SELECT * FROM siswa join mengambil on siswa.nis=mengambil.nis join matpel on mengambil.kd_matpel=matpel.kd_matpel WHERE siswa.nis LIKE('%$keyword%') || nm_siswa LIKE ('%$keyword%') || nama_matpel LIKE ('%$keyword%') || nilai='$keyword'");
                    }
                    foreach ($hasil as $item) : ?>
                        <tr>
                            <td><?= $item["nis"] ?></td>
                            <td><?= $item["nm_siswa"] ?></td>
                            <td><?= $item["nama_matpel"] ?></td>
                            <td><?= $item["nilai"] ?></td>
                            <td><a href="ubahNilai.php?nis=<?= $item['nis'] ?>&kd_matpel=<?= $item["kd_matpel"] ?>" class="badge badge-primary">Ubah</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>







            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-t  itle" id="exampleModalLabel">Input Nilai Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="model_siswa.php?inputNilai" method="POST">

                                <select name="nis" id="nis">
                                    <option value="" selected disabled>Nama Siswa</option>
                                    <?php $data = $siswa->getSiswa();
                                    foreach ($data as $item) : ?>
                                        <option value="<?= $item["nis"] ?>"><?= $item["nm_siswa"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select name="kd_matpel" id="nis">
                                    <option value="" selected disabled>Mata Pelajaran</option>
                                    <?php $matpel = $siswa->getMatpel();
                                    foreach ($matpel as $row) : ?>
                                        <option value="<?= $row["kd_matpel"] ?>"><?= $row["nama_matpel"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nilai</label>
                                    <input type="number" class="form-control" name="nilai">
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                            <button type="submit" class="btn btn-success" name="submit">Tambah</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>




    </div>



    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets1/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets1/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets1/js/custom.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->



</body>