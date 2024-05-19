<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Dosen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $idDosen=input($_POST["idDosen"]);
        $namaDosen=input($_POST["namaDosen"]);
        $noHP=input($_POST["noHP"]);

        //Query input menginput data kedalam tabel t_dosen
        $query = "INSERT INTO t_dosen VALUES (NULL, '$namaDosen', '$noHP')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($link, $query);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data Dosen</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Dosen:</label>
            <input type="text" name="namaDosen" class="form-control" placeholder="Masukan Nama Dosen" required/>
        </div>
       <div class="form-group">
            <label>No HP :</label>
            <input type="text" name="noHP" class="form-control" placeholder="Masukan No HP" required/>
        </div>  
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>