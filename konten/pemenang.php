<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 centered">
					<h4>Pemenang Pemilihan Dosen Terbaik</h4>
					<hr>
				</div>

				<div class="row mt">	
					<div class="col-lg-8 col-lg-offset-2">
						<table class="table" border='1'>
							<tr>
								<th>Ranking</th>
								<th>Nip </th>
								<th>Nama </th>
								<th>Jabatan </th>
							</tr>

							<?php
								$sql = mysql_query("select * from dosen_peserta order by vektor_v desc limit 3");
								$i = 1;
								while ($row = mysql_fetch_array($sql)){
									echo "<tr>
											<td> $i </td>
											<td> $row[nip] </td>
											<td> $row[nama] </td>
											<td> $row[jabatan]</td>
											</tr>";
									$i++;
								}
							?>
						</table>
					</div>
				</div>	
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->