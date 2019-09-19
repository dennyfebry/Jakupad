<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['level']);
unset($_SESSION['kode']);

?>
<script language=javascript>
					setTimeout("location.href='index.php'",500);
				</script> 
