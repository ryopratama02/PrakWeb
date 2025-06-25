<?php
include 'koneksi.php';
$kode_barang = $_GET['kode_barang'];
$query = "DELETE FROM barang WHERE kode_barang = $kode_barang";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>