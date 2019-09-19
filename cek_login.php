<?php
session_start();
if (isset($_POST['username'])) {
	include "fungsi/koneksi.php";
	if (empty($_GET['tg'])) {
		$admin = mysqli_query($connect, "select * from tabel_user where username='$_POST[username]' and password='$_POST[password]'");
		if (mysqli_num_rows($admin) == 1) {
			$row = mysqli_fetch_array($admin);
			$_SESSION[user] = $row[username];
			$_SESSION[level] = "admin";
			header('location:admin.php?tg=user');
		} else {

			echo "<script languange='JavaScript' type='text/javascript'>
	                	alert('Login Gagal, Username dan Passwoord tidak di kenal');
	                	</script>";
			?>

			<script language=javascript>
				setTimeout("location.href='login.php'", 500);
			</script>
<?php


		}
	}
}

?>