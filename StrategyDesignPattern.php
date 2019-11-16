<?php 

interface Strategy {
    public function View();
}

class PieChart implements Strategy {
   public function View() {
       
$DB = new Database();  
$Query="SELECT gender, count(*) as number FROM user GROUP BY gender";
$Result=mysqli_query($DB->GetConnection(),$Query);
    ?>
<!DOCTYPE html>
<html lang="en-US">
<body>

<h1>Statistics</h1>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Gender', 'Number'],
  <?php
  while($row = mysqli_fetch_array($Result)){
	  echo "['".$row["gender"]."',".$row["number"]."],";
  }
  ?>
  
]);

  var options = {'title':'Males and females Percentage', 'width':550, 'height':400};

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>

<?php
   }
}

class Graph implements Strategy {
   public function View() {
$DB = new Database();

$Query="SELECT gender, count(*) as number FROM user GROUP BY gender";
$Result=mysqli_query($DB->GetConnection(),$Query);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       <div id="top_x_div" style="width: 900px; height: 500px;"></div>
   

<script>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
  var data = google.visualization.arrayToDataTable([
  ['Gender', 'Number'],
  <?php
  while($row = mysqli_fetch_array($Result)){
	  echo "['".$row["gender"]."',".$row["number"]."],";
  }
  ?>
  
]);
        var options = {
          title: 'Males And Females Percentage',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Males And Females Percentage',
                   subtitle: 'popularity by percentage' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
</script>
<?php
   }
}

class ProductPieChart implements Strategy {
    public function View() {
       
   $DB = new Database();  
   $Query ="SELECT * from products";
   $Result=mysqli_query($DB->GetConnection(),$Query);
   ?>

<!DOCTYPE html>
<title> WareHouse - Pie-Chart </title>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/Home.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="Stars.css">
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="width:600px;">
				<form class="login100-form validate-form">
                <span class="login100-form-title p-b-49">
				     Products Statistics
					</span>

                 <div id="piechart"></div>

                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                 <script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Name', 'Quantity'],
  <?php
  while($row = mysqli_fetch_array($Result)){
	  echo "['".$row["Name"]."',".$row["Quantity"]."],";
  }
  ?>
  
]);

  var options = {'title':'Number of Products among All Warehouses', 'width':550, 'height':400};

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
                </form>
            </div>
            </div>
    </div>
    </body>  
</html>
<?php
   }
} 

class ProductGraph implements Strategy {
          public function View() {
       
   $DB = new Database();  
   $Query ="SELECT * from products";
   $Result=mysqli_query($DB->GetConnection(),$Query);
   ?>

<!DOCTYPE html>
<title> WareHouse - Graph </title>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/Home.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="Stars.css">
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="width:1300px;">
				<form class="login100-form validate-form">
                <span class="login100-form-title p-b-49">
				     Products Statistics
					</span>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       <div id="top_x_div" style="width: 900px; height: 500px;"></div>
   

<script>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
  var data = google.visualization.arrayToDataTable([
  ['Product Name', 'Quantity'],
  <?php
  while($row = mysqli_fetch_array($Result)){
	  echo "['".$row["Name"]."',".$row["Quantity"]."],";
  }
  ?>
  
]);
        var options = {
          title: 'Number of Products among All Warehouses',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Number of Products among All Warehouses',
                   subtitle: 'popularity by percentage' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
</script>
                </form>
            </div>
            </div>
    </div>
    </body>  
</html>
<?php
   }
}

class Context {
    
   private $S;

   public function __construct(Strategy $strategy){
      $this->S = $strategy;
   }

   public function RunStrategy(){
      return $this->S->View();
   }
}

class ST { // If Any Other View Method is required, Only Add the new Implementation and a function for the new Call.
    
    public static function M(){
        $context = new Context(new PieChart());
        $context->RunStrategy();
    }
    public static function F(){
        $context = new Context(new Graph());		
        $context->RunStrategy();
    }
    public static function PChart(){
        $context = new Context(new ProductPieChart());		
        $context->RunStrategy();
    }
    public static function PGraph(){
        $context = new Context(new ProductGraph());		
        $context->RunStrategy();
    }
}
?>