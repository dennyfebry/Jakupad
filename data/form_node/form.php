<?php
if (empty($_GET['aks'])) {
	$kode = mysqli_fetch_array(mysqli_query($connect, "select CONCAT('GD-',right(CONCAT('00',IFNULL(MAX(ABS(mid(id_gedung,3,4)))+1,1)),4)) as kode from tabel_gedung"));
	?>
	<div class="header">
		<br>
		<ol class="breadcrumb">
			<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
			<li><a href="#">Data Node</a></li>
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
										Data Node
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
									<select name="gedungfrom">
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Ke Gedung/Titik Lokasi </label>
								<div class="col-sm-9">
									<select name="gedungto">
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jarak </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" name="jarak" placeholder="Jarak" class="col-xs-10 col-sm-5" />
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
	$ck = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_node where id='$_GET[kode]'"));
	?>
	<div class="header">
		<br>
		<ol class="breadcrumb">
			<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
			<li><a href="#">Data Node</a></li>
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
										Data Node
									</small>
								</h1>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<form action="?tg=node&amp;aks=update&amp;kode=<?php print($_GET['kode']) ?>&amp;from=<?php print($_GET['from']) ?>&amp;to=<?php print($_GET['to']) ?>" method="POST">

							<div class="form-group" style="margin-bottom:10px;">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Dari Gedung/Titik Lokasi</label>
								<div class="col-sm-9">
									<select name="gedungfrom">

										<?php
											$ckgdfr = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[from]'"));
											echo "<option value='$ckgdfr[id_gedung]'>$ckgdfr[nama_gedung]</option>";
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Ke Gedung/Titik Lokasi </label>
								<div class="col-sm-9">
									<select name="gedungto">

										<?php
											$ckgdf = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[to]'"));
											echo "<option value='$ckgdf[id_gedung]'>$ckgdf[nama_gedung]</option>";
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jarak </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" name="jarak" value="<?php print($ck['jarak']) ?>" placeholder="Jarak" class="col-xs-10 col-sm-5" />
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
									<a href="?tg=node">Kembali</a>
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
	if (empty($_POST['gedungfrom']) or empty($_POST['gedungto']) or empty($_POST['jarak'])) {
		echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Harus Lengkap');window.location=('?tg=node');
                    </script>";
	} else {
		$kode = $_POST['gedungfrom'] . '<>' . $_POST['gedungto'];
		$kode1 = $_POST['gedungto'] . '<>' . $_POST['gedungfrom'];
		$ck = mysqli_query($connect, "SELECT * from tabel_node where kode_gedung='$kode' or kode_gedung='$kode1'");
		if (mysqli_num_rows($ck) > 0) {
			echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Maaf, Node Sudah Ada');window.location=('?tg=node');
                    </script>";
		} else {
			mysqli_query($connect, "INSERT INTO tabel_node(kode_gedung,jarak) values('$kode','$_POST[jarak]')");
			echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Tersimpan');window.location=('?tg=node');
                    </script>";
		}
	}
} elseif ($_GET['aks'] == 'update') {
	if (empty($_POST['gedungfrom']) or empty($_POST['gedungto']) or empty($_POST['jarak'])) {
		echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Harus Lengkap');window.location=('?tg=node&aks=edit&kode=$_GET[kode]&from=$_GET[from]&to=$_GET[to]');
                    </script>";
	} else {
		$kode = $_POST['gedungfrom'] . '<>' . $_POST['gedungto'];
		$kode1 = $_POST['gedungto'] . '<>' . $_POST['gedungfrom'];
		$ck = mysqli_query($connect, "SELECT * from tabel_node where kode_gedung='$kode' or kode_gedung='$kode1'");
		if (mysqli_num_rows($ck) > 0) {
			$kl = mysqli_fetch_array($ck);
			if ($kl['id'] == $_GET['kode']) {
				mysqli_query($connect, "DELETE from tabel_node where id='$_GET[kode]'");
				mysqli_query($connect, "INSERT INTO tabel_node(kode_gedung,jarak) values('$kode','$_POST[jarak]')");
				echo "  <script languange='JavaScript' type='text/javascript'>
	                        alert('Data Tersimpan');window.location=('?tg=node');
	                    </script>";
			} else {
				echo "  <script languange='JavaScript' type='text/javascript'>
	                        alert('Maaf, Node Sudah Ada');window.location=('?tg=node&aks=edit&kode=$_GET[kode]&from=$_GET[from]&to=$_GET[to]');
	                    </script>";
			}
		} else {
			mysqli_query($connect, "DELETE from tabel_node where id='$_GET[kode]'");
			mysqli_query($connect, "INSERT INTO tabel_node(kode_gedung,jarak) values('$kode','$_POST[jarak]')");
			echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Tersimpan');window.location=('?tg=node');
                    </script>";
		}
	}
} elseif ($_GET['aks'] == 'hapus') {
	mysqli_query($connect, "DELETE from tabel_node where id='$_GET[kode]'");
	echo "  <script languange='JavaScript' type='text/javascript'>
                alert('Data Terhapus');window.location=('?tg=node');
            </script>";
}
?>