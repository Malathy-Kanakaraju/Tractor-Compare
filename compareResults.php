<?php 
session_start();

if(!isset($_POST['compareNow'])) {
    header("Location: index.php");
    exit();
}

require_once 'config.php';

unset($conditionStatement);

if (isset($_POST['budget']) && $_POST['budget'] !== 'null') {
    $budget = trim(stripslashes($_POST['budget']));
    switch($budget) {
        case 'b3l':
            $budget = "base_mrp < 300000 ";
            break;
        case '3lt5l':
            $budget = "base_mrp BETWEEN 300000 AND 500000 ";
            break;
        case '5lt10l':
            $budget = "base_mrp BETWEEN 500000 AND 1000000 ";
            break;
    }
    $conditionStatement[] = $budget;
}
if (isset($_POST['hp']) && $_POST['hp'] !== 'null') {
    $hp = trim(stripslashes($_POST['hp']));
    switch ($hp) {
        case 'b20':
            $hp = "horse_power < 20 ";
            break;
        case '20t40':
            $hp = "horse_power BETWEEN 20 AND 40 ";
            break;
        case '40t60':
            $hp = "horse_power  BETWEEN 40 AND 60 ";
            break;
    }
    $conditionStatement[] = $hp;
}
if (isset($_POST['brand']) && $_POST['brand'] !== 'null') {
    $brand = trim(stripslashes($_POST['brand']));
    $brand = " tractor_brand = '$brand' ";
    $conditionStatement[] = $brand;
}

$baseSql = "SELECT * FROM t1_tractors";
if (!empty($conditionStatement)) {
    $baseSql .= " WHERE " . implode(" AND ", $conditionStatement);
}

$result = mysqli_query($dbConn, $baseSql);

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tractor Comparison Results</title>
<!--
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
-->        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="js/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                    <div class="header">
                        <h2 class="text-center">Tractor search results</h2>
                    </div>
                    <div class="col-sm-12" id="searchResults" style=" background-color: lightgray; ">
        <?php 
            if (mysqli_num_rows($result) > 0 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-sm-4" style="float:left;">
                            <div class="col-md-12" style="background-color: #fff; padding: 10px; margin: 5px;border: 1px solid grey;">
                                <img src="images/s_img_new.png" width="300" height="230" alt="tractor" class="img-responsive"/>
                                <a href="showData.php?id=<?php echo $row['tractor_id']?>"><?php echo $row['tractor_brand']; ?></a><br />
                                Horse Power : <?php echo $row['horse_power']; ?><br />
                                MRP : <?php echo $row['base_mrp']; ?>
                            </div>
                        </div>
            <?php 
            } 
            } else {
                ?>
                        <h2 class="text-center">Sorry! No data found for your search</h2>
<?php            }
        ?>
        </script>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
</html>
