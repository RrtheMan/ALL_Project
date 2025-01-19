<?php require_once('functions/login_SQL.php') ?>
<?php



if (!isset($_SESSION['username'])) {
    header("Location: Login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Dashboard</title>
</head>
<body style="background:#FCC">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a href="wlecome.php" class="navbar navbar-brand"><h3> Lovejoe </h3></a>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="Request_Evaluation.php" class="nav-link">Request Evaluation</a>
                    </li>
                    <?php
                    if ($_SESSION['admin'] == true) {
                        echo '<li class="nav-item"><a href=" administrator_requests.php" class="nav-link"> administrator Requests</a></li>';
                    }
                     ?>
                    <li class="nav-item">
                        <a href="Logout.php" class="nav-link">logout</a>
                    </li>
                </ul>
            </div>
        </nav>


</body>
 <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<body style="background:#FCC">
        
    </body>
</html>