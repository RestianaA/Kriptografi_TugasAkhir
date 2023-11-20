<?php 
    include "config.php";

    $judul_lapor = $_POST['judullaporan'];
    $comment= $_POST['isilaporan'];
    $file= $_POST['gambarlaporan'];

    // enkripsi gambar
    $filecontent = file_get_contents($file);
    $base64 = rtrim(base64_encode($filecontent));

    function Rot13($comment){
        for($i=0; $i < strlen($comment); $i++){
            $c = ord($comment[$i]);
            
            if($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')){
            $c -= 13;
            }elseif($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')){
            $c += 13;
            }
            $comment[$i] = chr($c);
        }
        
        return $comment;
    }
    $rot13 = Rot13($comment);
    //echo $rot13;
    

        $cipher = "AES-256-CBC";
        $secret = "12345678901234567890123456789012";
        $option = 0;
        $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

        $ciphertext = openssl_encrypt($rot13, $cipher, $secret, $option, $iv);
     
        $query = mysqli_query($koneksi, "INSERT INTO tb_laporan VALUES ('', '$judul_lapor', '$ciphertext', '$base64')") or die (mysqli_error($connection));

    if($query){
        echo "
            <script>
                alert('Laporan akan segera diproses.');
                document.location.href = 'index.php';
            </script>
        ";
    }
    else {
            echo "Gagal memproses laporan";
    }
    
?>