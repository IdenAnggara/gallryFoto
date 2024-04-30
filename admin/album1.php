
      <div class="col-7">
         <div class="card">
            <div class="card-body">
               <table class="table table-hovered">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Album</th>
                        <th>Deskripsi Album</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $i=1;
                     $userid=@$_SESSION['user_id'];
                     $albums=mysqli_query($conn, "SELECT * FROM album WHERE UserID='$userid'");
                     foreach($albums as $album):
                     ?>
                     <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $album['NamaAlbum'] ?></td>
                        <td><?= $album['Deskripsi'] ?></td>
                        <td><?= $album['TanggalDibuat'] ?></td>
                        <td>
                           <a href="?url=kategori&&albumid=<?= $album['AlbumID'] ?>" class="btn btn-sm btn-success">Lihat Foto</a>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>