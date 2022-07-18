<?php
  //melakukan include atau memanggil file koneksi.php serta action.php untuk disatukan ke dalam file index.php
  include "koneksi.php";
  include "action.php";
?>

<!-- arsitektur html dan interface -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Inventaris Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <!-- first container -->
    <div class="container">
        <h3 class="text-center">Data Inventaris</h3>
        <h3 class="text-center">Kantor PT ZTE Indonesia</h3>

    <!-- awal row-->
        <div class="row">
            <!-- awal card-->
        <div class="col-md-8 mx-auto">
            <div class="card">
            <div class="card-header bg-info text-light">
                Form aplikasi input data barang
            </div>
            <div class="card-body">
                <!-- awal form-->
                <form method="POST" action="action.php">

                  <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" name="tkode" value="<?=$vkode?>" placeholder="Input kode barang">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="tnama" value="<?=$vnama?>" placeholder="Input nama barang">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Asal Barang</label>
                    <select class="form-select" name="t_asal">
                        <option  value="<?= $vasal ?>"><?= $vasal?></option>
                        <option value="beli">pembelian</option>
                        <option value="hibah">hibah</option>
                        <option value="garansi">garansi</option>
                        <option value="pinjam">pinjaman</option>
                  </select>
                  </div>

                  <div class="row">
                    <div class="col">
                        <div class="mb-3">         
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="tjumlah" value="<?=$vjumlah?>"placeholder="jumlah barang">
                    </div>
                </div>
                    <div class="col">
                        <div class="mb-3">         
                            <label class="form-label">Satuan</label>
                            <select class="form-select" name="tsatuan">
                                <option value="<?=$vsatuan?>"><?= $vsatuan?> </option>
                                <option value="unit">unit</option>
                                <option value="pcs">pcs</option>
                                <option value="pack">pack</option>
                                <option value="kontainer">kontainer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="ttanggal_terima" value="<?=$vtgl_terima?>">
                        </div>
                    </div>
                    <div class="text-center">
                        <hr>
                        <button class="btn btn-primary" name="bsave" type="submit">Save</button>
                        <button class="btn btn-danger" name="bremove" type="reset">Kosongkan</button>
                    </div>
                  </div>
                </form>
                <!-- akhir form-->
            </div>
            <div class="card-footer bg-info text-light">
            
                </div>
             </div>
            <!-- akhir card-->
        </div>
    </div>
      <!-- akhir row-->

        <!-- card ke 2-->    
        <div class="card mt-3">
            <div class="card-header bg-info text-light">
                Data barang
            </div>

            <div class="card-body">
                <div class="col-md-6 mx-auto">
                  <form method="POST">
                    <div class="input-group mb-3">
                      <Input type="text" name="tcari" class="form-control" placeholder="input keyword!">
                      <button class="btn btn-primary" name="bcari" type="submit">Search</button>
                      <button class="btn btn-danger" name="bhapus" type="submit">Delete</button>
                  </div>
                  </form>
                </div>

                <table class="table table-striped table-hover table-border" >
                    <tr> 
                      <th>No.</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Asal Barang</th>
                      <th>Jumlah</th>
                      <th>Tanggal terima</th>
                      <th>Aksi</th>
                    </tr>
                    <?php 
                    $num = 1;
                    include "mysql_mysqli.inc.php";
                    $show = mysqli_query($conn, "SELECT * FROM table_barang order by id_barang DESC");
                    while($data =mysqli_fetch_array($show)) :
                    ?>
                      <tr>
                        <td><?= $num++?></td>
                        <td><?= $data['kode']?></td>
                        <td><?= $data['nama']?></td>
                        <td><?= $data['asal']?></td>
                        <td><?= $data['jumlah']?> <?= $data['satuan']?></td>
                        <td><?= $data['tgl_terima']?></td>
                        <td>
                           <a href="index.php?hal=edit&id=<?= $data['id_barang'] ?>" class="btn btn-warning">Edit</a>

                           <a href="index.php?hal=hapus&id=<?= $data['id_barang'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php endwhile; ?>

                </table>
            </div>
            <div class="card-footer bg-info text-light">
            </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>