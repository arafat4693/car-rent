<?php
    include "_connect.php";
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
    <form>
        <h1 class="heading">Sign <span>Up</span></h1>
        <input type="text" placeholder="username" class="box">
        <input type="email" placeholder="email" class="box">
        <input type="password" placeholder="password" class="box">
        <input type="submit" class="btn" value="Sign Up">
        <p>already have an account? <a href="login.php">Sign In</a></p>
    </form>
</body>
</html>