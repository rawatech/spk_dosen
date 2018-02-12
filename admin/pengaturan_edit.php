<?php
	session_start();
	include "../koneksi.php";

	$r_pd = $_POST['r_pd'];
	$r_pn = $_POST['r_pn'];
	$r_pm = $_POST['r_pm'];
		
	$query = mysql_query("update tb_pengaturan set status = '$r_pd' where pengaturan='pendaftaran'");

	$query2 = mysql_query("update tb_pengaturan set status = '$r_pn' where pengaturan='penilaian'");

	$query3 = mysql_query("update tb_pengaturan set status = '$r_pm' where pengaturan='pengumuman'");

	if($query==1 && $query2==1 && $query3==1){
		echo "<script>alert('Pengaturan berhasil diubah');document.location='index.php?ap=pengaturan' </script> ";
	}else {
		echo mysql_error();
		//echo "<script>alert('Gagal mengubah pengaturan');document.location='index.php?ap=pengaturan' </script> ";
	}

?>