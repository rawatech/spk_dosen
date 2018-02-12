<?php

	if(isset($_GET['ap'])){
		$ap = $_GET['ap'];
		
		if ($ap=="data_dosen"){
			include "konten/data_dosen.php";
		}

		if($ap=="login"){
			include "konten/login.php";
		}

		if($ap=="pengumuman"){
			include "konten/pemenang.php";
		}

	}else{
		include "home.php";
	}

?>