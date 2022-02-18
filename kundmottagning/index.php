<?php
    session_start();
    include "../_connect.php";
    if($_SESSION['staffLogin'] != true){
        header("location: stafflogin.php");
    }

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $signout = $_POST['signout'];
    //     if($signout){
    //         $_SESSION['loggedin'] = false;
    //         header("location: login.php");
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kund mottagare</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section class="staff_container">
        <h1 class="heading" style="margin-top:10px;">Rented <span>Cars</span></h1>
        <div class="rented_cars">
            <p>your id: <span>a</span></p>
            <p>your name: <span>b</span></p>
            <p>regnr: <span>c</p>
            <p>utdatum: <span>d</p>
            <p>indatum: <span>e</p>
            <p>Insurance: <span>f</span></p>
        </div>
    </section>
</body>
</html>