<?php
if (empty($_GET['aks'])) {
	$kode = mysqli_fetch_array(mysqli_query($connect, "select CONCAT('GD-',right(CONCAT('00',IFNULL(MAX(ABS(mid(id_gedung,4,3)))+1,1)),3)) as kode from tabel_gedung"));
	?>
	<div class="header">
		<br>
		<ol class="breadcrumb">
			<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
			<li><a href="#">Data Gedung</a></li>
			<li class="active">Input</li>
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
									Input
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
										Data Gedung/Titik Lokasi
									</small>
								</h1>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<form action="?tg=gedung&amp;aks=simpan" method="POST" enctype='multipart/form-data'>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID Gedung/Titik Lokasi </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" name="id_gedung" value="<?php print($kode['kode']) ?>" readonly="true" placeholder="ID Gedung" class="col-xs-10 col-sm-5" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Gedung/Titik Lokasi </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1-1" name="nama_gedung" placeholder="Nama Gedung/Titik Lokasi" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> File Gambar </label>
								<div class="col-sm-9">
									<!-- <img class="avatar border-white" src="" id="view_gambar" alt="..." /> -->
									<input type="file" name="file" onchange="view(event,'view_gambar','ft',400);"></p>
									<input type="hidden" id="ft" name="ft">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Keterangan </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1-1" name="keterangan" placeholder="Keterangan" class="form-control" />
								</div>
							</div>

							<div class="col-md-offset-3 col-md-9" style="margin-top:20px;">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>
								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Reset
								</button>
							</div>
						</form>
						<?php
							include "data.php";
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
} elseif ($_GET['aks'] == 'edit') {
	$ck = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[kode]'"));

	?>
	<div class="header">
		<br>
		<ol class="breadcrumb">
			<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
			<li><a href="#">Data Gedung</a></li>
			<li class="active">Edit</li>
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
									Edit
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
										Data Gedung
									</small>
								</h1>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<form action="?tg=gedung&amp;aks=update" method="POST">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID Gedung </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" name="id_gedung" readonly="true" value="<?php print($ck['id_gedung']) ?>" placeholder="ID Gedung" class="col-xs-10 col-sm-5" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Gedung </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1-1" name="nama_gedung" value="<?php print($ck['nama_gedung']) ?>" placeholder="Nama Gedung" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> File Gambar </label>
								<div class="col-sm-9">
									<!-- <img class="avatar border-white" src="" id="view_gambar" alt="..." /> -->
									<input type="file" name="file" onchange="view(event,'view_gambar','ft',400);"></p>
									<input type="hidden" id="ft" name="ft">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Keterangan </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1-1" name="keterangan" placeholder="Keterangan" value="<?php print($ck['keterangan']) ?>" class="form-control" />
								</div>
							</div>

							<div class="col-md-offset-3 col-md-9" style="margin-top:20px;">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>
								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<a href="?tg=gedung">
										<i class="ace-icon fa fa-undo bigger-110"></i>
										Batal
									</a>
								</button>
							</div>
						</form>
						<?php
							include "data.php";
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
} elseif ($_GET['aks'] == 'simpan') {
	if (empty($_POST['id_gedung']) or empty($_POST['nama_gedung']) or empty($_POST['keterangan'])) {
		echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Harus Lengkap');window.location=('?tg=gedung');
                    </script>";
	} else {
		$ck = mysqli_query($connect, 'SELECT * from tabel_gedung where nama_gedung="$_POST[nama_gedung]"');
		if (mysqli_num_rows($ck) > 0) {
			echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Maaf, Nama Gudang sudah digunakan');window.location=('?tg=gedung');
                    </script>";
		} else {
			define('UPLOAD_DIR', 'gambar/');
			$img = $_POST['ft'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = UPLOAD_DIR . uniqid() . '.png';
			$success = file_put_contents($file, $data);

			mysqli_query($connect, "INSERT INTO tabel_gedung(id_gedung,nama_gedung,keterangan,gambar) values('$_POST[id_gedung]','$_POST[nama_gedung]','$_POST[keterangan]','$file')");
			echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Tersimpan');window.location=('?tg=gedung');
                    </script>";
		}
	}
} elseif ($_GET['aks'] == 'update') {
	if (empty($_POST['id_gedung']) or empty($_POST['nama_gedung']) or empty($_POST['keterangan'])) {
		echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Harus Lengkap');window.location=('?tg=gedung&aks=edit&kode=$_POST[id_gedung]');
                    </script>";
	} else {
		if (!empty($_POST['ft'])) {
			define('UPLOAD_DIR', 'gambar/');
			$img = $_POST['ft'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = UPLOAD_DIR . uniqid() . '.png';
			$success = file_put_contents($file, $data);
			mysqli_query($connect, "UPDATE tabel_gedung set nama_gedung='$_POST[nama_gedung]',keterangan='$_POST[keterangan]',gambar='$file' where id_gedung='$_POST[id_gedung]'");
		} else {
			mysqli_query($connect, "UPDATE tabel_gedung set nama_gedung='$_POST[nama_gedung]',keterangan='$_POST[keterangan]' where id_gedung='$_POST[id_gedung]'");
		}

		echo "  <script languange='JavaScript' type='text/javascript'>
                    alert('Data Teredit');window.location=('?tg=gedung');
                </script>";
	}
} elseif ($_GET['aks'] == 'hapus') {
	mysqli_query($connect, "DELETE from tabel_gedung where id_gedung='$_GET[kode]'");
	echo "  <script languange='JavaScript' type='text/javascript'>
                alert('Data Terhapus');window.location=('?tg=gedung');
            </script>";
}
?>