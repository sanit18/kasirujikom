<?php
include 'authcheck.php';

$view = $dbconnect->query('SELECT * FROM barang');

?>


<div class="container">

	<?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

		<div class="alert alert-success" role="alert">
			<?=$_SESSION['success']?>
		</div>

	<?php
        }
        $_SESSION['success'] = '';
    ?>
	
	<h1>List Stok</h1>
	<a href="index.php?page=barang_add" class="btn btn-primary">Tambah data</a>
	<a href="index.php?page=barang" class="btn btn-primary">Tabel Barang</a>
	
	<hr>
	<table class="table table-bordered">
		<tr style="background:#5F9EA0;color:#333;">
			<th>ID Barang</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Jumlah Stok</th>
			<th>Merk</th>
			<th>Harga beli</th>
			<th>Satuan Barang</th>
			<th>Tgl input</th>
			<th>Tgl Update</th>
			<th>Aksi</th>
		</tr>
		<?php

        while ($row = $view->fetch_array()) { ?>

		<tr style="background:#F0F8FF;color:#333;">
			<td> <?= $row['id_barang'] ?> </td>
			<td> <?= $row['kode_barang'] ?> </td>
			<td><?= $row['nama'] ?></td>
			<td><?=$row['harga']?></td>
			<td><?=$row['jumlah']?></td>
			<td><?=$row['merk']?></td>
			<td><?=$row['harga_beli']?></td>
			<td><?=$row['satuan_barang']?></td>
			<td><?=$row['tgl_input']?></td>
			<td><?=$row['tgl_update']?></td>
			<td>	
				<a href="index.php?page=barang_edit&id=<?= $row['id_barang'] ?>">Edit</a> |
				<a href="index.php?page=barang_hapus&id=<?= $row['id_barang'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>|
				<a href="index.php?page=restok&id=<?= $row['id_barang'] ?>">Restok</a>
			</td>
		</tr>

		<?php }
        ?>

	</table>
</div>