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
    <title>ekonom</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
                        $start = $_POST['start'];
                        $stop = $_POST['stop'];
                        $costsArr = array();
                        $everyCar = "SELECT Regnr, SUM(`Kostnad`) as summa, CAST(avg(`Kostnad`) AS decimal(38,0)) as medel, COUNT(*) AS antal FROM hyr WHERE indatum BETWEEN '$start' AND '$stop' GROUP BY `Regnr`";
                        $result = mysqli_query($conn, $everyCar);
                        while($cost = mysqli_fetch_assoc($result)){
                            // $costsArr[] = $cost['summa'];
                            $costsArr[] = array('reg'=>$cost['Regnr'], 'sum'=>$cost['summa']);
                            echo '<tr>
                                    <td>'.$cost['Regnr'].'</td>
                                    <td>'.$cost['summa'].'</td>
                                    <td>'.$cost['medel'].'</td>
                                    <td>'.$cost['antal'].'</td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        if(isset($_POST['search'])){
            $dataPoints = array();
            $x_axis = 0;
            foreach($costsArr as $costArr){
                $x_axis += 10;
                // $dataPoints[] = array("x"=> $x_axis, "y"=> $costArr);
                $dataPoints[] = array("x"=> $x_axis, "y"=> $costArr['sum'], "indexLabel"=> $costArr['reg']);
            }
            // print_r($dataPoints);
        ?>
        <script>
        window.onload = function () {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Statistic of your cars"
            },
            axisY:{
                includeZero: true
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",   
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        
        }
        </script>
        <div id="chartContainer" style="height: 470px; width: 100%; margin-top:4rem;"></div>
        <?php
            }
        ?>
    </section>
</body>
</html>