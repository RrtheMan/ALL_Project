<?php
session_start();

function authenticateUser($username, $password) {
    $con = mysqli_connect('localhost', 'id21619202_rabor017', 'Wizard077!', 'id21619202_account');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "SELECT * FROM Account WHERE UserName = '$username'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row && password_verify($password, $row['Password'])) {
            $_SESSION['username'] = $username;
            mysqli_close($con);
            return true;
        }
    }

    mysqli_close($con);
    return false;
}



function admin($username) {
    $con = mysqli_connect('localhost', 'id21619202_rabor017', 'Wizard077!', 'id21619202_account');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($con, $username);

    $sql = "SELECT * FROM Account WHERE UserName = '$username'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row['authentication'] == true) {
            $_SESSION['authentication'] = true;
            mysqli_close($con);
            return true;
        }
    }
    mysqli_close($con);
    return false;
}

function phone($username) {
    $con = mysqli_connect('localhost', 'id21619202_rabor017', 'Wizard077!', 'id21619202_account');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($con, $username);

    $sql = "SELECT * FROM Account WHERE UserName = '$username'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $phone = $row['Number'];
        mysqli_close($con);
        return $phone;
        
    }
    mysqli_close($con);
    return false;
}

function email($username) {
    $con = mysqli_connect('localhost', 'id21619202_rabor017', 'Wizard077!', 'id21619202_account');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($con, $username);

    $sql = "SELECT * FROM Account WHERE UserName = '$username'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $Email = $row['Email'];
        mysqli_close($con);
        return $Email;
    }
    mysqli_close($con);
    return false;
}

?>
