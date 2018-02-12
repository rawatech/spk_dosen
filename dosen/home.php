<?php
	session_start();

	if(!isset($_SESSION['nim'])){
		echo "<script>alert('Anda belum login');document.location='../index.php' </script> ";
	}else{

?>
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
    	include "../koneksi.php";
      $nim = $_SESSION['nim'];
      $qry = mysql_query("select * from user where username='$nim' and jenis='dosen'");
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


    <div class="container pt">
		<div class="row mt">

    <?php
      if (isset($_GET['aksi'])){

        $aksi = $_GET['aksi'];

        if($aksi=="daftar"){
          $sq = mysql_query("select status from tb_pengaturan where pengaturan='pendaftaran'");
          $st = mysql_fetch_array($sq);
          if($st['status']=="0"){
            echo "<script>alert('Pendaftaran belum dibuka');document.location='home.php' </script> ";            
          }else{

          $nim = $_SESSION['nim'];
          $cek = mysql_query("select * from dosen_peserta where nip='$nim'");
          $r = mysql_num_rows($cek);

          if ($r > 0){
            $b = mysql_fetch_array($cek);
            $tmp_alamat = $b['alamat'];
            $tmp_pend = $b['pendidikan'];
            $tmp_jabatan = $b['jabatan'];
          }else{
            $ins = mysql_query("insert into dosen_peserta (id_dosen, nip, nama) values ('', '$nim', '$us[nama]')");

            $tmp_alamat = "";
            $tmp_pend = "-- Pendidikan --";
            $tmp_jabatan = "-- Jabatan --";
          }
        }

          $sql = mysql_query("select * from user where username='$nim' and jenis='dosen'");
          $row = mysql_fetch_array($sql);

          ?>
            <div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Isi Biodata</h3>
              <hr>
              <form role="form" action="daftar_dosen.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nip" value="<?php echo $_SESSION['nim']; ?>" readonly="true">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="NameInputEmail1" placeholder="Username" name="nama" value="<?php echo $row['nama']; ?>" readonly="true">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"><?php echo $tmp_alamat; ?></textarea>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="pendidikan">
                    <?php
                      if ($tmp_pend==""){
                        ?> <option value=''>-- Pendidikan --</option><?php
                      }else{
                        echo "<option value='$tmp_pend'>$tmp_pend</option>";
                      }
                    ?>
                    <option value='S1'>Sarjana (S1)</option>
                    <option value='S2'>Magister (S2)</option>
                    <option value='S3'>Doktor (S3)</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleInputEmail1" name="jabatan">
                    <?php
                      if ($tmp_jabatan==""){
                        echo "<option value=''>-- Jabatan --</option>";  
                      }else{
                        echo "<option value='$tmp_jabatan'>$tmp_jabatan</option>";
                      }
                    ?>
                    <option value='Guru Besar'>Guru Besar</option>
                    <option value='Lektor Kepala'>Lektor Kepala</option>
                    <option value='Lektor'>Lektor</option>
                    <option value='Asisten Ahli'>Asisten Ahli</option>
                    <option value='Pengajar'>Pengajar</option>
                  </select>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Daftar">
              </form>  
            </div>
          </div>

          <?php
        }elseif($aksi=="nilai"){
          ?>

          <form action=nilai.php  method="POST">
            <div class="col-lg-6 col-lg-offset-3 centered">
              <h3>Pilih Dosen</h3>
              <hr>  
            </div>
          </div>
    <div class="row mt">  
      <div class="col-lg-8 col-lg-offset-2">
        <form role="form">
          <div class="form-group">
            <select class="form-control" id="exampleInputEmail1" name="dosen">
        <option value = "0">pilih dosen</option>
        <?php
        $sq = mysql_query("select status from tb_pengaturan where pengaturan='penilaian'");
          $st = mysql_fetch_array($sq);
          if($st['status']=="0"){
            echo "<script>alert('Penilaian belum dibuka');document.location='home.php' </script> ";            
          }

                    $sql = "select * from dosen_peserta";
                    $query = mysql_query($sql);
                    while($row = mysql_fetch_array($query)){
                      $cek = mysql_query("select * from nilai_dosen where nip='$nim' and id_dosen='$row[id_dosen]'");
                      $num = mysql_num_rows($cek);
                      if ($num > 0 ){
                        echo "<option value = '$row[id_dosen]'>$row[nama] (valued)</option>";
                      }else{
                        echo "<option value = '$row[id_dosen]'>$row[nama]</option>";
                      }
                    }
                    
                ?>
            </select>
          </div>
            <br>
          <input type="submit" class="btn btn-success" value="Pilih">
        </form>         
      </div>
      </form>

          <?php     
        
        }

      }else{


    ?>

      <div class="col-lg-12 col-lg-offset-0 centered">
        <h4>Pemilihan Hak User Dosen</h4>
        <hr>
        <p>
        Dalam sistem ini, dosen dapat menentukan pilihan hak usernya. Pilihan hak user dosen antara lain : <br>
        <b>1. Daftar sebagai Peserta </b>: Dosen mendaftarkan diri dalam pemilihan dosen terbaik dan tidak dapat melakukan penilaian terhadap dosen lain. <br>
        <b>2. Lakukan Penilaian </b> : Dosen melakukan penilaian terhadap dosen-dosen sejawat yang terdaftar sebagai peserta pemilihan dosen terbaik tetapi tidak dapat mendaftar sebagi peserta. <br>
        <br>
        <i>Note : Anda tidak bisa mengubah hak user dosen.</i>
        </p>
        <a href='?aksi=daftar' class='btn btn-success'><i class='fa fa-usd fa-2x'></i> Daftar sebagai Peserta</a>
        <a href='?aksi=nilai' class='btn btn-info'><i class='fa fa-credit-card fa-2x'></i> Lakukan Penilaian</a>
      </div>
      <?php
        }
      ?>

    
		
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
