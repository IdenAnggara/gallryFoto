<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data foto</title>
</head>
<body>
    <h1>Data Foto</h1>
                    
    <?php
         include 'koneksi.php';

         // Cek apakah parameter albumid ada dan merupakan bilangan bulat
         if (isset($_GET['hapus']) && isset($_GET['fotoid']) && is_numeric($_GET['fotoid'])) {
            // Gunakan fungsi mysqli_real_escape_string untuk menghindari SQL injection
            $fotoid = mysqli_real_escape_string($conn, $_GET['fotoid']);

            // Lakukan query delete
            $result = mysqli_query($conn, "DELETE FROM foto WHERE FotoID = '$fotoid'");

            // Periksa jika query berhasil atau tidak
            if ($result) {
               echo "Berhasil menghapus foto.";
               header("Location: ?url=upload");
               exit();
            } else {
               echo "Gagal menghapus foto.";
            }
         }
         ?>

    <table class="table table-hovered">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Judul Foto</th>
                        <th>Deskripsi Foto</th>
                        <th>Tanggal diunggah</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                        <?php
                        include 'koneksi.php';
                        $no = 1;
                        $data = mysqli_query($conn,"select * from foto");
                        while($d = mysqli_fetch_array($data))
                        {
                        ?>
                        <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['JudulFoto']; ?></td>
                        <td><?php echo $d['DeskripsiFoto']; ?></td>
                        <td><?php echo $d['TanggalUnggah']; ?></td>
                        <td><img src="uploads//<?php echo $d['NamaFile']; ?> ?>" style="max-width: 100px;"></td>
                        <td>
                        <a href="?url=upload&&hapus&&fotoid=<?= $d['FotoID'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
    </table>
</body>
</html>