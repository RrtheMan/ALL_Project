<?php require_once('functions/login_SQL.php') ?>
<?php
$Max = 5;
$Time = 300;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (authenticateUser($_POST['userName'], $_POST['Password']) == true){
        $_SESSION['username'] = $_POST['userName'];
        $_SESSION['admin'] = admin($_POST['userName']);
        echo '<script>window.location.href = "welcome.php";</script>'; 
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title>LoveJoe antique</title>
    </head>
    <body style="background:#FCC">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a href="index.php" class="navbar navbar-brand"><h3> Lovejoy </h3></a>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                     <li class="nav-item">
                        <a href="Login.php" class="nav-link">Login/sign up</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2>login</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="text" name="userName" placeholder="User Name" class="form-control py-2" required>
                            <input type="password" name="Password" placeholder="Password" class="form-control py-2" required>
                            <a href="welcome.php"><button class="btns btn-danger" nr-1>Sign in</button></a>
                            </form>
                        <a href="Registation.php"><button class="btns btn-danger" nr-1>Registation</button></a>
                        
                    </div>
                    <div class="card-footer">
                        <a href=# class="float right"> Forgot Password</a>
                    </div>
                        
                </div>
            </div>
        </div>
    </body>