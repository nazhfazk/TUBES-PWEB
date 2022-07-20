<?php
session_start();
if (isset($_SESSION["login"])) {
  echo "<script>alert('anda sudah login')'</script>";
  if ($_SESSION["role"] == "Admin") {
    echo "<script>location='index.php'</script>";
  } else if ($_SESSION["role"] == "Siswa") {
    echo "<script>location='home.php'</script>";
  }
}
?>

<!DOCTYPE html>
<!-- Created By Codecary -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="asset/css/style.css">

</head>

<body>

  <div class="container">
    <h1>Form Login</h1>
    <form action="model_admin.php?login" method="POST">
      <div class="form-control">
        <input type="text" required name="username">
        <label>Username</label>
      </div>
      <div class="form-control">
        <input type="password" required name="password">
        <label>Password</label>
      </div>
      <button class="btn" type="submit" name="submit">Login</button>
      <p class="text">Don't have an account? <a href="register.php">Register</a></p>
    </form>
  </div>

  <script src="asset/js/js.js"></script>
</body>

</html>