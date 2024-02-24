
<?php
include 'authcheck.php';
?>
<h1 class="mt-4">Ubah Data </h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id_barang'];
                        if(isset($_POST['submit'])){
                            $nama = $_POST['nama'];
                            $kode_barang = $_POST['kode_barang'];
                            $harga = $_POST['harga'];
                            $jumlah = $_POST['jumlah'];
                            $merk = $_POST['merk'];
                            $beli = $_POST['harga_beli'];
                            $satuan = $_POST['satuan_barang'];
                            $input = $_POST['tgl_input'];
                            $update = $_POST['tgl_update'];
                            $query = mysqli_query($dbconnect, "UPDATE barang SET nama='$nama', kode_barang='$kode_barang',harga='$harga', jumlah='$jumlah',
                            merk='$merk', harga_beli='$beli', satuan_barang='$satuan', tgl_input='$input', tgl_update='$update' where id_barang='$id' ");

                            if($query){
                                echo '<script>alert("Ubah data berhasil.");</script>';
                            }else{
                                echo '<script>alert("Ubah data gagal.");</script>';
                            }
                        }
                        $query = mysqli_query($dbconnect, "SELECT*FROM barang WHERE id_barang=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                     <div class="form-group">
	    <label>Nama Barang</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama barang" value="<?=$data['nama']?>">
	  </div>
	  <div class="form-group">
	    <label>Kode Barang</label>
	    <input type="text" name="kode_barang" class="form-control" placeholder="Kode barang" value="<?=$data['kode_barang']?>">
	  </div>
	  <div class="form-group">
	    <label>Harga</label>
	    <input type="number" name="harga" class="form-control" placeholder="Harga Barang" value="<?=$data['harga']?>">
	  </div>
	  <div class="form-group">
	    <label>Jumlah Stock</label>
	    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock" value="<?=$data['jumlah']?>">
	  </div>
	  <div class="form-group">
	    <label>Merk</label>
	    <input type="text" name="merk" class="form-control" placeholder="merk" value="<?=$data['merk']?>">
	  </div>
	  <div class="form-group">
	    <label>Harga Beli</label>
	    <input type="text" name="harga_beli" class="form-control" placeholder="harga beli" value="<?=$data['harga_beli']?>">
	  </div>
	  <tr>
          <td>Satuan Barang</td>
          <td>
          <select name="satuan" class="form-control" required>
          <option value="#">Pilih Satuan</option>
          <option value="PCS">PCS</option>
          </select>
          </td>
    </tr>
	  <div class="form-group">
	    <label>Tanggal Input</label>
	    <input type="text" name="tgl_input" class="form-control" placeholder="Tanggal Input" value="<?=$data['tgl_input']?>">
	  </div>
  	<input type="submit" name="update" value="update" class="btn btn-primary">
  	<a href="index.php?page=barang" class="btn btn-warning">Kembali</a>
	</form>
</div>