<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Hasil Laporan</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body style="background-image: url('upn.jpg'); background-position: fixed; width: 100%; height: 100%; background-size: 100%;">
    <p class="text-center small">LIHAT DAFTAR <a href="admin.php" class="text-primary">MAHASISWA</a></p>
        <?php
            session_start(); 
        ?>
        <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
        <style scoped>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
        </style>

        <div align="center">
            <h1>Laporan Masuk</h1>
        </div>
        <div class="container" align="center">
            <center>
            <table class="table table-light table-striped" >
            <thead>
                <tr >
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Isi Laporan</th>
                    <th scope="col">Bukti</th>
                </tr>
            </thead>
            <tbody >
                <?php
                function dekripsi_rot13($decrypt1){
                    for($i=0; $i < strlen($decrypt1); $i++){
                        $c = ord($decrypt1[$i]);
                        
                        if($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')){
                        $c -= 13;
                        }elseif($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')){
                        $c += 13;
                        }
                        $decrypt1[$i] = chr($c);
                    }
                    
                    return $decrypt1;
                }
                include 'config.php';
                $query = mysqli_query ($koneksi, "SELECT * from tb_laporan");
                $s=1;
                while ($data=mysqli_fetch_array($query))

                {?>

                <tr>
                <td> <?php echo $s++?></td>
                <td> <?php echo $data['judul_laporan'];?></td>
                <td> 
                    <?php 
                        $message = $data['isi_laporan'];

                        $cipher = "AES-256-CBC";
                        $secret = "12345678901234567890123456789012";
                        $option = 0;
                        $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

                        $decrypt1 = openssl_decrypt($message, $cipher, $secret, $option, $iv);
                        
                        $final = dekripsi_rot13($decrypt1);
                        echo $final;
                    ?>
                </td>
                <td>
                    <?php
            
                        $base64 = $data['gambar_laporan'];
                        echo '<img src="data:image/gif;base64,'.$base64.' "width="200" height="200" />';
                    ?>
                    
                </td>        
                </tr>
                <?php 
                }
                ?> 
            </tbody>
            </table>
            </center>
        </div>        
    </body>
</html>