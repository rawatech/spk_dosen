<?php
$db="spk_dosen";

$koneksi=mysql_connect("localhost","root","");
if(!$koneksi){
	die ("koneksi ke database Gagal..");
}
//else echo "koneksi Berhasil";

$cek=mysql_select_db($db,$koneksi);
if(!$cek){
	die ("<br>Database Gagal di Temukan ");
}
//else echo "<br>Database Berhasil ditemukan";
?>
