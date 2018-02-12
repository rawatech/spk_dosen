<?php
	session_start();
	unset($_SESSION['nim']);
	echo "<script>alert('Logout berhasil ');document.location='../index.php' </script> ";	
?>