<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Beranda</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>

						<?php
							$s = mysql_query("select * from dosen_peserta");
							$jml = mysql_num_rows($s);
						?>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml; ?></div>
							<div class="text-muted">Jumlah Peserta</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->