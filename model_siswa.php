<?php

class Siswa
{

    private $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "sekolah");
    }
    public function getSiswa()
    {
        return $this->query("SELECT * FROM siswa");
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

    public function tambahData($data)
    {
        $nis = $data["nis"];
        $nm_siswa = $data["nama"];
        $id_user = $data["id_user"];
        $nrp = $data["nrp"];
        $sql = "INSERT INTO siswa VALUES('$nis','$nm_siswa','$nrp','$id_user')";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }
    public function getSiswaByNis($nis)
    {
        $nis = $nis["nis"];
        $sql = "SELECT * FROM siswa WHERE nis=$nis";
        return $this->query($sql);
    }
    public function setSiswa($data)
    {
        $nis = $data["nis"];
        $nm_siswa = $data["nama"];
        $nrp = $data["nrp"];
        $sql = "UPDATE siswa SET nm_siswa='$nm_siswa', nrp='$nrp' WHERE nis='$nis'";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }

    public function hapusSiswa($data)
    {
        $nis = $data["hapus"];
        $sql = "DELETE FROM siswa WHERE nis='$nis'";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }

    public function inputNilai($data)
    {
        $nis = $data["nis"];
        $kd_matpel = $data["kd_matpel"];
        $nilai = $data["nilai"];
        $sql = "INSERT INTO mengambil VALUES('$nis','$kd_matpel','$nilai')";
        mysqli_query($this->conn, $sql);
        return mysqli_affected_rows($this->conn);
    }

    public function getMatpel()
    {
        return $this->query("SELECT * FROM matpel");
    }
    public function getUser()
    {
        return $this->query("SELECT * FROM user ORDER BY id");
    }
}

$siswa = new Siswa();

if (isset($_GET["tambah"])) {
    $isSuccess = $siswa->tambahData($_POST);
    echo $isSuccess > 0 ? "<script>alert('Data Berhasil Ditambahkan');location='siswa.php'</script>" : "<script>alert('Data Gagal Ditambahkan');location='siswa.php'</script>";
}

if (isset($_GET["ubah"])) {
    $isSuccess = $siswa->setSiswa($_POST);
    echo $isSuccess > 0 ? "<script>alert('Data Berhasil Di Ubah');location='siswa.php'</script>" : "<script>alert('Data Gagal Di Ubah');location='siswa.php'</script>";
}

if (isset($_GET["hapus"])) {

    $isSuccess = $siswa->hapusSiswa($_GET);
    echo $isSuccess > 0 ? "<script>alert('Data Berhasil Dihapus');location='siswa.php'</script>" : "<script>alert('Data Gagal Di hapus');location='siswa.php'</script>";
}

if (isset($_GET["inputNilai"])) {
    $isSuccess = $siswa->inputNilai($_POST);
    echo $isSuccess > 0 ? "<script>alert('Input Berhasil');location='inputNilai.php'</script>" : "<script>alert('Input Gagal');location='inputNilai.php'</script>";
}
