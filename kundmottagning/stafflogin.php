<?php
    $staffLogin = false;
    $showError = false;
    $groups = ['kundmottagare', 'admin', 'ekonom'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../_connect.php";
        $uid = $_POST['uid'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($result && in_array($row['grupp'], $groups)){
            $staffLogin = true;
            session_start();
            $_SESSION['staffLogin'] = true;
            $_SESSION['uid'] = $uid;
            $_SESSION['grupp'] = $row['grupp'];
            if($row['grupp'] == 'kundmottagare'){
                header("location: index.php");
            }else if($row['grupp'] == 'admin'){
                header("location: ../admin/index.php");
            }else if($row['grupp'] == 'ekonom'){
                header("location: ../ekonom/index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <form method="post" action="stafflogin.php">
        <h1 class="heading">Staff sign <span>In</span></h1>
        <input name="uid" type="text" placeholder="uid" class="box">
        <input name="password" type="password" placeholder="password" class="box">
        <input type="submit" class="btn" value="Sign In">
    </form>
</body>