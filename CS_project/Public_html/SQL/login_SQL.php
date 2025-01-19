<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'id21619202_rabor017', 'Wizard077!','id21619202_account');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($con, $_POST["userName"]);
    $password = mysqli_real_escape_string($con, $_POST["Password"]);

    $sql = "SELECT * FROM Account WHERE UserName = '$username'";
    $result = mysqli_query($con, $sql);


    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row && password_verify($password, $row['Password'])) {
            // Login successful
            $_SESSION['username'] = $username;
            echo "Login successful! Welcome, $username!";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>