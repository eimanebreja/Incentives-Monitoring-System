<?php
header('Content-Type: text/html; charset=utf-8');
?>
<?php include 'session.php';?>

<?php
include_once "dbcon.php";
$result = mysqli_query($mysqli, "SELECT * FROM tbl_project ORDER BY proj_orderdate DESC");
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
            <li><a href="project-list.php" class="active"><i class="fa fa-list-alt" aria-hidden="true"></i> List of Project</a></li>
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
            <li><a href="graph.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Graph of Employee</a></li>
        </ul>
</header>
<section>
    <div class="body-container">
        <div id="project" class="col s12">
                <div class="section-project">
                    <div class="section-project-title">
                        <p>List of Project</p>
                        <hr>
                    </div>

                    <div class="section-project-table">
                        <table class="striped highlight">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Project Name</th>
                                <th>JPY Price</th>
                                <th>Sales Price</th>
                                <th>Order</th>
                                <th>Deadline</th>
                                <th>Delivery</th>
                                <th>Invoice</th>
                                <th>Payment</th>
                                <th>Incentives</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

$i = 1;
while ($project_row = mysqli_fetch_array($result)) {
    $id = $project_row['proj_id'];
    $sales_price = $project_row['proj_salesprice'];
    $project_price = $project_row['proj_price'];
    $project_incentives = $project_row['proj_incentive'];
    ?>
                            <tr class="del<?php echo $id ?>" style="font-size:12px;">
                                <td><?php echo "$i."; ?></td>
                                <td><?php echo $project_row['proj_company']; ?></td>
                                <td style="font-weight:100"><?php echo $project_row['proj_project']; ?></td>
                                <td style="text-align:right;padding-right:40px;"><?php echo number_format("$project_price"); ?></td>
                                <td style="text-align:right;padding-right:40px;"><?php echo number_format("$sales_price"); ?></td>
                                <td style="font-size:12px;"><?php echo $project_row['proj_orderdate']; ?></td>
                                <td style="font-size:12px;"><?php echo $project_row['proj_deaddate']; ?></td>
                                <td style="font-size:12px;"><?php echo $project_row['proj_deliverdate']; ?></td>
                                <td style="font-size:12px;"><?php echo $project_row['proj_invoicedate']; ?></td>
                                <td style="font-size:12px;"><?php echo $project_row['proj_paymentdate']; ?></td>
                                <td style="font-size:12px;"><?php echo $project_row['proj_incentdate']; ?></td>
                                <td style="font-size:12px;">
                                <a rel="tooltip" style="color:red"  title="Delete" class="modal-trigger delete" id="<?php echo $id; ?>" href="#delete_project<?php echo $id; ?>"> <i class="fa fa-trash-o"  aria-hidden="true"></i> </a> &nbsp;&nbsp;
                                <?php include 'modal-delete-project.php';?>
                                <a rel="tooltip" style="color:black"  title="Edit" class="modal-trigger edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <?php include 'modal-edit-project.php';?>
                                </td>
                            </tr>
                            <?php $i++;}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</section>


    <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="assets/js/init.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/materialize.js"></script>
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
