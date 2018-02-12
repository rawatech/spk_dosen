<?php
	session_start();
	include "../koneksi.php";
	
	$nim = $_SESSION['nim'];
	$id_dos = $_POST['id_dosen'];

	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$rata = ($q1 + $q2 + $q3 + $q4 + $q5) / 5;

	$cek = mysql_query("select * from nilai_mhs where nim='$nim' and id_dosen='$id_dos'");
	$num = mysql_num_rows($cek);
	if ($num > 0 ){
		$query = "update nilai_mhs set q1='$q1', q2='$q2', q3='$q3', q4='$q4', q5='$q5', avg='$rata' where nim='$nim' and id_dosen='$id_dos'";
	}else{
		$query = "insert into nilai_mhs values ('', '$nim', '$id_dos', '$q1', '$q2', '$q3', '$q4', '$q5', '$rata')";
	}

	$sql = mysql_query($query);

	$j_sql = mysql_query("select * from nilai_mhs where id_dosen = '$id_dos'");
	$jml = mysql_num_rows($j_sql);
	$sql_nilai = mysql_query("select sum(avg) as avg from nilai_mhs where id_dosen = '$id_dos'");
	$n = mysql_fetch_array($sql_nilai);
	$q1 = $n['avg'];

	$c1 = $q1/$jml;

	$ins = mysql_query("update dosen_peserta set c1 = '$c1' where id_dosen = '$id_dos'");
	
	if ($sql) {
		echo "<script>alert('Data berhasil tersimpan');document.location='index.php' </script> ";
	}else {
		echo "<script>alert('Data gagal disimpan');document.location='index.php' </script> ";
	}

?>