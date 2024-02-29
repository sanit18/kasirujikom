
<?php

include 'config.php';

include 'authcheck.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];

$q=mysqli_query($dbconnect, "DELETE FROM role WHERE id_role='$id' ");
// if ($q) {
// 	# code...
// 	echo "berhasil";
// }

// echo($q); die();
	$_SESSION['success'] = 'Berhasil menghapus data';

	header('location: index.php?page=role');
}

?>