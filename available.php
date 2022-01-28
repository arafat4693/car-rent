<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include "_connect.php";
        $in = $_GET['in'];
        $out = $_GET['out'];
        $bil = "SELECT `Regnr` FROM `bil`";
        $hyr = "SELECT `Regnr` FROM `hyr` WHERE `Regnr` BETWEEN '$out' AND '$in'";
        $resultHyr = mysqli_query($conn, $hyr);
        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo $row['columnName']; 
        //   }
        $row = mysqli_num_rows($resultHyr);
        print_r($row);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>available cars</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- header section starts -->
    <header>
        <a href="index.php" class="logo">LOGO<span>.</span></a>
        <nav class="navbar">
            <a href="index.php" class="active">home</a>
            <a href="index.php">service</a>
            <a href="index.php">cars</a>
            <a href="index.php">Brands</a>
            <a href="index.php">contact</a>
        </nav>
    </header>
    <!-- header section ends -->
    <h1 class="heading history">available <span>cars</span> </h1>
</body>
</html>