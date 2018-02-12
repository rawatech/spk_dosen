<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Pengaturan</h3>
			</div>
		</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Pengaturan Sistem</div>
					<div class="panel-body">
					<?php
					$cek = mysql_query("select status from tb_pengaturan where pengaturan='pendaftaran'");
					$row = mysql_fetch_array($cek);
					if ($row['status']=="0"){
						$pd=0;
					}else if ($row['status']=="1"){
						$pd=1;
					}

					$cek2 = mysql_query("select status from tb_pengaturan where pengaturan='penilaian'");
					$row2 = mysql_fetch_array($cek2);
					if ($row2['status']=="0"){
						$pn=0;
					}else if ($row2['status']=="1"){
						$pn=1;
					}

					$cek3 = mysql_query("select status from tb_pengaturan where pengaturan='pengumuman'");
					$row3 = mysql_fetch_array($cek3);
					if ($row3['status']=="0"){
						$pm=0;
					}else if ($row3['status']=="1"){
						$pm=1;
					}
					?>
					<form class="form-horizontal" action="pengaturan_edit.php" method="post">
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Pendaftaran Peserta</label>
									<div class="col-md-3">
									<input type="radio" name="r_pd" value="1" <?php if($pd==1) echo "checked"; ?>>Aktif<br/>
									</div>
									<div class="col-md-3">
									<input type="radio" name="r_pd" value="0" <?php if($pd==0) echo "checked"; ?>>Tidak Aktif<br/>
									</div>
								</div>
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Penilaian/Kuesioner</label>
									<div class="col-md-3">
									<input type="radio" name="r_pn" value="1" <?php if($pn==1) echo "checked"; ?>>Aktif<br/>
									</div>
									<div class="col-md-3">
									<input type="radio" name="r_pn" value="0" <?php if($pn==0) echo "checked"; ?>>Tidak Aktif<br/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Pengumuman Pemenang</label>
									<div class="col-md-3">
									<input type="radio" name="r_pm" value="1" <?php if($pm==1) echo "checked"; ?>>Publikasi<br/>
									</div>
									<div class="col-md-3">
									<input type="radio" name="r_pm" value="0" <?php if($pm==0) echo "checked"; ?>>Tidak Dipublikasi<br/>
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<center><input type="submit" class="btn btn-primary btn-md" value="Simpan"></center>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
</div>