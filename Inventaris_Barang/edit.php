<?php
include 'koneksi.php';
$kode_barang = $_GET['kode_barang'];
$result = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang = $kode_barang");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 30px;
        background-color: #f3f4f6;
        margin: 0;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        max-width: 480px;
        margin: auto;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
        font-size: 22px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #444;
        font-size: 14px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        transition: border 0.2s;
    }

    input:focus,
    textarea:focus {
        border-color: #007BFF;
        outline: none;
    }

    input[type="submit"] {
        background-color:rgb(0, 0, 255);
        color: white;
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 10px;
        transition: background-color 0.2s;
    }

    input[type="submit"]:hover {
        background-color:rgb(0, 0, 186);
    }

    a {
        display: block;
        margin-top: 20px;
        color:rgb(0, 0, 255);
        text-align: center;
        text-decoration: none;
        font-size: 14px;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Barang</h2>
        <form method="post">
            <label>Nama Barang:</label>
            <input type="text" name="nama_barang" required>

            <label>Kategori:</label>
            <input type="text" name="kategori" required>

            <label>Jumlah:</label>
            <input type="number" name="jumlah" required>

            <label>Harga:</label>
            <input type="number" name="harga" required>

            <input type="submit" name="update" value="Update">
        </form>

        <a href="index.php" class="button-back">Lihat Daftar Barang</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $query = "UPDATE barang SET 
                nama_barang='$nama_barang', kategori='$kategori', jumlah='$jumlah',
                harga='$harga'
              WHERE kode_barang = $kode_barang";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
