<?php
	session_start();

	include 'config.php';

	$username 	= $_POST['username'];
	$password 	= $_POST['pass'];
    $tombol	= @$_POST["tombol"];

        if($tombol) {
            $input = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
            $ambil = mysqli_fetch_array($input);
            if($ambil['user_name']=="Resti" && $ambil['username']=="admin") {
                echo "Login Berhasil";
                echo "<script>location='admin.php';</script>";
            } else{
                echo "Login Berhasil";
                echo "<script>location='index.php';</script>";
            }
        }else {
            echo "Registrasi Gagal";
        }
?>