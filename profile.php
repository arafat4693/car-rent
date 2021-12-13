<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <form method="post" action="profile.php">
        <h1 class="heading"><span>Profile</span></h1>
        <h3>Name: <?php echo $_SESSION['username']?></h3>
        <!-- <input name="id" type="text" placeholder="user id" class="box">
        <input name="username" type="text" placeholder="username" class="box">
        <input name="addres" type="text" placeholder="addres" class="box">
        <input name="post-addres" type="text" placeholder="post-addres" class="box">
        <input name="telefon" type="number" placeholder="telefon" class="box">
        <input name="mobil-telefon" type="number" placeholder="mobil-telefon" class="box">
        <input name="email" type="email" placeholder="email" class="box">
        <input name="password" type="password" placeholder="password" class="box">
        <input type="submit" class="btn" value="update">
        <p>Login to your account? <a href="login.php">Log In</a></p> -->
    </form>
</body>
</html>