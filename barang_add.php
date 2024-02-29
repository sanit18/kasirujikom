
<?php
include 'authcheck.php';

if (isset($_POST['simpan'])) {
    // echo var_dump($_POST);
    $nama = $_POST['nama'];
    $kode_barang = $_POST['kode_barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
	$merk = $_POST['merk'];
	$beli = $_POST['harga_beli'];
	$satuan = $_POST['satuan'];
	$input = $_POST['tgl_input'];
	$update = $_POST['tgl_update'];


    // Menyimpan ke database;
    mysqli_query($dbconnect, "INSERT INTO barang VALUES (NULL,'$nama','$harga','$jumlah','$kode_barang','$merk','$beli','$satuan','$input','$update')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    // mengalihkan halaman ke list barang
    header('location: index.php?page=barang');
    if($result){
        echo '<script>alert("Restok berhasil."); window.location="index.php?page=barang";</script>';
    } else {
        echo '<script>alert("Restok gagal.");</script>';
    }
}

?>
<div class="container">
	<h1>Tambah Barang</h1>
	<form method="post">
	  <div class="form-group">
	  <tr>
                                    <td>Nama Barang</td>
                                    <td><input type="text" placeholder="Nama Barang" required class="form-control"
                                            name="nama"></td>
                                </tr>
                                <tr>
                                    <td>Harga </td>
                                    <td><input type="number" placeholder="Harga " required class="form-control"
                                            name="harga"></td>
                                </tr>
								<tr>
                                    <td>Kode Barang</td>
                                    <td><input type="text" placeholder="Kode Barang" required class="form-control"
                                            name="kode_barang"></td>
                                </tr>
                                <tr>
                                    <td>Merk Barang</td>
                                    <td><input type="text" placeholder="Merk Barang" required class="form-control"
                                            name="merk"></td>
                                </tr>
                                <tr>
                                    <td>Harga Beli</td>
                                    <td><input type="number" placeholder="Harga beli" required class="form-control"
                                            name="harga_beli"></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td><input type="number" placeholder="Jumlah" required class="form-control"
                                            name="jumlah"></td>
                                </tr>
                                <tr>
                                    <td>Satuan Barang</td>
                                    <td>
                                        <select name="satuan" class="form-control" required>
                                            <option value="#">Pilih Satuan</option>
                                            <option value="PCS">PCS</option>
                                            <option value="Satuan">Satuan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><input type="text" name="tgl_input" class="form-control" placeholder="Tanggal Input" value="<?php echo  date("j F Y, G:i");?>">
                                </tr>
                            </table>
                        </div>
	  
  		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  		<a href="index.php?page=barang" class="btn btn-danger" onclick="return confirm('apakah data tidak akan di lanjutkan?')">Kembali</a>
	</form>
</div>