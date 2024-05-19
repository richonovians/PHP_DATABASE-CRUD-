<!DOCTYPE html>
<html>
<head>
<title>CRUD</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">CRUD by RICHO NOVIAN S</span>
    </nav>
    <div class="container">
        <br>
        <h4><center>DATA DOSEN</center></h4>
        <form class="form-inline my-2 my-lg-0" method="GET" action="">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Dosen" name="searchDosen" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php
        include "koneksi.php";

        // Handle delete request
        if (isset($_GET['idDosen'])) {
            $idDosen = htmlspecialchars($_GET["idDosen"]);
            $query = "DELETE FROM t_dosen WHERE idDosen='$idDosen'";
            $hasil = mysqli_query($link, $query);
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }

        // Handle search request
        $searchDosen = isset($_GET['searchDosen']) ? htmlspecialchars($_GET['searchDosen']) : '';
        $query = "SELECT * FROM t_dosen WHERE namaDosen LIKE '%$searchDosen%' ORDER BY idDosen ASC";
        $result = mysqli_query($link, $query);
        ?>
        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>ID Dosen</th>
                    <th>Nama Dosen</th>
                    <th>No HP</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $data["idDosen"]; ?></td>
                    <td><?php echo $data["namaDosen"]; ?></td>
                    <td><?php echo $data["noHP"]; ?></td>
                    <td>
                        <a href="sk_editDosen.php?idDosen=<?php echo htmlspecialchars($data['idDosen']); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?idDosen=<?php echo $data['idDosen']; ?>" class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="sk_inputdosen.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>

    <div class="container">
        <br>
        <h4><center>DATA MAHASISWA</center></h4>
        <form class="form-inline my-2 my-lg-0" method="GET" action="">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Mahasiswa" name="searchMahasiswa" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php
        include "koneksi.php";

        // Handle delete request
        if (isset($_GET['npm'])) {
            $npm = htmlspecialchars($_GET["npm"]);
            $query = "DELETE FROM t_mahasiswa WHERE npm='$npm'";
            $hasil = mysqli_query($link, $query);
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }

        // Handle search request
        $searchMahasiswa = isset($_GET['searchMahasiswa']) ? htmlspecialchars($_GET['searchMahasiswa']) : '';
        $query = "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE '%$searchMahasiswa%'";
        $result = mysqli_query($link, $query);
        ?>
        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $data["npm"]; ?></td>
                    <td><?php echo $data["namaMhs"]; ?></td>
                    <td><?php echo $data["prodi"]; ?></td>
                    <td><?php echo $data["alamat"]; ?></td>
                    <td><?php echo $data["noHP"]; ?></td>
                    <td>
                        <a href="sk_editMhs.php?npm=<?php echo htmlspecialchars($data['npm']); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?npm=<?php echo $data['npm']; ?>" class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="sk_inputMhs.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>

    <div class="container">
        <br>
        <h4><center>DATA MATA KULIAH</center></h4>
        <form class="form-inline my-2 my-lg-0" method="GET" action="">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Mata Kuliah" name="searchMatkul" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php
        include "koneksi.php";

        // Handle delete request
        if (isset($_GET['kodeMK'])) {
            $kodeMK = htmlspecialchars($_GET["kodeMK"]);
            $query = "DELETE FROM t_matakuliah WHERE kodeMK='$kodeMK'";
            $hasil = mysqli_query($link, $query);
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }

        // Handle search request
        $searchMatkul = isset($_GET['searchMatkul']) ? htmlspecialchars($_GET['searchMatkul']) : '';
        $query = "SELECT * FROM t_matakuliah WHERE namaMK LIKE '%$searchMatkul%'";
        $result = mysqli_query($link, $query);
        ?>
        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Jam</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $data["kodeMK"]; ?></td>
                    <td><?php echo $data["namaMK"]; ?></td>
                    <td><?php echo $data["sks"]; ?></td>
                    <td><?php echo $data["jam"]; ?></td>
                    <td>
                        <a href="sk_editMK.php?kodeMK=<?php echo htmlspecialchars($data['kodeMK']); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?kodeMK=<?php echo $data['kodeMK']; ?>" class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="sk_inputMK.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>
</html>
