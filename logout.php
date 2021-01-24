<?php
    session_start(); //digunakan untuk memulai session
    session_destroy(); //digunakan untuk menghapus session

    header('Location: web_utama/index.php'); //jika berhasil maka akan dialihkan ke halaman index(login)
