<?php 
$foto_id=@$_GET["id"];
$user_id=@$_SESSION["UserID"];
$komen_id=@$_GET['KomentarID'];
$delete = mysqli_query($conn, "DELETE FROM komentar WHERE KomentarID='$komen_id'");
if ($delete > 0) {
       echo 'Komentar Gambar Berhasil di Hapus';
       echo '<meta http-equiv="refresh" content="0; url=?url=detail&&id='.@$komen_id.'">';
   } else {
       echo 'Komentar gagal di Hapus';
       echo '<meta http-equiv="refresh" content="0; url=?url=detail&&id='.@$komen_id.'">';
   }

?>
