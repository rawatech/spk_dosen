<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../../docs-assets/ico/favicon.png">

    <title>SPK Dosen Terbaik </title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/hover.zoom.js"></script>
    <script src="../assets/js/hover.zoom.conf.js"></script>
    <?php
    	session_start();
    	include "../koneksi.php";
      	$nim = $_SESSION['nim'];
      	$qry = mysql_query("select * from user where username='$nim' and jenis='pimpinan'");
      	$us = mysql_fetch_array($qry);
    ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SPK Dosen Terbaik</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          	<li><a href=""><?php echo "-- " . $us['nama'] . " ($us[jenis]) -- ";?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <?php
    if($_POST['dosen']=="0"){
    		echo "<script>alert('Dosen belum dipilih');document.location='index.php' </script> ";
    	}else{
    	$dosen = $_POST['dosen'];

		$sql = mysql_query("select * from dosen_peserta where id_dosen = '$dosen'");
		$row = mysql_fetch_array($sql);

	?>

    <div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3><?php echo $row['nama'];?> </h3>
				<hr>
			</div>
		</div>
		<div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
				<form action="input_nilai.php" method="post">
	<?php
		echo "<input type='hidden' value= '$dosen' name='id_dosen'>";
		$cek = mysql_query("select * from nilai_pimpinan where nip='$nim' and id_dosen='$dosen'");
		$num = mysql_num_rows($cek);
		$q1 = 0;
		$q2 = 0;
		$q3 = 0;
		$q4 = 0;
		$q5 = 0;
		if ($num > 0 ){
			$row = mysql_fetch_array($cek);
			$q1 = $row['q1'];
			$q2 = $row['q2'];
			$q3 = $row['q3'];
			$q4 = $row['q4'];
			$q5 = $row['q5'];
		}
	?>
	Kesungguhan Dalam Mempersiapkan Perkuliahan<br>
	<input type="radio" name="q1" value="5" <?php if($q1==5) echo "checked"; ?>>Sangat Baik<br/>
	<input type="radio" name="q1" value="4" <?php if($q1==4) echo "checked"; ?>>Baik<br/>
	<input type="radio" name="q1" value="3" <?php if($q1==3) echo "checked"; ?>>Cukup<br/>
	<input type="radio" name="q1" value="2" <?php if($q1==2) echo "checked"; ?>>Kurang<br/>
	<input type="radio" name="q1" value="1" <?php if($q1==1) echo "checked"; ?>>Sangat Kurang<br/>

	<br>Kemampuan Membimbing Mahasiswa<br>
	<input type="radio" name="q2" value="5" <?php if($q2==5) echo "checked"; ?>>Sangat Baik<br/>
	<input type="radio" name="q2" value="4" <?php if($q2==4) echo "checked"; ?>>Baik<br/>
	<input type="radio" name="q2" value="3" <?php if($q2==3) echo "checked"; ?>>Cukup<br/>
	<input type="radio" name="q2" value="2" <?php if($q2==2) echo "checked"; ?>>Kurang<br/>
	<input type="radio" name="q2" value="1" <?php if($q2==1) echo "checked"; ?>>Sangat Kurang<br/>

	<br>Penguasaan Bidang Keahlian yang Menjadi Tugas Pokoknya<br>
	<input type="radio" name="q3" value="5" <?php if($q3==5) echo "checked"; ?>>Sangat Baik<br/>
	<input type="radio" name="q3" value="4" <?php if($q3==4) echo "checked"; ?>>Baik<br/>
	<input type="radio" name="q3" value="3" <?php if($q3==3) echo "checked"; ?>>Cukup<br/>
	<input type="radio" name="q3" value="2" <?php if($q3==2) echo "checked"; ?>>Kurang<br/>
	<input type="radio" name="q3" value="1" <?php if($q3==1) echo "checked"; ?>>Sangat Kurang<br/>

	<br>Kewibawaan Sebagai Pribadi Dosen<br>
	<input type="radio" name="q4" value="5" <?php if($q4==5) echo "checked"; ?>>Sangat Baik<br/>
	<input type="radio" name="q4" value="4" <?php if($q4==4) echo "checked"; ?>>Baik<br/>
	<input type="radio" name="q4" value="3" <?php if($q4==3) echo "checked"; ?>>Cukup<br/>
	<input type="radio" name="q4" value="2" <?php if($q4==2) echo "checked"; ?>>Kurang<br/>
	<input type="radio" name="q4" value="1" <?php if($q4==1) echo "checked"; ?>">Sangat Kurang<br/>

	<br>Mudah Bergaul di Kalangan Sejawat, Karyawan, dan Mahasiswa<br>
	<input type="radio" name="q5" value="5" <?php if($q5==5) echo "checked"; ?>>Sangat Baik<br/>
	<input type="radio" name="q5" value="4" <?php if($q5==4) echo "checked"; ?>>Baik<br/>
	<input type="radio" name="q5" value="3" <?php if($q5==3) echo "checked"; ?>>Cukup<br/>
	<input type="radio" name="q5" value="2" <?php if($q5==2) echo "checked"; ?>>Kurang<br/>
	<input type="radio" name="q5" value="1" <?php if($q5==1) echo "checked"; ?>>Sangat Kurang<br/>

	<br><input type="submit" name="enter" value="Enter" class="btn btn-success">  
</form>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
	
	<!-- +++++ Footer Section +++++ -->
	
	<div id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h4>Universitas </h4>
          <p>
            Jl. Pendidikan, Kec. Teknik Informatika, <br/>
            Tutorial Open Source Aplikasi Indonesia, <br/>
            Telp. (06xx) - 755xxxx
          </p>
        </div><!-- /col-lg-4 -->
      </div>
    
    </div>
  </div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>