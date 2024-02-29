<?php
include 'authcheck.php';
?>
<h1 class="mt-4">Ubah Data</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
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
                        // Use prepared statement to prevent SQL injection
                        $query = mysqli_prepare($dbconnect, "UPDATE barang SET nama=?, kode_barang=?, harga=?, jumlah=?,
                            merk=?, harga_beli=?, satuan_barang=?, tgl_input=?, tgl_update=? WHERE id_barang=?");

                        mysqli_stmt_bind_param($query, 'sssssssssi', $nama, $kode_barang, $harga, $jumlah, $merk, $beli, $satuan, $input, $update, $id);
                        $result = mysqli_stmt_execute($query);

                        if($result){
                            echo '<script>alert("Ubah data berhasil."); window.location="index.php?page=stok";</script>';
                        } else {
                            echo '<script>alert("Ubah data gagal.");</script>';
                        }

                        mysqli_stmt_close($query);
                    }

                    $query = mysqli_query($dbconnect, "SELECT * FROM barang WHERE id_barang=$id");
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
                    <div class="form-group">
                        <label>Satuan Barang</label>
                        <select name="satuan_barang" class="form-control" required>
                            <option value="satuan">Pilih Satuan</option>
                            <option value="PCS" <?php if ($data['satuan_barang'] == 'PCS') echo 'selected'; ?>>PCS</option>
                            <option value="satuan" <?php if ($data['satuan_barang'] == 'satuan') echo 'selected'; ?>>Satuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input type="text" name="tgl_input" class="form-control" placeholder="Tanggal Input" value="<?=$data['tgl_input']?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Update</label>
                        <input type="text" name="tgl_update" class="form-control" placeholder="Tanggal Update" value="<?php echo  date("j F Y, G:i");?>">
                    </div>
                    <input type="submit" name="submit" value="update" class="btn btn-primary">
                    <a href="index.php?page=barang" class="btn btn-danger" onclick="return confirm('apakah data tidak akan di lanjutkan?')">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
