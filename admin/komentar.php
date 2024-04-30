<?php
include 'koneksi.php' session_start();

// Cek apakah parameter hapus, komentarid, dan user_id ada dan merupakan bilangan bulat
if (isset($_GET['hapus']) && isset($_GET['komentarid']) && isset($_SESSION["user_id"]) && is_numeric($_GET['komentarid']) && is_numeric($_SESSION["user_id"])) {
    // Gunakan fungsi mysqli_real_escape_string untuk menghindari SQL injection
    $komentarid = mysqli_real_escape_string($conn, $_GET['komentarid']);
    $user_id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);

    // Lakukan query untuk mendapatkan user id pemilik komentar
    $result = mysqli_query($conn, "SELECT UserID FROM komentar WHERE KomentarID = '$komentarid'");
    $row = mysqli_fetch_assoc($result);
    $owner_id = $row['UserID'];

    // Periksa apakah user yang ingin menghapus komentar adalah pemilik komentar
    if ($user_id == $owner_id) {
        // Lakukan query delete
        $result_delete = mysqli_query($conn, "DELETE FROM komentar WHERE KomentarID = '$komentarid'");

        // Periksa jika query berhasil atau tidak
        if ($result_delete) {
            // Redirect kembali ke halaman yang sama
            header("Location: ?url=detail " );
            exit();
        } else {
            echo "Gagal menghapus komentar.";
        }
    } else {
        echo "Anda tidak memiliki akses untuk menghapus komentar ini.";
    }
}
?>