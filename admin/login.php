<?php
    include '../view/userView.php';
    if (isset($_POST['btnLogin']))
    {
        $userView = new UserView();
        $userView->loginUser($_POST['txtWwid'], $_POST['txtPass']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@1,200;1,400&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container wrapp">
        <div class="login-banner">
            <div class="img-container">
                <img src="../img/qrv_logo.png" width="125" height="125" alt="main_logo" loading="lazy"
                class="d-inline-block align-top qrv-logo">
            </div>
            <form method="POST" action="">
                <div class="form-group">
                  <label for="exampleInputEmail1">WWID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="txtWwid">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="txtPass" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="button-container">
                    <a href="../index.html" class="btn btn-dark btn-login">Go Back</a>
                    <button type="submit" name="btnLogin" class="btn btn-dark btn-login">Login</button>
                </div>
              </form>
        </div>
    </div>

    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
