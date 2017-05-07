<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Pawfit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- BootStrap code -->
  <link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="jquery/3.2.1/jquery.min.js"></script>
  <script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/bootstrap-rating-input.min.js"></script>
  <script src="js/feedback.js"></script>
  <!-- Link to style.css -->
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!-- Top nav bar links -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            🐾Pawfit
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar-collapse" class="navbar-collapse">
          <ul class="nav navbar-nav">
        		<li class="active"><a href="Products.html">Products</a></li>
        		<li><a href="People.html">People</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- end navbar-->
  <div class="container">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Name</th>
          <th>Feedback</th>
          <th>Score</th>
          <th>Product</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $name = $_POST['name'];
        $feedback = $_POST['feedback'];
        $score = $_POST['score'];
        $product = $_POST['product'];
        $connectionstring = mysql_connect('localhost', 'my_pawfit', 'password' )
        or die('Could not connect: ' . mysql_error());
        mysql_select_db ('my_pawfit')
        or die('Could not select database: ' . mysql_error());

        //create insert SQL string
        $Insert = "INSERT INTO CustomerFeedback (Name, Feedback, Score, Product) VALUES ('$name', '$feedback', $score, '$product')";

        //insert into database
        $results = mysql_query($Insert)
        or die('Could not insert into database: ' . mysql_error());
        //SQL query
        $Query = 'SELECT * FROM CustomerFeedback WHERE 1';
        //execute query
        $queryexe = mysql_query($Query)
        or die('Could not query database: ' . mysql_error());
        //query database
        while($dataArray = mysql_fetch_array($queryexe, MYSQL_ASSOC))
        {
        echo "<tr>\n";
        foreach ($dataArray as $col_value) {
        echo "\t<td>$col_value</td>\n";
        }
        echo "</tr>\n";
        }
        // Free resultset
        mysql_free_result($queryexe)
        or die('Could not free result: ' . mysql_error());
        //disconnect from database
        mysql_close($connectionstring)
        or die('Could not close database: ' . mysql_error());
      ?>
      </tbody>
    </table>
  </div>
</body>
</html>
