<?php
include 'config.php';
session_start();
// remove all session variables
// session_unset();

// print_r($_SESSION);

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username' and password='$password'");

    //mendapatkan hasil dari data
    $data = mysqli_fetch_assoc($query);
    // return var_dump($data);

    //mendapatkan nilai jumlah data
    $check = mysqli_num_rows($query);
    // return var_dump($check);

    if (!$check) {
        $_SESSION['error'] = 'Username & password salah';
        echo '<script>alert("Login Gagal,coba lagi!");history.go(-1);</script>';
    } else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];
        echo '<script>alert("Login Berhasil yeaay!");window.location="index.php"</script>';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                       
                <!-------------      image     ------------->
                
                <img src="img/foto.png" alt="">
            </div>

            <div class="col-md-6 right">
                
                <div class="input-box">
                   
                   <header>Login Account</header>
                   <form method="post" class="form-signin">
                   <div class="input-field">
                        <input type="text" class="input"  name="username" required autofocus>
                        <label for="inputEmail" class="sr-only">Username</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password" class="input" name="password" required>
                        <label for="inputPassword" class="sr-only">Password</label>
                    </div> 
                   <div class="input-field">
                        
                   <input type="submit" name="masuk" value="Login" class="btn btn-lg btn-primary btn-block"/>
                   </div> 
                   <div class="Login">
                    
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>