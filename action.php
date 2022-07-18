<?php

    include "koneksi.php";

//jika tombol simpan di klik
if (isset($_POST['bsave'])) {

     $save = mysqli_query($conn,"INSERT INTO table_barang(kode, nama, asal, jumlah, satuan, tgl_terima)
                                                                VALUES ('$_POST[tkode]',
                                                                        '$_POST[tnama]',
                                                                        '$_POST[t_asal]',
                                                                        '$_POST[tjumlah]',
                                                                        '$_POST[tsatuan]',
                                                                        '$_POST[ttanggal_terima]') ");
            if ($save) {
                 echo "<script>
                 alert('Data Saved!'),
                 document.location='index.php';
                 </script>";
            } else {
                 echo "<script>
                 alert('Data Not Saved!'),
                 document.location='index.php';
                 </script>";
            }
    }
    $vkode = "";
    $vnama = "";
    $vasal = "";
    $vjumlah = "";
    $vsatuan = "";
    $vtgl_terima = "";
    
    if(isset($_GET['hal'])) {
        //pengujian jika edit data
        if($_GET['hal'] == 'edit') {
            //menampilkan data yang akan di edit
            $tampil = mysqli_query($conn, "SELECT * FROM table_barang WHERE id_barang = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
              if($data) {
                 //jika data ditemukan maka di input ke dalam variable
                  $vkode = $data['kode'];
                  $vnama = $data['nama'];
                  $vasal = $data['asal'];
                  $vjumlah = $data['jumlah'];
                  $vsatuan = $data['satuan'];
                  $vtgl_terima = $data['tgl_terima'];
              }
        } else if ($_GET['hal'] == "hapus") {
            //persiapan hapus data
            $hapus = mysqli_query($conn, "DELETE FROM table_barang WHERE id_barang = '$_GET[id]' ");
            if ($hapus) {
                echo "<script>
                 alert('Hapus Data Sukses!'),
                 document.location='index.php';
                 </script>";
            } else {
                 echo "<script>
                 alert('Hapus Data Gagal!'),
                 document.location='index.php';
                 </script>";
            }
        }
    }
?>