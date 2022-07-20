<?php
require_once "model_siswa.php";
class model_admin
{
    private $conn, $username = "root", $host = "localhost", $dbpw = "", $dbname = "sekolah";
    public function __construct()
    {
        session_start();
        $this->conn = mysqli_connect($this->conn, $this->username, $this->dbpw, $this->dbname);
    }

    public function register($data)
    {
        $username = $data["username"];
        $password = $data["password"];
        $password2 = $data["confirm_password"];
        if ($password != $password2) {
            echo "<script>alert('Username atau Password yang anda masukkan salah!!');location='register.php'</script>";
        }
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_fetch_assoc($result) > 0) {
            echo "<script>alert('username yang anda masukkan sudah ada');location='register.php'</script>";
            die;
        }

        //encrypt data
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user VALUES('','$username','$password','2')";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }

    public function login($data)
    {
        $username = $data["username"];
        $password = $data["password"];
        $sql = "SELECT * from user WHERE username = '$username'";
        $query = "SELECT * FROM siswa join user on siswa.id_user = user.id WHERE username='$username'";
        $model = new Siswa();
        $result = $model->query($sql);
        $userPassword = $result[0]["password"];
        $test = $result[0];
        if (password_verify($password, $userPassword)) {
            $_SESSION["login"] = true;
            $user = $model->query($query)[0];
            $_SESSION["id_role"] = $test["role"];
            $_SESSION["nis"] = $user["nis"];
            if ($_SESSION["id_role"] == 1) {
                $_SESSION["role"] = "Admin";
                echo "<script>alert('Login Berhasil')</script>;<script>location='index.php'</script>";
            } else if ($_SESSION["id_role"] == 2) {
                $_SESSION["role"] = "Siswa";
                echo "<script>alert('Login Berhasil')</script>;<script>location='home.php'</script>";
            }
        } else {
            echo "<script>alert('Username atau Password Salah')</script>;<script>location='login.php'</script>";
        }
    }

    public function loginSiswa($data)
    {
        $username = $data["username"];
        $password = $data["password"];
        $sql = "SELECT * from user WHERE username = '$username'";
        $model = new Siswa();
        $result = $model->query($sql);
        $userPassword = $result[0]["password"];
        if (password_verify($password, $userPassword)) {
            $_SESSION["role"] = "Siswa";
            echo "<script>alert('Login Berhasil')</script>;<script>location='index.php'</script>";
        } else {
            echo "<script>alert('Username atau Password Salah')</script>;<script>location='login.php'</script>";
        }
    }

    public function logout()
    {
        session_destroy();
        echo "<script>alert('Anda Berhasil Logout')</script>;<script>location='login.php'</script>";
    }

    public function getUserById($data)
    {
        $nis = $data["nis"];
        $model = new Siswa();
        $sql = "SELECT * FROM siswa join user on siswa.id_user = user.id WHERE nis='$nis'";
        return $model->query($sql);
    }
}

$model = new model_admin();

if (isset($_GET["register"])) {
    $isSuccess = $model->register($_POST);
    echo $isSuccess > 0 ? "<script>alert('Registrasi Berhasil');location='login.php'</script>" : "";
}

if (isset($_GET["login"])) {
    $model->login($_POST);
}

if (isset($_GET["logout"])) {
    $model->logout();
}
