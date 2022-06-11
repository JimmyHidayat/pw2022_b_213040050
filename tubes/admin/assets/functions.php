<?php
function Koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'db_dropdeer') or die('KONEKSI GAGAL!!'); // dipanggil saat dibutuhkan

    return $conn;
}
function query($query)
{
    $conn = Koneksi();
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Siapkan data $produk
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }

    return $rows;
}
function hapus($id)
{
    $conn = koneksi();
    // Query produk Berdasarkan id
    $mhs = query("SELECT * FROM produk WHERE id = '$id'")[0];
    // Cek Jika Gambar Default
    if ($mhs["gambar"] !== 'nophoto.jpg') {

        unlink('img/' . $mhs["gambar"]);
        mysqli_query($conn, "DELETE FROM produk WHERE id = '$id'") or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
}

function ubah($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $gambar = htmlspecialchars($data["gambar"]);
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $rate = htmlspecialchars($data["rate"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE produk SET
        gambar = '$gambar',
        namaproduk = '$namaproduk',
        deskripsi = '$deskripsi',
        rate = '$rate',
        gambar = '$gambar',
        WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}
