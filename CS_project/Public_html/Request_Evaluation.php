<?php
require_once('functions/login_SQL.php');

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = htmlspecialchars($_POST["comment"]);
    $Method = $_POST["contactMethod"];

    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
        
    }
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check === false) {
        echo "File is not a valid image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $allowedFileFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFileFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
            
            $con = mysqli_connect('localhost','id21619202_rabor017','Wizard077!','id21619202_account');

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if ($Method == "phone")
                {
                    $Method = phone($_SESSION['username']);
                }
            if ($Method == "email")
                {
                    $Method = email($_SESSION['username']);
                }
            
            $user = $_SESSION['username'];

            $sql = "INSERT INTO evaluation_requests (User, comment, contact_method, photo_path) VALUES ('$user', '$comment', '$Method', '$target_file')";

            if (mysqli_query($con, $sql)) {
                $Message = "Data successfully stored in the database.";
            } else {
                $Message = "Error" ;
            }
            mysqli_close($con);
        } else {
            $Message = "Sorry, there was an error uploading your file.";
        }
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
    <title>Request Evaluation</title>
</head>
<body>
    <body style="background:#FCC">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a href="welcome.php" class="navbar navbar-brand"><h3>lovejoy</h3></a>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a href="welcome.php" class="nav-link">Home</a>
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
        <div class="container">
            <div class="row">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                <h1>Request Evaluation</h1>
                </div>
                    <?php
                    if (isset($Message)) {
                        echo "<p style='color: green;'>$Message</p>";
                    }
                    ?>
                
                    <form method="post" action="" enctype="multipart/form-data">>
                        <label for="comment">Comment:</label><br>
                        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
                
                        <label for="contactMethod">Preferred Contact Method:</label><br>
                        <select id="contactMethod" name="contactMethod" required>
                            <option value="phone">Phone</option>
                            <option value="email">Email</option>
                        </select><br>
                        
                         <label for="photo">Upload Photo:</label>
                        <input type="file" id="photo" name="photo" accept="image/*" required><br>
                
                        <input type="submit" value="Submit Request">
                    </form>
                
                    <br>

</body>
</html>