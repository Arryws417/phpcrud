<!-- koneksi ke php-->
<?php
  //variabel untuk koneksi ke db
   $server = "localhost";
   $user = "root";
   $password = "";
   $database = "dbcrudwshop";

  //menghubungkan koneksi ke db
  $conn = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($conn));

?>
