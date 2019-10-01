
<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_employee = mysqli_query($mysqli, "SELECT * FROM tbl_employee");

$result_graph = mysqli_query($mysqli, "SELECT * FROM tbl_graph LEFT JOIN tbl_employee ON tbl_employee.emp_name = tbl_graph.emp_name WHERE tbl_graph.month = MONTHNAME(CURRENT_TIMESTAMP) AND tbl_graph.year = YEAR(CURRENT_TIMESTAMP)");
$employee_graph = mysqli_query($mysqli, "SELECT * FROM tbl_graph LEFT JOIN tbl_employee ON tbl_employee.emp_name = tbl_graph.emp_name WHERE tbl_graph.month = MONTHNAME(CURRENT_TIMESTAMP) AND tbl_graph.year = YEAR(CURRENT_TIMESTAMP)");

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
while ($row = mysqli_fetch_array($result_graph)) {?>
                {
                    "country": "<?php echo $row['emp_name'] ?>",
                    "visits": "<?php echo $row['graph_amount'] ?>",
                    "color": "<?php echo $row['emp_color'] ?>"
                },
                <?php }?>
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "country";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 360;
                categoryAxis.gridPosition = "start";

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                graph.balloonText = "[[category]]: <b>[[value]]</b>";
                graph.type = "column";
                graph.colorField = "color";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);
                chart.creditsPosition = "top-right";


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
            <form class="col s12" method="GET" action="graph_sort.php">
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
                    <div class="date">
                    <p  style="text-align:center; font-size:25px;"> Month of <?php echo date('F Y'); ?></p>

                    <div class="graph-table">
                        <div style="margin-top:40px;">
                          <div class="table-responsive">
                                <table class="" style="width: 100%;border-collapse: collapse; border-spacing: 0;display: block;position: relative;">
                                    <thead style="display: block;float: left;border: 0;border-right: 1px solid rgba(0,0,0,0.12);color: rgba(0,0,0,0.6);">
                                        <tr style="display: block;padding: 0 10px 0 0;">
                                            <th style="display: block;text-align: right;margin-top: -20px;">Employee</th>
                                            <th style="display: block;text-align: right;margin-top: -20px;">Sales</th>
                                            <th style="display: block;text-align: right;margin-top: -20px;">Incentives</th>
                                        </tr>
                                    </thead>
                                    <tbody style="display: block; width: auto;position: relative;overflow-x: auto;white-space: nowrap;">
                                    <?php
$i = 1;
while ($graph_row = mysqli_fetch_array($employee_graph)) {
    $id = $graph_row['emp_name'];
    $graph_amount = $graph_row['graph_amount'];
    $amount_sales = $graph_row['amount_sale'];?>
                                        <tr class="del<?php echo $id ?>" style="display: inline-block;vertical-align: top;">
                                            <td style="display: block;min-height: 1.25em;text-align: left;margin-top: -20px;">  <?php echo $graph_row['emp_name']; ?></td>
                                            <td style="display: block;min-height: 1.25em;text-align: left;margin-top: -20px;"><?php echo number_format("$amount_sales"); ?></td>
                                            <td style="display: block;min-height: 1.25em;text-align: left;margin-top: -20px;"><?php echo number_format("$graph_amount"); ?></td>
                                        </tr>
                                            <?php $i++;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div id="chartdiv" style="width: 100%; height: 400px;padding-left:7px;margin-top:30px;"></div>
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
