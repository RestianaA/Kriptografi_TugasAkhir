<?php
        include "config.php";
        @session_start();
        $username = @$_POST["username"];
        $password = @$_POST["password"];

        if(@$_POST["tombol"]){
            $data = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
            $ambildata = mysqli_fetch_array($data);
            $hitung = mysqli_num_rows($data);
            if($hitung>0){
                if($ambildata["user_name"]=="Resti"){
                    header("location:admin.php");
                }else{
                    header("location:index.php");
                }
                
            }else{
                echo "Username atau Password salah!";
            }
        }
        
?>