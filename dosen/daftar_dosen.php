<?php
	session_start();
	include "../koneksi.php";
	
	$nip = $_POST['nip'];
	$alamat = $_POST['alamat'];
	$pendidikan = $_POST['pendidikan'];
	$jabatan = $_POST['jabatan'];

	if($pendidikan=="S1"){
		$c4=1;	
	}else if ($pendidikan=="S2"){
		$c4=3;
	}else if ($pendidikan=="S3"){
		$c4=5;
	}else{
		$c4=1;
	}

	if($jabatan=="Guru Besar"){
		$c10=5;
	}else if($jabatan=="Lektor Kepala"){
		$c10=4;
	}else if($jabatan=="Lektor"){
		$c10=3;
	}else if($jabatan=="Asisten Ahli"){
		$c10=2;
	}else if($jabatan=="Pengajar"){
		$c10=1;
	}else{
		$c10=1;
	}


	$sql = mysql_query("update dosen_peserta set alamat = '$alamat', pendidikan = '$pendidikan', jabatan='$jabatan', c4='$c4', c10='$c10' where nip='$nip'");


	if ($sql) {
		echo "<script>alert('Data berhasil tersimpan');document.location='home.php?aksi=daftar' </script> ";
	}else {
		echo "<script>alert('Data gagal disimpan');document.location='index.php' </script> ";
	}

?>