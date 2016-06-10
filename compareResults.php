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
            $budget = "base_mrp BETWEEN 30000 AND 50000 ";
            break;
        case '5lt10l':
            $budget = "base_mrp BETWEEN 50000 AND 10000 ";
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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        
    </head>
    <body>
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                    <div class="header">
                        <h2 class="text-center">Tractor search results</h2>
                    </div>
                    <div class="col-sm-12" id="searchResults">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        <?php 
            if (mysqli_num_rows($result) > 0 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    var holder = document.getElementById("searchResults");
                    div = document.createElement("div");
                    div.appendChild(document.createTextNode("Tractor1"));
                    br = document.createElement("br");
                    div.style.border = "1px solid black";
                    div.style.cssFloat = "left";
                    div.style.height = "200px";
                    div.className = "col-sm-4";
                    div.appendChild(document.createTextNode("--MRP : "+<?php echo $row['base_mrp']?>));
                    div.appendChild(document.createTextNode("--Brand : "+<?php echo "'".$row['tractor_brand']."'"?>));
                    div.appendChild(document.createTextNode("--Horse Power : "+<?php echo $row['horse_power']?>));
                    holder.appendChild(div);
                    <?php
            }
            } else {
                ?>
              var holder = document.getElementById("searchResults");
              
            div = document.createElement("div");
            div.appendChild(document.createTextNode("Sorry! No data found"));
            div.style.textAlign = "center";
            holder.appendChild(div);
            
<?php            }
        ?>
        </script>
</html>
