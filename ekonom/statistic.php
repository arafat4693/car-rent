<?php
    session_start();
    include "../_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section>
        <h1 class="heading"><span>Statistic</span></h1>
        <form method="post" class="statistic">
            <input name="start" type="date" placeholder="start date" class="box">
            <input name="stop" type="date" placeholder="stop date" class="box">
            <input type="submit" class="btn" value="Count" name="search">
        </form>
        <div style="margin-top: 3rem;">
            <h1 class="heading"><span>Income</span></h1>
            <table class="car-data">
                <thead>
                    <tr>
                        <th>Sum</th>
                        <th>Average</th>
                        <th>Rented cars</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST['search'])){
                        $start = $_POST['start'];
                        $stop = $_POST['stop'];
                        $incomesql = "SELECT SUM(`Kostnad`) as summa, CAST(avg(`Kostnad`) AS decimal(38,0)) as medel, COUNT(*) AS antal
                        FROM hyr WHERE indatum BETWEEN '$start' AND '$stop'";
                        $res = mysqli_query($conn, $incomesql);
                        $kostander = mysqli_fetch_assoc($res);
                        if($kostander){
                            echo '<tr>
                                    <td>'.$kostander['summa'].'</td>
                                    <td>'.$kostander['medel'].'</td>
                                    <td>'.$kostander['antal'].'</td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 3rem;">
            <h1 class="heading"><span>Income</span> per car</h1>
            <table class="car-data">
                <thead>
                    <tr>
                        <th>Regnr</th>
                        <th>Sum</th>
                        <th>Average</th>
                        <th>Rented cars</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST['search'])){
                        // SELECT Regnr, SUM(`Kostnad`) as summa, CAST(avg(`Kostnad`) AS decimal(38,0)) as medel, COUNT(*) AS antal FROM hyr WHERE indatum BETWEEN '2021-12-01' AND '2021-12-30' GROUP BY `Regnr`
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>