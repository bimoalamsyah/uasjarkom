<?php
include "../functions/functions.php";

if ( isset($_POST["Submit"])){
    $idproduk = $_POST['idproduk'];
    $jumlah = $_POST['jumlah'];

        $data = mysqli_query($conn, "SELECT *FROM produk where id='$idproduk'");
        $sto = mysqli_fetch_array($data);
        $stok= $sto['stok'];

        //menghitung sisa stok
    $sisa = $stok - $jumlah;
    if($stok < $jumlah){
        ?>
        <script language="JavaScript">
            alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
            document.location='stok.php';
        </script>
        <?php
    }
        else {
            $insert = mysqli_query($conn, "INSERT INTO pesanan (idproduk, jumlah) VALUES ('$idproduk', '$jumlah')");
            if($insert){
                //update stok
                $upstok=mysqli_query($conn, "UPDATE produk SET stok='$sisa' WHERE id='$idproduk'");
                ?>
                    <script language="JavaScript">
                    alert('Good! Input transaksi pengeluaran barang berhasil ...');
                    document.location='stok.php';
                </script>
                <?php
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <div class="modal-body">
        <?php
            $no=0;
            $hasil=mysqli_query($conn, "SELECT *FROM produk ORDER BY namaproduk");
            echo '<select name="idproduk" class="form-control mt-2" required>';
            echo '<option value="">Pilih Produk</option>';
            while($rowbar=mysqli_fetch_array($hasil)){
                echo '<option value="'.$rowbar['id'].'">'.$rowbar['namaproduk'].' - '.$rowbar['harga'].'</option>';   
            }
            echo '</select>';
            ?>
        <input type="num" class="form-control mt-2" name="jumlah" placeholder="Jumlah Order">
        <input type="submit" name="Submit" value ="Submit"/>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
    </form>

</body>
</html>