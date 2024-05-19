<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
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

        $npm=input($_POST["npm"]);
        $namaMhs=input($_POST["namaMhs"]);
        $prodi=input($_POST["prodi"]);
        $alamat=input($_POST["alamat"]);
        $noHP=input($_POST["noHP"]);

        //Query input menginput data kedalam tabel t_mahasiswa
        $query = "INSERT INTO t_mahasiswa VALUES ('$npm', '$namaMhs', '$prodi', '$alamat','$noHP')";

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
    <h2>Input Data Mahasiswa</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>NPM:</label>
            <input type="text" name="npm" class="form-control" placeholder="Masukan NPM" required/>
        </div>
        <div class="form-group">
            <label>Nama Mahasiswa:</label>
            <input type="text" name="namaMhs" class="form-control" placeholder="Masukan Nama Mahasiswa" required/>
        </div>
       <div class="form-group">
            <label>Prodi :</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan Program Studi" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="noHP" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>