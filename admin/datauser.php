<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data user</title>
</head>
<body>
    <h1>Data user</h1>

    <?php
         include 'koneksi.php';

         // Cek apakah parameter albumid ada dan merupakan bilangan bulat
         if (isset($_GET['hapus']) && isset($_GET['userid']) && is_numeric($_GET['userid'])) {
            // Gunakan fungsi mysqli_real_escape_string untuk menghindari SQL injection
            $userid = mysqli_real_escape_string($conn, $_GET['userid']);

            // Lakukan query delete
            $result = mysqli_query($conn, "DELETE FROM user WHERE UserID = '$userid'");

            // Periksa jika query berhasil atau tidak
            if ($result) {
               echo "Berhasil menghapus user";
               header("Location: ?url=datauser");
               exit();
            } else {
               echo "Gagal menghapus user.";
            }
         }
         ?>
                    
    <table class="table table-hovered">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>User name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Nama lengkap</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                        <?php
                        include 'koneksi.php';
                        $no = 1;
                        $data = mysqli_query($conn,"select * from user");
                        while($d = mysqli_fetch_array($data))
                        {
                        ?>
                        <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['Username']; ?></td>
                        <td><?php echo $d['Password']; ?></td>
                        <td><?php echo $d['Email']; ?></td>
                        <td><?php echo $d['NamaLengkap']; ?></td>
                        <td><?php echo $d['Alamat']; ?></td>
                        <td>
                        <a href="?url=datauser&&hapus&&userid=<?= $d['UserID'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
    </table>
</body>
</html>