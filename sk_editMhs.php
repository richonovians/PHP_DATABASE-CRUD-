<!DOCTYPE html>
<html>
<head>
    <title>Update Data Mahasiswa</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama npm
    if (isset($_GET['npm'])) {
        $npm=input($_GET["npm"]);

        $query = "SELECT * FROM t_mahasiswa WHERE npm=$npm";
        $hasil=mysqli_query($link ,$query);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $old_npm=htmlspecialchars($_POST["old_npm"]);
        $npm=htmlspecialchars($_POST["npm"]);
        $namaMhs=input($_POST["namaMhs"]);
        $prodi=input($_POST["prodi"]);
        $alamat=input($_POST["alamat"]);
        $noHP=input($_POST["noHP"]);
    
        //Query update data pada tabel t_mahasiswa
        $query="UPDATE t_mahasiswa SET
            npm='$npm',
            namaMhs='$namaMhs',
            prodi='$prodi',
            alamat='$alamat',
            noHP='$noHP'
            WHERE npm=$old_npm";
    
        //Mengeksekusi atau menjalankan query diatas
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
    <h2>Update Data Mahasiswa</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>NPM:</label>
            <input type="text" name="npm" class="form-control" placeholder="Masukan NPM" required value="<?php echo $data['npm'];?>" />
        </div>
        <div class="form-group">
            <label>Nama Mahasiswa:</label>
            <input type="text" name="namaMhs" class="form-control" placeholder="Masukan Nama Mahasiswa" required/>
        </div>
        <div class="form-group">
            <label>Program Studi:</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukan Program Studi" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="noHP" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <input type="hidden" name="old_npm" value="<?php echo $data['npm'];?>"/>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>