<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include "_connect.php";
        $in = $_GET['in'];
        $out = $_GET['out'];
        $availableCars = array();
        $bil = "SELECT *, Forsakring, Korttiddygn, korttidkm, Veckoslut, Veckoslutkm, Veckoslutfri FROM `bil` INNER JOIN gruppbet on bil.Gruppbet=gruppbet.Gruppbet WHERE `Regnr` not in (SELECT `Regnr` FROM `hyr` WHERE Indatum AND Utdatum BETWEEN '$out' AND '$in' UNION SELECT `Regnr` FROM `hyr` WHERE Indatum > '$in' AND Utdatum < '$out')";
        $resultBil = mysqli_query($conn, $bil);
        while ($row2 = mysqli_fetch_assoc($resultBil)) {
            $availableCars[] = array($row2['Regnr'], $row2['Marke'], $row2['Modell'], $row2['Matarstallning'], $row2['Antaldygn'], $row2['Forsakring'], $row2['Korttiddygn'], $row2['korttidkm'], $row2['Veckoslut'], $row2['Veckoslutkm'], $row2['Veckoslutfri'], $row2['Gruppbet']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
    <table class="car-data">
        <thead>
            <tr>
                <th>Regnr</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Meter</th>
                <th>Days</th>
                <th>Insurance</th>
                <th>Short-term days</th>
                <th>Short-term km</th>
                <th>Weekend</th>
                <th>Weekend km</th>
                <th>Weekend free</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($availableCars as $value) {
                    echo '
                    <tr>
                        <td>'.$value[0].'</td>'.
                        '<td>'.$value[1].'</td>'.
                        '<td>'.$value[2].'</td>'.
                        '<td>'.$value[3].'</td>'.
                        '<td>'.$value[4].'</td>'.
                        '<td>'.$value[5].'</td>'.
                        '<td>'.$value[6].'</td>'.
                        '<td>'.$value[7].'</td>'.
                        '<td>'.$value[8].'</td>'.
                        '<td>'.$value[9].'</td>'.
                        '<td>'.$value[10].'</td>'.
                        '<td><a href="rent.php?regnr='.$value[0].'&grupp='.$value[11].'&in='.$in.'&out='.$out.'">Rent</a></td>'.
                    '</tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>