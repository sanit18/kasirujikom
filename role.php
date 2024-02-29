<?php
include 'authcheck.php';

$view = $dbconnect->query('SELECT * FROM role');

?>

<div class="container">

	<?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

		<div class="alert alert-success" role="alert">
			<?=$_SESSION['success']?>
		</div>

	<?php
		}
		$_SESSION['success'] = '';
	?>

	<h1>List Role</h1>
	<a href="index.php?page=role_add" class="btn btn-primary">Tambah data</a>
	<hr>
	<table class="table table-bordered">
		<tr style="background:#BA55D3;color:#333;">
			<th>ID Role</th>
			<th>Nama</th>
			<th>Aksi</th>
		</tr>
		<?php

		while ($row = $view->fetch_array()) { ?>

		<tr style="background:#D8BFD8;color:#333;">
			<td> <?= $row['id_role'] ?> </td>
			<td><?= $row['nama'] ?></td>
			<td>
				<a href="index.php?page=role_edit&id=<?= $row['id_role'] ?>">Edit</a> |
				<a href="index.php?page=role_hapus&id=<?= $row['id_role'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
			</td>
		</tr>

		<?php }
		?>

	</table>

</div>