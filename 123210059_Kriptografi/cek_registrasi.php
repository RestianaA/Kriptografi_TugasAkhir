<?php
        include "config.php";

        $user_name = @$_POST["user_name"];
        $username = @$_POST["username"];
        $password = @$_POST["pass"]; 
        $user_npm = @$_POST["user_npm"];
        $tombol	= @$_POST["tombol"];

        if($tombol) {
            $input = mysqli_query($koneksi, "INSERT INTO tb_user VALUES('','$user_name','$username','$password','$user_npm')");
            if($input) {
                echo "Registrasi Berhasil";
                echo "<script>location='login.php';</script>";
            } else {
                echo "Registrasi Gagal";
            }
        }   
?>