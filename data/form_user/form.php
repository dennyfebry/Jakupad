<?php
if (empty($_GET['aks'])) {
	$kode = mysqli_fetch_array(mysqli_query($connect, "select CONCAT('GD-',right(CONCAT('00',IFNULL(MAX(ABS(mid(id_gedung,3,4)))+1,1)),4)) as kode from tabel_gedung"));
	?>

	<div class="header">
		<br>
		<ol class="breadcrumb">
			<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
			<li><a href="#">Data User</a></li>
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
										Data User
									</small>
								</h1>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<form action="?tg=user&amp;aks=simpan" method="POST">

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama User </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1-1" name="nama_user" placeholder="Nama User" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Username </label>
								<div class="col-sm-9" style="margin-top:20px;">
									<input type="text" id="form-field-1-1" name="username" placeholder="username" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password </label>
								<div class="col-sm-9" style="margin-top:20px;">
									<input type="password" id="form-field-1-1" name="password" placeholder="username" class="form-control" />
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
	$ck = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_user where id='$_GET[kode]'"));

	?>
	<div class="header">
		<br>
		<ol class="breadcrumb">
			<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
			<li><a href="#">Data User</a></li>
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
										Data User
									</small>
								</h1>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<form action="?tg=user&amp;aks=update&amp;kode=<?php print($_GET['kode']) ?>" method="POST">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama User </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1-1" value="<?php print($ck['nama_user']) ?>" name="nama_user" placeholder="Nama User" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Username </label>
								<div class="col-sm-9" style="margin-top:20px;">
									<input type="text" id="form-field-1-1" name="username" value="<?php print($ck['username']) ?>" placeholder="username" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password </label>
								<div class="col-sm-9" style="margin-top:20px;">
									<input type="password" id="form-field-1-1" name="password" value="<?php print($ck['password']) ?>" placeholder="username" class="form-control" />
								</div>
							</div>

							<div class="col-md-offset-3 col-md-9" style="margin-top:20px;">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>
								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<a href="?tg=user">
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
	if (empty($_POST['nama_user']) or empty($_POST['username']) or empty($_POST['password'])) {
		echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Harus Lengkap');window.location=('?tg=user');
                    </script>";
	} else {
		$ck = mysqli_query($connect, 'SELECT * from tabel_user where username="$_POST[username]"');
		if (mysqli_num_rows($ck) > 0) {
			echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Maaf, Nama Gudang sudah digunakan');window.location=('?tg=user');
                    </script>";
		} else {
			mysqli_query($connect, "INSERT INTO tabel_user(nama_user,username,password) values('$_POST[nama_user]','$_POST[username]','$_POST[password]')");
			echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Tersimpan');window.location=('?tg=user');
                    </script>";
		}
	}
} elseif ($_GET['aks'] == 'update') {
	if (empty($_POST['nama_user']) or empty($_POST['username']) or empty($_POST['password'])) {
		echo "  <script languange='JavaScript' type='text/javascript'>
                        alert('Data Harus Lengkap');window.location=('?tg=user&aks=edit&kode=$_GET[kode]');
                    </script>";
	} else {

		mysqli_query($connect, "UPDATE tabel_user set nama_user='$_POST[nama_user]',username='$_POST[username]',password='$_POST[password]' where id='$_GET[kode]'");
		echo "  <script languange='JavaScript' type='text/javascript'>
                    alert('Data Teredit');window.location=('?tg=user');
                </script>";
	}
} elseif ($_GET['aks'] == 'hapus') {
	mysqli_query($connect, "DELETE from tabel_user where id='$_GET[kode]'");
	echo "  <script languange='JavaScript' type='text/javascript'>
                alert('Data Terhapus');window.location=('?tg=user');
            </script>";
}
?>