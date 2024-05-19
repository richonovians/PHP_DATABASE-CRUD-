<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mata Kuliah</title>
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

        $kodeMK=input($_POST["kodeMK"]);
        $namaMK=input($_POST["namaMK"]);
        $sks=input($_POST["sks"]);
        $jam=input($_POST["jam"]);
        
        //Query input menginput data kedalam tabel t_matakuliah
        $query = "INSERT INTO t_matakuliah VALUES ('$kodeMK', '$namaMK', '$sks', '$jam')";

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
    <h2>Input Data Mata Kuliah</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Kode Mata Kuliah:</label>
            <input type="text" name="kodeMK" class="form-control" placeholder="Masukan Kode Mata Kuliah" required/>
        </div>
        <div class="form-group">
            <label>Nama Mata Kuliah:</label>
            <input type="text" name="namaMK" class="form-control" placeholder="Masukan Nama Mata Kuliah" required/>
        </div>
       <div class="form-group">
            <label>SKS :</label>
            <input type="text" name="sks" class="form-control" placeholder="Masukan SKS" required/>
        </div>
        <div class="form-group">
            <label>Jam:</label>
            <input type="text" name="jam" class="form-control" placeholder="Masukan Jam" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>