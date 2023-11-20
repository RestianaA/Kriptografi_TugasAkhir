<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>

    <style type="text/css">
        .login-form {
            width: 100%;
            max-width: 350px;
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
        .login-form .btn:hover, .login-form .btn:focus {
            background: #50b8b3 !important;
        }
        .login-form a {
            color: blue;
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

    </style>
</head>
<body>
    <div class="login-form">
        <form action="cek_login.php" method="POST">
            <h2 class="text-center">Form login</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" autocomplete="off" class="form-control" placeholder="Password" required>
                <input type="hidden" id="pass" name="pass" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" onclick="usingSHA()" class="btn btn-primary btn-lg btn-block" value="LOGIN" name="tombol">
            </div>
        </form>
        <p class="text-center small">Belum punya akun ? <a href="registrasi.php" class="text-primary">Registrasi</a></p>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script type="text/javascript">
function hashUsingSHA(input) {
    return CryptoJS.SHA256(input).toString();
}
function usingSHA(){
	const plaintext = document.getElementById('password').value;
	const texth = hashUsingSHA(plaintext);
	
	document.getElementById('pass').value = texth;
}
</script>
</body>
</html>