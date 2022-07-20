<?php
// require_once "model_siswa.php";
require_once "model_guru.php";
$guru = new model_guru();
$data = $guru->getGuruByNrp($_GET);
foreach ($data as $item) {
    $nm_guru = $item["nm_guru"];
    $nrp = $item["nrp"];
    $id_kelas = $item["id_kelas"];
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container-fluid">
        <h2>Ubah Data</h2>
        <form action="model_guru.php?ubah" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" name="nrp" value=<?= $nrp ?>>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Nama Guru</label>
                <input type="text" class="form-control" name="nm_guru" value=<?= $nm_guru ?>>
            </div>

            <div class="form-group
                <label for=" exampleInputPassword1">Wali Kelas</label>
                <select name="id_kelas" id="id_kelas">
                    <option value="" selected disabled value=<?= $id_kelas ?>>Wali Kelas</option>
                    <?php $kelas = $guru->getKelas();
                    foreach ($kelas as $item) : ?>
                        <option value="<?= $item["id_kelas"] ?>"><?= $item["nm_kelas"] ?></option>
                    <?php endforeach ?>
                </select>
                <!-- <input type="text" class="form-control" name="id_kelas" value=<?= $id_kelas ?>> -->
            </div>
            <div class="mt-2">
                <button class="btn btn-success" type="submit" name="submit">Ubah Data</button>
            </div>

        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>