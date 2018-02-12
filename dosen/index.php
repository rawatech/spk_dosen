<?php
session_start();
include "../koneksi.php";
      $nim = $_SESSION['nim'];
      $qry = mysql_query("select * from user where username='$nim' and jenis='mahasiswa'");
      $us = mysql_fetch_array($qry);

  $cek = mysql_query("select * from nilai_dosen where nip='$nim'");
      $r = mysql_num_rows($cek);
      if ($r > 0){
        header("Location: http://localhost/desri_spk/dosen/home.php?aksi=nilai");
      }else if ($r == 0){
        $cek_p = mysql_query("select * from dosen_peserta where nip='$nim'");
        $rp = mysql_num_rows($cek_p);
        if ($rp > 0){
          header("Location: http://localhost/desri_spk/dosen/home.php?aksi=daftar");
        }else{
          header("Location: http://localhost/desri_spk/dosen/home.php");
        }
      }

?>