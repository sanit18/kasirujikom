<?php
include 'authcheck.php';
?>
<h1 class="mt-4">Restok</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    // Assuming $dbconnect is the connection to the db_kasir database
                    $id = $_GET['id'];
                    if(isset($_POST['update'])){
                        $jumlah = $_POST['jumlah'];

                        // Use prepared statement to prevent SQL injection
                        $query = mysqli_prepare($dbconnect, "UPDATE barang SET jumlah=? WHERE id_barang=?");
                        
                        mysqli_stmt_bind_param($query, 'ii', $jumlah, $id);
                        $result = mysqli_stmt_execute($query);

                        if($result){
                            echo '<script>alert("Restok berhasil."); window.location="index.php?page=stok";</script>';
                        } else {
                            echo '<script>alert("Restok gagal.");</script>';
                        }

                        mysqli_stmt_close($query);
                    }

                    $query = mysqli_query($dbconnect, "SELECT * FROM barang WHERE id_barang=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                   
                    <div class="form-group">
                        <label>Jumlah Stock</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock" value="<?=$data['jumlah']?>">
                    </div>
                    
                    <input type="submit" name="update" value="Restok" class="btn btn-primary">

                    <a href="index.php?page=barang" class="btn btn-warning">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
