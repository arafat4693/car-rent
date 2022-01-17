<?php
    $showAlert = false;
    $showError = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        include "_connect.php";
        
        $username = $_POST['username'];
        $addres = $_POST['addres'];
        $postaddres = $_POST['post-addres'];
        $telefon = $_POST['telefon'];
        $mobiltelefon = $_POST['mobil-telefon'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['addres'] = $_POST['addres'];
        $_SESSION['postaddres'] = $_POST['post-addres'];
        $_SESSION['telefon'] = $_POST['telefon'];
        $_SESSION['mobiltelefon'] = $_POST['mobil-telefon'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pass'] = $_POST['password'];

        if(isset($username) && isset($email) && isset($password)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $_SESSION['Hashpass'] = $hash;
            $sql = "INSERT INTO `kund`(`KundNamn`, `Adress`, `Postadress`, `Tel`, `MobilTel`, `Epost`, `Password`) VALUES ('$username','$addres','$postaddres','$telefon','$mobiltelefon','$email','$hash')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("location: profile.php");
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
    <title>sign up</title>
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <form method="post" action="signup.php">
        <h1 class="heading">Sign <span>Up</span></h1>
        <input name="username" type="text" placeholder="username" class="box">
        <input name="addres" type="text" placeholder="addres" class="box">
        <input name="post-addres" type="text" placeholder="post-addres" class="box">
        <input name="telefon" type="number" placeholder="telefon" class="box">
        <input name="mobil-telefon" type="number" placeholder="mobil-telefon" class="box">
        <input name="email" type="email" placeholder="email" class="box">
        <input name="password" type="password" placeholder="password" class="box">
        <input type="submit" class="btn" value="Sign Up">
        <p>already have an account? <a href="login.php">Sign In</a></p>
    </form>
</body>
</html>