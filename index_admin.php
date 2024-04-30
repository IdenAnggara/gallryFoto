<?php include 'koneksi.php'; session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website Galeri Foto</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
        <a class="navbar-brand" href="?url=home">Gallery Foto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="?url=home">Home</a>
            <?php if(isset($_SESSION['user_id'])): ?>
            <a class="nav-link" href="?url=upload">Data Foto</a>
            <a class="nav-link" href="?url=datauser">Data User</a>
            <a class="nav-link" href="?url=album">Data Album</a>
            <a href="?url=logout" class="nav-link">Logout</a>
            <a class="nav-link" style="margin-left : 520px; " href="?url=profile"><?= ucwords($_SESSION['username']) ?></a>
            <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
            <a class="nav-link" href="daftar.php">Daftar</a>
            <?php endif; ?>
        </form>
        </div>
        </div>
    </div>
    </nav>
    <?php 
        $url=@$_GET["url"];
        if($url=='home'){
            include 'admin/home.php';
        }elseif($url=='upload'){
            include 'admin/upload.php';
        }elseif($url=='profile'){
            include 'admin/profil.php';
        }else if($url=='datauser'){
            include 'admin/datauser.php';
        }else if($url=='album'){
            include 'admin/album.php';
        }else if($url=='like'){
            include 'admin/like.php';
        }else if($url=='komentar'){
            include 'admin/komentar.php';
        }else if($url=='detail'){
            include 'admin/detail.php';
        }else if($url=='kategori'){
            include 'admin/kategori.php';
        }else if($url=='logout'){
            session_destroy();
            header("Location: ?url=home");
        }else{
            include 'admin/home.php';
        }
    ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>