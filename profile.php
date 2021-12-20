<?php
$update = true;

session_start();
include "_connect.php";
$row = array();
$username = $_SESSION['username'];
$addres = $_SESSION['addres'];
$postaddres = $_SESSION['postaddres'];
$telefon = $_SESSION['telefon'];
$mobiltelefon = $_SESSION['mobiltelefon'];
$email = $_SESSION['email'];
$pass = $_SESSION['pass'];

$sql = "SELECT `KundId`, `KundNamn`, `Adress`, `Postadress`, `Tel`, `MobilTel`, `Epost`, `Password` FROM `kund` WHERE '$username' = `KundNamn` AND '$addres' = `Adress` AND '$postaddres' = `Postadress` AND '$telefon' = `Tel` AND '$mobiltelefon' = `MobilTel` AND '$email' = `Epost` AND '$pass' = `Password`";
$result = mysqli_query($conn, $sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['KundId'] = $row['KundId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && $update){
    $new_username = $_SESSION['username'] = $_POST['username'];
    $new_addres = $_SESSION['addres'] = $_POST['addres'];
    $new_postaddres = $_SESSION['postaddres'] = $_POST['post-addres'];
    $new_telefon = $_SESSION['telefon'] = $_POST['telefon'];
    $new_mobiltelefon = $_SESSION['mobiltelefon'] = $_POST['mobil-telefon'];
    $new_email = $_SESSION['email'] = $_POST['email'];
    $new_pass = $_SESSION['pass'] = $_POST['password'];

    $updateSql = "UPDATE `kund` SET `KundNamn`='$new_username',`Adress`='$new_addres',`Postadress`='$new_postaddres',`Tel`='$new_telefon',`MobilTel`='$new_mobiltelefon',`Epost`='$new_email',`Password`='$new_pass' WHERE 'KundId = '.$_SESSION['KundId']";
    $updateResult = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <form method="post" action="profile.php">
        <h1 class="heading"><span>Profile</span></h1>
        <div class="yourId">
            <h3 class="userId">User Id: <span><?php echo $row['KundId'];?></span></h3>
            <span class="message">Your user id will be essential to log in. Make sure you remember it.</span>
        </div>
        <input name="username" type="text" placeholder="username" class="box" value=<?php echo $row['KundNamn'];?>>
        <input name="addres" type="text" placeholder="addres" class="box" value=<?php echo $row['Adress'];?>>
        <input name="post-addres" type="text" placeholder="post-addres" class="box" value=<?php echo $row['Postadress'];?>>
        <input name="telefon" type="number" placeholder="telefon" class="box" value=<?php echo $row['Tel'];?>>
        <input name="mobil-telefon" type="number" placeholder="mobil-telefon" class="box" value=<?php echo $row['MobilTel'];?>>
        <input name="email" type="email" placeholder="email" class="box" value=<?php echo $row['Epost'];?>>
        <input name="password" type="password" placeholder="password" class="box" value=<?php echo $row['Password'];?>>
        <input type="submit" class="btn" value="update">
        <p>Login to your account? <a href="login.php">Log In</a></p>
    </form>
</body>
</html>