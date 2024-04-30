<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Website Galeri Foto</title>
</head>
<body>

    <div class="container mt-4">
        <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari gambar..." name="search">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/1.jpg" class="container my-4 p-5 rounded" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="assets/img/2.jpg" class="container my-4 p-5 rounded"  alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="assets/img/3.jpg" class="container my-4 p-5 rounded" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row">
            <?php 
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $tampil=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID WHERE JudulFoto LIKE '%$search%'");
            foreach($tampil as $tampils):
            ?>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card">                    
                    <img src="uploads/<?= $tampils['NamaFile'] ?>" class="object-fit-cover" style="aspect-ratio: 16/9;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $tampils['JudulFoto'] ?></h5>
                        <p class="card-text text-muted">by: <?= $tampils['Username'] ?></p>
                        <a href="?url=detail&&id=<?= $tampils['FotoID'] ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
