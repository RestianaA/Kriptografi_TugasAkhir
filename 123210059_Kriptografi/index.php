<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Form Laporan</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	background: #ffffff;
}
.form-control {
	min-height: 41px;
	background: #fff;
	box-shadow: none !important;
	border-color: #e3e3e3;
}
.form-control:focus {
	border-color: #70c5c0;
}
.form-control, .btn {
	border-radius: 2px;
}
.login-form {
	width: 100%;
	max-width: 600px;
	margin: 0 auto;
	padding: 100px 0 30px;
}
.login-form form {
	color: #7a7a7a;
	border-radius: 2px;
	margin-bottom: 15px;
	font-size: 13px;
	background: #ececec;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
	position: relative;
}
.login-form h2 {
	font-size: 22px;
	margin: 35px 0 25px;
}
.login-form .btn, .login-form .btn:active {
	font-size: 16px;
	font-weight: bold;
	background: #0062cc!important;
	border: none;
	margin-bottom: 20px;
}
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #000;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
.login-form .bottom-action {
	font-size: 14px;
}
</style>
</head>
<body style="background-image: url('upn.jpg'); background-position: fixed; width: 100%; height: 100%; background-size: 100%;">
<div class="login-form">
    <form action="enkripsi_laporan.php" method="post">
        <h2 class="text-center">Form Pengajuan Laporan</h2>
        <div class="form-group">
        	<input type="text" class="form-control" name="judullaporan" style="width: 100%; color: black;" placeholder="Judul Laporan" required>
        </div>
		<div class="form-group">
        	<input type="text" class="form-control" name="isilaporan" style="width: 100%; color: black;" placeholder="Isi Laporan" required>
        </div>
        <div class="form-group">
        	<input class="form-control" type="file" accept=".jpg, .jpeg, .png" name="gambarlaporan" id="gambarlaporan" style="width: 100%; color: black;"  required>
    	    <p>Ukuran Gambar Maks 2mb (Format yang diterima: .jpg, .jpeg, .png)</p>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="LAPORKAN" name="tombol">
        </div>
    </form> 
    <p class="text-center small"><a href="logout.php" class="text-primary">LOGOUT</a></p>
    <?php
        include "config.php";
        @session_start();
        $judullaporan = @$_POST["judul_laporan"];
        $isilaporan = @$_POST["isi_laporan"];
        $gambarlaporan = @$_POST["gambar_laporan"]; 
        $tombol	= @$_POST["tombol"];

   
        if($tombol) {
            $input = mysqli_query($koneksi, "INSERT INTO tb_laporan VALUES('','$judullaporan','$isilaporan','$gambarlaporan')");
            if($input) {
                echo "Laporan Anda akan segera diproses.";
            } else {
                echo "Laporan gagal diproses.";
            }
        }   
        ?>
</div>
</body>
</html>