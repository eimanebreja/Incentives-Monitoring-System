
<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_employee = mysqli_query($mysqli, "SELECT * FROM tbl_employee");

if (isset($_GET['employee_name'])) {
    $employee_name = $_GET['employee_name'];
    $result = mysqli_query($mysqli, "SELECT DISTINCT tbl_graph.emp_name FROM tbl_graph LEFT JOIN tbl_employee ON tbl_employee.emp_name = tbl_graph.emp_name WHERE tbl_graph.emp_name ='$employee_name' AND tbl_graph.year = YEAR(CURRENT_TIMESTAMP)");
    $result_graph_sort = mysqli_query($mysqli, "SELECT * FROM tbl_graph LEFT JOIN tbl_employee ON tbl_employee.emp_name = tbl_graph.emp_name WHERE tbl_graph.emp_name ='$employee_name' AND tbl_graph.year = YEAR(CURRENT_TIMESTAMP)");
} else {
    header('Location:graph.php');
    exit;
}

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);

?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Project Incentives</title>
    <link rel="icon" href="assets/images/icon.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" rel="stylesheet" />
    <script src="amcharts/amcharts.js" type="text/javascript"></script>
    <script src="amcharts/serial.js" type="text/javascript"></script>

     <script>
            var chart;
            var chartData = [
                <?php
while ($row = mysqli_fetch_array($result_graph_sort)) {?>
                {
                    "year": "<?php echo $row['month'] ?>",
                    "sales": "<?php echo $row['amount_sale'] ?>",
                    "incentives": "<?php echo $row['graph_amount'] ?>"
                },
                <?php }?>
            ];


            AmCharts.ready(function() {
        // SERIAL CHART
        chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "year";
        chart.startDuration = 1;
        chart.plotAreaBorderColor = "#DADADA";
        chart.plotAreaBorderAlpha = 1;
        // this single line makes the chart a bar chart
        chart.rotate = false;

        // // AXES
        // // Category
        // var categoryAxis = chart.categoryAxis;
        // categoryAxis.gridPosition = "start";
        // categoryAxis.gridAlpha = 0.1;
        // categoryAxis.axisAlpha = 0;

        // // Value
        // var valueAxis = new AmCharts.ValueAxis();
        // valueAxis.axisAlpha = 0;
        // valueAxis.gridAlpha = 0.1;
        // valueAxis.position = "top";
        // chart.addValueAxis(valueAxis);

        // GRAPHS
        // first graph
        var graph1 = new AmCharts.AmGraph();
        graph1.type = "column";
        graph1.title = "Sales";
        graph1.valueField = "sales";
        graph1.balloonText = "Sales:[[value]]";
        graph1.lineAlpha = 0;
        graph1.fillColors = "#4294DE";
        graph1.fillAlphas = 1;
        chart.addGraph(graph1);


        // second graph
        var graph2 = new AmCharts.AmGraph();
        graph2.type = "column";
        graph2.title = "Incentives";
        graph2.valueField = "incentives";
        graph2.balloonText = "Incentives:[[value]]";
        graph2.lineAlpha = 0;
        graph2.fillColors = "#ADD981";
        graph2.fillAlphas = 1;
        chart.addGraph(graph2);


        // // LEGEND
        // var legend = new AmCharts.AmLegend();
        // chart.addLegend(legend);

        // chart.creditsPosition = "top-right";

        // WRITE
        chart.write("chartdiv");
      });
    </script>



  </head>
  <body>
  <header>
  <ul id="dropdown2" class="dropdown-content">
  <li><a class="modal-trigger" href="#modalpassword">Password</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
    <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    <div class="text-logo">
                    <a href="index.php" class="brand-logo">FEEMO GLOBAL SOLUTIONS PHILIPPINES</a>
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">@<?php echo $user_row['user_name']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </nav>
    </div>
    <div id="modalpassword" class="modal modal-fixed-footer" style="height: 40% !important;">
        <div class="modal-content">
            <h4 style="text-align:center">Change Password</h4>
            <div class="row">
            <form class="col s12" method="POST" action="change-password.php">
                <div class="container">
                    <div class="input-field col s12 m12 l12">
                        <input placeholder="Enter the firstname..." id="user_id" name="user_id" type="hidden" value="<?php echo $user_row['user_id']; ?>" class="validate">
                    </div>
                    <strong> <span id="newPassword" class="required alert"></span></strong>
                    <div class="input-field col s12 m12 l12">
                        <input id="user_password" type="password" name="user_password" class="validate" value="<?php echo $user_row['user_password']; ?>">
                        <label for="user_password">New Password  </label>
                    </div>

                    <div class="input-field col s12 m12 l12 center">
                         <button name="editprof" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>&nbsp;Save</button>
                     </div>
                </div>
                </form>
            </div>
        </div>
    </div>

        <ul style="width:300px; margin-top:65px;" class="side-nav fixed">
            <li class="title-sidenav">PROJECT</li>
            <li><a href="project-list.php"><i class="fa fa-list-alt" aria-hidden="true"></i> List of Project</a></li>
            <li><a href="add-project.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Project</a></li>
            <li><a href="share-project.php"><i class="fa fa-share-alt" aria-hidden="true"></i>Sharing of Project</a></li>
            <li><a href="share-add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Sharing</a></li>
            <li><a href="company.php"><i class="fa fa-building" aria-hidden="true"></i></i>Company</a></li>
            <li><a href="add_company.php"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Add Company</a></li>
            <li class="divider"></li>
            <li class="title-sidenav">EMPLOYEE</li>
            <li><a href="employee-list.php"><i class="fa fa-list-ul" aria-hidden="true"></i>List of Employee</a></li>
            <li><a href="employee-add.php"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Employee</a></li>
            <li class="divider"></li>
            <li class="title-sidenav">GRAPH</li>
            <li><a href="graph.php" class="active"><i class="fa fa-bar-chart" aria-hidden="true"></i>Graph of Employee</a></li>
        </ul>
