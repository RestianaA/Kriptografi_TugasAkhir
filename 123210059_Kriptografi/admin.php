<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body style="background-image: url('upn.jpg'); background-position: fixed; width: 100%; height: 100%; background-size: 100%;">
    <p class="text-center small">LIHAT LAPORAN <a href="laporan.php" class="text-primary">MASUK</a></p>
    <div class="container" align="center">
        <h1>Daftar Mahasiswa</h1>
        <center>
            <table class="table table-light table-striped" >
            <thead>
                <tr >
                    <th scope="col">No</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">NIM</th>
                </tr>
            </thead>
            <tbody >
                <?php
                include 'config.php';
                $query = mysqli_query ($koneksi, "SELECT * from tb_user");
                $s=1;
                while ($data=mysqli_fetch_array($query))

                {?>

                <tr>
                    <td> <?php echo $s++?></td>
                    <td> <?php echo $data['user_name'];?></td>
                    <td> <?php echo $data['username'];?></td>
                    <td> <?php echo $data['password'];?></td>
                    <td> <?php echo $data['user_npm'];?></td>
                </tr>
                <?php 
                }
                ?> 
            </tbody>
            </table>
        </center>      
    </div> 
    <p class="text-center small"><a href="logout.php" class="text-primary">LOGOUT</a></p>
</body>
</html>