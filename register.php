<?php
session_start();
if (isset($_SESSION["role"])) {
    echo "<script>alert('anda sudah login');location='index.php'</script>";
}
?>

<!DOCTYPE html>
<!-- Created By Codecary -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Login Form</title>
    <link rel="stylesheet" href="asset/css/style.css">

</head>

<body>

    <div class="container">
        <h1>Form Registrasi</h1>
        <form action="model_admin.php?register" method="POST">
            <div class="form-control">
                <input type="text" required name="username">
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="password" required name="password">
                <label>Password</label>
            </div>
            <div class="form-control">
                <input type="password" required name="confirm_password">
                <label>Konfirmasi Password</label>
            </div>
            <button class="btn" type="submit">Daftar</button>
            <p class="text">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>

    <script src="asset/js/js.js"></script>
</body>

</html>