</header>
<section>
    <div class="body-container">
        <div id="project" class="col s12">
                <div class="section-project">
                    <div class="section-project-title">
                        <p> Employee Graphical Charts According their Incentives</p>
                        <hr>
                    </div>
                    <div class="section-sort-data">
                    <div class="row">
            <form class="col s12" method="get" action="graph_sort.php">
                <div class="row">
                  <div class="col s12 m6 l6">
                  </div>
                   <div class="input-field col s12 m3 l3">
                        <select name="employee_name">
                            <option value="" disabled selected>Choose employee</option>
                            <?php
while ($emp_row = mysqli_fetch_array($result_employee)) {?>
                              <option  value="<?php echo $emp_row['emp_name']; ?>"><?php echo $emp_row['emp_name']; ?></option>
                                    <?php }?>
                            </select>
                            <label>SELECT EMPLOYEE</label>
                        </div>
                    <div class="input-field col s12 m3 l3">
                        <button class="btn waves-effect waves-light" type="submit" name="action">SUBMIT
                        </button>
                    </div>
                </div>
            </form>
        </div>
                    </div>
                    <div class="container">
                    <?php
while ($rows = mysqli_fetch_array($result)) {?>
<p style="font-size:23px;border-bottom:3px solid #c3b47b; text-align:center">
<?php echo $rows['emp_name'] ?>
</p>
<?php }?>
                    </div>

                    <div id="chartdiv" style="width: 100%; height: 400px;"></div>

                </div>
            </div>

    </div>
</section>

  <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="assets/js/init.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/materialize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script>
        $(document).ready(function(){
          $('.tabs').tabs();
        });
  </script>
  <script>
        $(document).ready(function(){
        $('.modal').modal();
        });

</script>

  <script>
      $(".dropdown-trigger").dropdown();
  </script>
<script>
        $(document).ready(function(){
    $('select').formSelect();
  });


</script>


</body>
</html>
