<?php require_once('functions/config.php') ?>
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
                        <a href="#" class="nav-link">Home</a>
                    </li>
                     <li class="nav-item">
                        <a href="Login.php" class="nav-link">Login/sign up</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg m-auto">
                    <div class="card bg-light mt-5 py-2">
                        <div class="card-title">
                            <h2>Sign up</h2>
                        </div>
                        <div class="card-body">
                            <form action="SQL/register_SQL.php" method="post">
                                <input type="text" name="Forename" placeholder="first name" class="form-control py-2" required>
                                <input type="text" name="Surname" placeholder="last name" class="form-control py-2" required>
                                <input type="email" name="Email" placeholder="Email" class="form-control py-2" required>
                                <input type="tel" id="phone" name="Phone" placeholder="Phone number" pattern="[0-9]{10}" class="form-control py-2" required>
                                <input type="text" name="UserName" placeholder="User Name" class="form-control py-2">
                                <input type="password" id="password" name="Password" placeholder="Password" class="form-control py-2" required oninput="password_strength()">
                                <input type="password" id="password" name="con_Password" placeholder="comfirm Password" class="form-control py-2" required oninput="password_strength()">
                                <div id="passwordStrength"></div>
                                <button class="btns btn-success" nr-1>confirm</button>
                            </form>
                            <a href="Login.php"><button class="btns btn-danger" nr-1>back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>