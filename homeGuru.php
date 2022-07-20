<?php
// require_once "model_admin.php";
// require_once "model_siswa.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title> SchoolS </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/css/style2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxs-school'></i>
            <div class="logo_name">SchoolS</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="home.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            <li>
                <a href="nilai.php">
                    <i class='bx bxs-graduation'></i>
                    <span class="links_name">Data Nilai</span>
                </a>
                <span class="tooltip">Data Siswa</span>
            </li>

            <li class="log_out">
                <a href="model_admin.php?logout">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Home</div>
        <div class="container">
            <div class="box">
                <div class="icon"><i class='bx bx-microchip'></i></div>
                <div class="content">
                    <h3>Selamat Datang</h3>
                    <p>Website SchoolS adalah website sistem manajemen sekolah</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class='bx bxs-book'></i></div>
                <div class="content">
                    <h3>Tujuan</h3>
                    <p>Website dibuat untuk memenuhi UAS dari Mata Kuliah Pemrograman Web </p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class='bx bxs-user-circle'></i></div>
                <div class="content">
                    <h3>Profile</h3>
                    <p>Website ini dibuat oleh :
                    <ul>
                        <li>Salman Abdussalam (200102115)</li>
                        <li>M Fadhlan Akhbari Wildhan (200102085)</li>
                        <li>Nazhif Azka Fadlillah (200102101)</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();
        });

        searchBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();
        });


        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>

</body>

</html>