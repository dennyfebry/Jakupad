<!--<style>
  @import url(https://fonts.googleapis.com/css?family=Lato);
*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-size: 16px;
  font-family: 'Lato', sans-serif;
}

.timeline {
  color: #fff;
  background: white;
}
.timeline h1,
.timeline ul li .content h2 {
  text-shadow: 1px 1px 1px rgba(56, 56, 56, 0.5);
}
.timeline h1 {
  background: #3d9e67;
  padding: 70px 0;
  font-size: 2.5em;
  text-align: center;
}
.timeline ul {
  background: #faf8eb;
  padding: 50px 0;
}
.timeline ul li {
  background: #67CC8E;
  position: relative;
  margin: 0 auto;
  width: 5px;
  padding-bottom: 40px;
  list-style-type: none;
}
.timeline ul li:last-child {
  padding-bottom: 7px;
}
.timeline ul li:before {
  content: '';
  background: #faf8eb;
  position: absolute;
  left: 50%;
  top: 0;
  transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  width: 20px;
  height: 20px;
  border: 3px solid #67CC8E;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.timeline ul li .hidden {
  opacity: 0;
}
.timeline ul li .content {
  background: #67CC8E;
  position: relative;
  top: 7px;
  width: 350px;
  padding: 20px;
}
.timeline ul li .content h2 {
  color: #fff;
  padding-bottom: 10px;
  text-align: center;
}
.timeline ul li .content p {
  text-align: center;
}
.timeline ul li .content:before {
  content: '';
  background: #67CC8E;
  position: absolute;
  top: 0px;
  width: 38px;
  height: 5px;
}
.timeline ul li:nth-child(odd) .content {
  left: 50px;
  background: #67CC8E;
  background: -webkit-linear-gradient(-45deg, #56BC83, #67CC8E);
  background: linear-gradient(-45deg, #56BC83, #67CC8E);
}
.timeline ul li:nth-child(odd) .content:before {
  left: -38px;
}
.timeline ul li:nth-child(even) .content {
  left: calc(-350px - 45px);
  background: #67CC8E;
  background: -webkit-linear-gradient(45deg, #56BC83, #67CC8E);
  background: linear-gradient(45deg, #56BC83, #67CC8E);
}
.timeline ul li:nth-child(even) .content:before {
  right: -38px;
}

/* -------------------------
   ----- Media Queries ----- 
   ------------------------- */
@media screen and (max-width: 1020px) {
  .timeline ul li .content {
    width: 41vw;
  }

  .timeline ul li:nth-child(even) .content {
    left: calc(-41vw - 45px);
  }
}
@media screen and (max-width: 700px) {
  .timeline ul li {
    margin-left: 20px;
  }
  .timeline ul li .content {
    width: calc(100vw - 100px);
  }
  .timeline ul li .content h2 {
    text-align: initial;
  }
  .timeline ul li:nth-child(even) .content {
    left: 45px;
    background: #67CC8E;
    background: -webkit-linear-gradient(-45deg, #56BC83, #67CC8E);
    background: linear-gradient(-45deg, #56BC83, #67CC8E);
  }
  .timeline ul li:nth-child(even) .content:before {
    left: -33px;
  }
}

  </style>-->
<?php
	//perintah floyd warshall
	if (empty($_GET['gedungfrom']) or empty($_GET['gedungto'])) {
		echo "Harap Pilih Gedung";
	}
	else{
		if ($_GET['gedungfrom'] == $_GET['gedungto']) {
			echo "Gedung Asal Dan Gedung Tujuan Tidak Boleh Sama";
		}
		else{
			?>
		<?php
			$ckgedungfrom = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[gedungfrom]'"));
			$lokasi[$ckgedungfrom['id_gedung']] = $ckgedungfrom['nama_gedung'];
			$data = mysqli_query($connect, "SELECT * from tabel_gedung ");
			while ($hasil = mysqli_fetch_array($data)) {
				if ($_GET['gedungfrom'] == $hasil['id_gedung'] or $_GET['gedungto'] == $hasil['id_gedung']) {
					# code...
				}
				else{
					$lokasi[$hasil['id_gedung']] = $hasil['nama_gedung'];
				}
				
			}
			$ckgedungto = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[gedungto]'"));
			$lokasi[$ckgedungto['id_gedung']] = $ckgedungto['nama_gedung'];
		?>	
		<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
				Pencarian Rute Terpendek
			</div>
			<div>
				<!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
					<!-- <thead>
						<tr>
							<th class="center">
								<label class="pos-rel">
									
								</label>
							</th>
							<?php
								foreach ($lokasi as $key => $value) {
									echo "<th>$value</th>";
								}
							?>
						</tr>
					</thead> -->

					<!-- <tbody> -->
						<?php
							// Pembentukan Node Dan Graf Floyd warshall
							foreach ($lokasi as $key => $value) {
								// echo "
									// <tr>
										// <td class=left>
											// $value
										// </td>";
										$n=0;
										foreach ($lokasi as $key1 => $value1) {
											$kode = $key1.'<>'.$key;
											$kode1 = $key.'<>'.$key1;
											$dt = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_node where kode_gedung='$kode' or kode_gedung='$kode1'"));
											if (empty($dt['jarak'])) {
												// echo "<td>0";
												$dataf = 0;
												$graph[$n][] = 0;
											}
											else{
												// echo "<td>$dt[jarak]";
												$dataf = $dt['jarak'];
												$graph[$n][] = $dt['jarak'];
											}
											$n++;
										}
								// 	echo"									
								// 	</tr>
								// ";
								$nodes[] = $value;
							}
							//print_r($graph);
						?>
					<!-- </tbody> -->
				<!-- </table> -->
				<?php
					echo "<br>";
							$jlss = count($lokasi)-1;
							include('fw_example.php');
				?>
			</div>
		</div>
	</div>
	<?php
		}
		
	}
?>

