<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['admin'] !== true) {
    header("Location: Login.php");
    exit();
}


$con = mysqli_connect('localhost', 'id21619202_rabor017', 'Wizard077!','id21619202_account');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM evaluation_requests";
$result = mysqli_query($con, $sql);


mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Requests</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background:#FCC">

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a href="welcome.php" class="navbar navbar-brand"><h3> Lovejoe </h3></a>
            <ul class="navbar-nav m-auto">
                 <li class="nav-item">
                        <a href="welcome.php" class="nav-link">Home</a>
                    </li>
                 <li class="nav-item">
                        <a href="Request_Evaluation.php" class="nav-link">Request Evaluation</a>
                    </li>
                <li class="nav-item">
                    <a href="administrator_requests.php" class="nav-link">administrator Requests</a>
                </li>
                <li class="nav-item">
                    <a href="Logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
        <h1>Admin Requests</h1>
            
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>ID: " . $row['id'] . "</p>";
                echo "<p>User: " . $row['User'] . "</p>";
                echo "<p>Comment: " . $row['comment'] . "</p>";
                echo "<p>Contact Method: " . $row['contact_method'] . "</p>";
                echo '<img src="' . $row['photo_path'] . '" alt="Uploaded Image" style="max-width: 100%;">';
                echo "<hr>";
            }
        } else {
            echo "No evaluation requests found.";
        }
        ?>
        </div>
    </div>

</body>
</html>