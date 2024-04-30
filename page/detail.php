<?php 
$details=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID WHERE foto.FotoID='$_GET[id]'");
$data=mysqli_fetch_array($details);
$likes=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$_GET[id]'"));
$cek=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$_GET[id]' AND UserID='".@$_SESSION['user_id']."'"));

//ambil data komentar
$komenid = @$_GET["KomentarID"];
$submit = @$_POST['submit'];
$komentar = @$_POST['komentar']; // Ubah dari 'IsiKomentar' ke 'komentar'
$fotoid = @$_POST['foto_id']; 
$tanggal=date('Y-m-d');// Ubah dari 'FotoID' ke 'foto_id'
$userid = @$_SESSION['user_id']; // Ubah dari 'UserID' ke 'user_id'

if ($submit == 'Kirim') {
    $komen = mysqli_query($conn, "INSERT INTO komentar VALUES('', '$fotoid', '$userid', '$komentar', '$tanggal')");
    if ($komen) {
        header("Location: ?url=detail&id=$fotoid");
    } else {
        echo "Gagal menambahkan komentar.";
    }
} elseif ($submit == 'Edit') {
    // Handle Edit
}

if (isset($_GET['hapus']) && isset($_GET['KomentarID']) && is_numeric($_GET['KomentarID'])) {
    $komentarid = mysqli_real_escape_string($conn, $_GET['KomentarID']);
    $user_id = $_SESSION['user_id'];

    // Ambil UserID pemilik komentar
    $result = mysqli_query($conn, "SELECT UserID FROM komentar WHERE KomentarID = '$komentarid'");
    $row = mysqli_fetch_assoc($result);
    $owner_id = $row['UserID'];

    // Periksa apakah pengguna adalah pemilik komentar
    // ...
if ($user_id == $owner_id) {
   // Lakukan query DELETE
   $result_delete = mysqli_query($conn, "DELETE FROM komentar WHERE KomentarID = '$komentarid'");

   // Periksa apakah query berhasil
   if ($result_delete) {
       // Redirect kembali ke halaman detail
       header("Location: ?url=detail&id={$_GET['id']}");
       exit();
   } else {
       echo "Gagal menghapus komentar.";
   }
}
// ...

}

?>
<div class="container">
   <div class="row">
      <div class="col-6">
         <div class="card">
            <img src="uploads/<?= $data['NamaFile'] ?>" alt="<?= $data['JudulFoto'] ?>" class="object-fit-cover">
            <div class="card-body">
               <h3 class="card-title mb-0"><?= $data['JudulFoto'] ?> <a href="<?php if(isset($_SESSION['user_id'])) {echo '?url=like&&id='.$data['FotoID'].'';}else{echo 'login.php';} ?>" class="btn btn-sm <?php if($cek==0){echo "text-secondary";}else{echo "text-danger";} ?> "><i class="fa-solid fa-fw fa-heart"></i> <?= $likes ?></a></h3>
               <small class="text-muted mb-3">by:<?= $data['Username'] ?>, <?= $data['TanggalUnggah'] ?></small>
               <p><?= $data['DeskripsiFoto'] ?></p>
               <form action="?url=detail" method="post">
                  <div class="form-group d-flex flex-row">
                     <input type="hidden" name="foto_id" value="<?= $data['FotoID'] ?>">
                     <a href="?url=home" class="btn btn-secondary">Kembali</a>
                     <?php if(isset($_SESSION['user_id'])): ?>
                        <input type="text" class="form-control" name="komentar" required placeholder="Masukan Komentar">
                        <input type="submit" value="Kirim" name="submit" class="btn btn-secondary">
                     <?php endif; ?>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div >
         <?= @$alert ?>
         <?php 
         $UserID=@$_SESSION["user_id"]; 
         $komen=mysqli_query($conn, "SELECT * FROM komentar INNER JOIN user ON komentar.UserID=user.UserID INNER JOIN foto ON komentar.FotoID=foto.FotoId WHERE komentar.FotoID='$_GET[id]'");
         foreach($komen as $komens): ?>
            <p class="mb-0 fw-bold"><?= $komens['Username'] ?></p>
            <p class="mb-1"><?= $komens['IsiKomentar'] ?></p>
            <p class="text-muted small mb-0"><?= $komens['TanggalKomentar'] ?>
            <a href="?url=detail&id=<?= $data['FotoID'] ?>&hapus&KomentarID=<?= $komens['KomentarID'] ?>" class="btn btn-sm btn-danger">Hapus</a>
            </p>
            <hr>
         <?php endforeach; ?>
      </div>
   </div>
</div>