<?php
include "_connect.php";
$regnr = $_GET['regnr'];
$grupp = $_GET['grupp'];
$carSql = "SELECT * FROM bil INNER JOIN gruppbet ON bil.Gruppbet = gruppbet.Gruppbet WHERE bil.Regnr = '$regnr'";
$carRes = mysqli_query($conn, $carSql);
$carRow = mysqli_fetch_assoc($carRes);
print_r($carRow);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Rent</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>