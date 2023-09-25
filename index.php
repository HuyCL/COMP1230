<?php
  require('database_pdo.php');
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Some CSS to make the Webpage prettier --> 
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="index">
    <div id="wrapper">
      <div class="hero">
        <div class="row">
          <div class="large-12 columns">
            <h1> My Guitar Shop</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">

          <?php 
              // Part 0 - Set up
              $numSiteVisits = filter_input(INPUT_GET, 'numSiteVisits', FILTER_VALIDATE_INT);

              if($numSiteVisits == NULL || $numSiteVisits == FALSE) {
                $numSiteVisits = 1; // Set to 1 as default
              }

              // Part 2 - Prepared Statements
              echo "<br>Part2 - Prepared Statements<br>";
              $query = "SELECT * FROM guitar WHERE guitar_wood='spruce'";
              $prepped_query = $db_con->prepare($query);
              $success = $prepped_query->execute();

              if($success) {
                echo "Successful Execution of query<br>";
                $sql_results = $prepped_query->fetchAll();
                var_dump($sql_results);
              }
            
              // Part 3 - Fetch 
              echo "<br><br>Part3 - Fetch <br>";
              

              // Part 4 - foreach 
              echo "<br><br>Part4 - foreach <br>";
          ?>
          
          <table>
            <tr>
              <th>Name</th>
              <th>ID</th>
              <th>Year</th>
              <th>Wood type</th>
            </tr>
            <?php foreach($sql_results as $sql_result) : ?>
              <tr>
                <td><?php var_dump($sql_result['guitar_name']) ?>
                <td><?php var_dump($sql_result['guitar_id']) ?>
                <td><?php var_dump($sql_result['guitar_year']) ?>
                <td><?php var_dump($sql_result['guitar_wood']) ?>
            </tr>
            <?php endforeach ?>
          </table>
          <?php 
            // Part 5 - PHP Arrays
            echo "<br><br>Part5 - PHP Arrays <br>";
            $row_values = array("'taylor'", 5, 2017, "'sapele'");
            $query3 = "INSERT INTO guitar (guitar_name, guitar_id, guitar_year, guitar_wood
                      VALUES ($row_values[0], $row_values[1], $row_values[2], $row_values[3])";
            echo $query3;
            $prepped_query3 = $db_con->prepare($query3);
            $success3 = $prepped_query->execute();

            if($success) {
              echo "<br>Successful execution of query<br>";
            }
          ?>
              
        </div>
      </div>
    </div>
  </body>
</html>
