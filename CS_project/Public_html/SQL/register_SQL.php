<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost','id21619202_rabor017','Wizard077!','id21619202_account');

    if (!$con){
        die("connection failed:". mysqli_connect_error());
    }
     $forename = mysqli_real_escape_string($con, $_POST["Forename"]);
     $Surname = mysqli_real_escape_string($con, $_POST["Surname"]);
     $Email = mysqli_real_escape_string($con, $_POST["Email"]);
     $phone = mysqli_real_escape_string($con, $_POST["Phone"]);
     $username = mysqli_real_escape_string($con, $_POST["UserName"]);
     $password = mysqli_real_escape_string($con, $_POST["Password"]);
     $confirm = mysqli_real_escape_string($con, $_POST["con_Password"]);
     
 
     if ($password !== $confirm) {
            echo "Passwords do not match.";
            exit();
     }
     $h_password = password_hash($confirm, PASSWORD_DEFAULT);

 
     $sql = "INSERT INTO Account (Forename, Surname, Email, Number, UserName, Password) VALUES ('$forename','$Surname','$Email','$phone','$username', '$h_password')";
     
     if (mysqli_query($con, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
    }
echo '<script>window.location.href = "https://lovejoyantiquedealing.000webhostapp.com/Login.php";</script>';
?>