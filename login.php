<?php
    $login = false;
    $showError = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "_connect.php";
        $userId = $_POST['userId'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM kund WHERE KundId='$userId'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['Password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['userId'] = $userId;
                $_SESSION['dinId'] = $userId;
                header("location: index.php");
            }else{
                $showError = "Invalid credentials";
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
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <form method="post" action="login.php">
        <h1 class="heading">Sign <span>In</span></h1>
        <input name="userId" type="number" placeholder="user id" class="box">
        <input name="password" type="password" placeholder="password" class="box">
        <input type="submit" class="btn" value="Sign In">
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
</body>
</html>