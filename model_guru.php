<?php

class model_guru
{
    private $conn, $host = "localhost", $username = "root", $password = "", $db = "sekolah";
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    }

    public function query($sql)
    {
        $result = mysqli_query($this->conn, $sql);
        $tampung = [];
        while ($data = mysqli_fetch_assoc($result)) {
            $tampung[] = $data;
        }

        return $tampung;
    }
    public function getGuru()
    {
        $sql = "SELECT * FROM guru join kelas on guru.id_kelas = kelas.id_kelas";
        return $this->query($sql);
    }
    public function getKelas()
    {
        return $this->query("SELECT * FROM kelas");
    }

    public function tambahData($data)
    {
        $nrp = $data["nrp"];
        $nm_guru = $data["nm_guru"];
        $id_kelas = $data["id_kelas"];

        $sql = "INSERT INTO guru VALUES('$nrp','$nm_guru','$id_kelas')";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }
    public function getGuruByNrp($data)
    {
        $nrp = $data['ubah'];
        $sql = "SELECT * FROM guru WHERE nrp='$nrp'";
        return $this->query($sql);
    }
    public function editGuru()
    {
        $nrp = $_POST["nrp"];
        $nm_guru = $_POST["nm_guru"];
        $id_kelas = $_POST["id_kelas"];
        $sql = "UPDATE guru set nrp='$nrp',nm_guru='$nm_guru',id_kelas='$id_kelas' WHERE nrp='$nrp'";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }
    public function hapusGuru($data)
    {
        $nrp = $data["hapus"];
        $sql = "DELETE FROM guru WHERE nrp='$nrp'";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }
    public function getUserById($data)
    {
        $nis = $data["nis"];
        $sql = "SELECT * FROM siswa join user on siswa.id_user = user.id WHERE nis='$nis'";
        return $this->query($sql);
    }
    public function getNilaiSiswa($data)
    {
        $nis = $data["nis"];
        $sql = "SELECT * FROM siswa join mengambil on siswa.nis = mengambil.nis join matpel on mengambil.kd_matpel = matpel.kd_matpel WHERE siswa.nis='$nis'";
        return $this->query($sql);
    }

    public function ubahNilai($data)
    {
        $nis = $data["nis"];
        $kd_matpel = $data["kd_matpel"];
        $nilai = $data["nilai"];

        $sql = "UPDATE mengambil SET nilai='$nilai' WHERE nis='$nis' && kd_matpel='$kd_matpel'";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }
}

$model = new model_guru();

if (isset($_GET["tambah"])) {
    $isSuccess = $model->tambahData($_POST);
    echo $isSuccess > 0 ? "<script>alert('Data Berhasil Ditambahkan');location='guru.php';</script>" : "<script>alert('Data Gagal Ditambahkan');location='guru.php';</script>";
}


if (isset($_GET["hapus"])) {
    $isSuccess = $model->hapusGuru($_GET);
    echo $isSuccess > 0 ? "<script>alert('Data Berhasil dihapus');location='guru.php';</script>" : "<script>alert('Data Gagal dihapus');location='guru.php';</script>";
}

if (isset($_GET["ubahNilai"])) {
    $isSuccess = $model->ubahNilai($_POST);
    echo $isSuccess > 0 ? "<script>alert('Nilai Diubah');location='inputNilai.php';</script>" : "<script>alert('Nilai Gagal Diubah');location='inputNilai.php';</script>";
}

if (isset($_POST["submit"])) {
    $isSuccess = $model->editGuru();
    echo $isSuccess > 0 ? "<script>alert('Data Berhasil Diubah');location='guru.php';</script>" : "<script>alert('Data Gagal Diubah');location='guru.php';</script>";
}
