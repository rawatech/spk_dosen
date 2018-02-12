<?php
	session_start();
	include "../koneksi.php";
	
	$id_dos = $_POST['id_dosen'];

	$jml_pn = $_POST['jml_pn'];
	$jml_jia = $_POST['jml_jia'];
	$jml_ji = $_POST['jml_ji'];
	$jml_jna = $_POST['jml_jna'];
	$jml_jn = $_POST['jml_jn'];
	$jml_jl = $_POST['jml_jl'];
	$jml_pl = $_POST['jml_pl'];
	$jml_sm = $_POST['jml_sm'];
	$jml_pg = $_POST['jml_pg'];

	if ($jml_pn!="" && $jml_pl!="" && $jml_sm!="" && $jml_pg!=""){
		if($jml_jia!="" || $jml_ji!="" || $jml_jna!="" || $jml_jn!="" || $jml_jl!=""){
			$cek = mysql_query("select * from data_lppm where id_dosen='$id_dos'");
			$num = mysql_num_rows($cek);
			if ($num > 0 ){
				$query = "update data_lppm set jml_pn='$jml_pn', jml_jia='$jml_jia', jml_ji='$jml_ji', jml_jna='$jml_jna', jml_jn='$jml_jn', jml_jl='$jml_jl', jml_pl='$jml_pl', jml_sm='$jml_sm', jml_pg='$jml_pg' where id_dosen='$id_dos'";
			}else{
				$query = "insert into data_lppm values ('', '$id_dos', '$jml_pn', '$jml_jia', '$jml_ji', '$jml_jna', '$jml_jn', '$jml_jl', '$jml_pl', '$jml_sm', '$jml_pg')";
			}

			$sql = mysql_query($query);

			if($jml_pn>=4){
				$c5=5;
			}else if($jml_pn==3){
				$c5=4;
			}else if($jml_pn==2){
				$c5=3;
			}else if($jml_pn==1){
				$c5=2;
			}else if($jml_pn==0){
				$c5=1;
			}else{
				$c5=1;
			}

			if($jml_pl>=4){
				$c7=5;
			}else if($jml_pl==3){
				$c7=4;
			}else if($jml_pl==2){
				$c7=3;
			}else if($jml_pl==1){
				$c7=2;
			}else if($jml_pl==0){
				$c7=1;
			}else{
				$c7=1;
			}

			if($jml_sm>=4){
				$c8=5;
			}else if($jml_sm==3){
				$c8=4;
			}else if($jml_sm==2){
				$c8=3;
			}else if($jml_sm==1){
				$c8=2;
			}else if($jml_sm==0){
				$c8=1;
			}else{
				$c8=1;
			}

			if($jml_pg>=4){
				$c9=5;
			}else if($jml_pg==3){
				$c9=4;
			}else if($jml_pg==2){
				$c9=3;
			}else if($jml_pg==1){
				$c9=2;
			}else if($jml_pg==0){
				$c9=1;
			}else{
				$c9=1;
			}

			if($jml_jia>=1){
				$c6=5;
			}else if($jml_jna>=3){
				$c6=4;
			}else if($jml_jna<3 && $jml_jna>0 || $jml_ji>=1 || $jml_jn>=3){
				$c6=3;
			}else if($jml_jn<3 && $jml_jn>0 || $jml_jl>=3){
				$c6=2;
			}else if($jml_jl<3 && $jml_jl>0){
				$c6=1;
			}else{
				$c6=1;
			}

			$nilai = mysql_query("update dosen_peserta set c5='$c5', c6='$c6', c7='$c7', c8='$c8', c9='$c9' where id_dosen='$id_dos'");
		
			if ($sql) {
				echo "<script>alert('Data berhasil tersimpan');document.location='index.php' </script> ";
			}else {
				echo "<script>alert('Data gagal disimpan');document.location='index.php' </script> ";
			}
		}else{
			echo "<script>alert('Data Jurnal belum diisi');document.location='index.php' </script> ";
		}
	}else{
		echo "<script>alert('Data Kualifikasi Penelitian Dosen belum lengkap');document.location='index.php' </script> ";
	}

	

?>