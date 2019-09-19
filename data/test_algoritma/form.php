<?php
if (empty($_GET['aks'])) {
	$kode = mysqli_fetch_array(mysqli_query($connect, "select CONCAT('GD-',right(CONCAT('00',IFNULL(MAX(ABS(mid(id_gedung,3,4)))+1,1)),4)) as kode from tabel_gedung"));
	?>
	<div class="header">
		<br>
		<ol class="breadcrumb">
			<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
			<li><a href="#">Test Algoritma</a></li>
			<li class="active">Test</li>
		</ol>

	</div>
	<div id="page-inner">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php
							include "fungsi/skin.php";
							?>
						<div class="card-title">
							<div class="title">
								<h1>
									Test
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
										Test Algoritma
									</small>
								</h1>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<form action="?tg=node&amp;aks=simpan" method="POST">

							<div class="form-group" style="margin-bottom:10px;">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Dari Gedung/Titik Lokasi</label>
								<div class="col-sm-9">
									<select name="gedungfrom" id="gedungfrom">
										<option value=''>Pilih Gedung/Titik Lokasi</option>
										<?php
											$ckg = mysqli_query($connect, "SELECT * from tabel_gedung");
											while ($data = mysqli_fetch_array($ckg)) {
												echo "
							<option value='$data[id_gedung]'>$data[nama_gedung]</option>
							";
											}
											?>
									</select>
								</div>
							</div>
							<br>
							<font color=white>.</font>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ke Gedung/Titik Lokasi </label>
								<div class="col-sm-9">
									<select name="gedungto" id="gedungto">
										<option value=''>Pilih Gedung/Titik Lokasi</option>
										<?php
											$ckg = mysqli_query($connect, "SELECT * from tabel_gedung");
											while ($data = mysqli_fetch_array($ckg)) {
												echo "
							<option value='$data[id_gedung]'>$data[nama_gedung]</option>
							";
											}
											?>
									</select>
								</div>
							</div>

							<div class="col-md-offset-3 col-md-9" style="margin-top:20px;">
								<button class="btn btn-info" type="button" onclick="load_data('fungsi/js.php?ua=a&amp;gedungfrom='+gedungfrom.value+'&amp;gedungto='+gedungto.value,'','detil')">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Proses
								</button>
								&nbsp; &nbsp; &nbsp;
							</div>
						</form>
						<div id="detil"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
} elseif ($_GET['aks'] == 'dijkstra') {
	?>
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Test Algoritma</a>
				</li>
				<li>
					Test
				</li>
			</ul>
		</div>
		<div class="page-content">
			<div class="ace-settings-container" id="ace-settings-container">
				<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
					<i class="ace-icon fa fa-cog bigger-130"></i>
				</div>
				<?php
					include "fungsi/skin.php";
					?>
			</div>
			<div class="page-header">
				<h1>
					Algoritma
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Test
					</small>
				</h1>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form action="?tg=node&amp;aks=simpan" method="POST">

						<div class="form-group" style="margin-bottom:10px;">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Gedung From</label>
							<div class="col-sm-9">
								<select name="gedungfrom" id="gedungfrom">
									<option value=''>Pilih Gedung</option>
									<?php
										$ckg = mysqli_query($connect, "SELECT * from tabel_gedung");
										while ($data = mysqli_fetch_array($ckg)) {
											echo "
													<option value='$data[id_gedung]'>$data[nama_gedung]</option>
													";
										}
										?>
								</select>
							</div>
						</div>
						<br>
						<font color=white>.</font>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Gedung To </label>
							<div class="col-sm-9">
								<select name="gedungto" id="gedungto">
									<option value=''>Pilih Gedung</option>
									<?php
										$ckg = mysqli_query($connect, "SELECT * from tabel_gedung");
										while ($data = mysqli_fetch_array($ckg)) {
											echo "
													<option value='$data[id_gedung]'>$data[nama_gedung]</option>
													";
										}
										?>
								</select>
							</div>
						</div>

						<div class="col-md-offset-3 col-md-9" style="margin-top:20px;">
							<button class="btn btn-info" type="button" onclick="load_data('fungsi/js.php?ua=c&amp;gedungfrom='+gedungfrom.value+'&amp;gedungto='+gedungto.value,'','detil')">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Proses
							</button>
							&nbsp; &nbsp; &nbsp;
						</div>
					</form>
					<div id="detil"></div>
				</div>
			</div>
		</div>
	</div>
<?php
}

?>