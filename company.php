
<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_company = mysqli_query($mysqli, "SELECT * FROM tbl_company");
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
            <li><a href="project-list.php"><i class="fa fa-list-alt" aria-hidden="true"></i> List of Project</a></li>
            <li><a href="add-project.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Project</a></li>
            <li><a href="share-project.php"><i class="fa fa-share-alt" aria-hidden="true"></i>Sharing of Project</a></li>
            <li><a href="share-add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Sharing</a></li>
            <li><a href="company.php" class="active"><i class="fa fa-building" aria-hidden="true"></i></i>Company</a></li>
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
        <div class="row">
            <div id="project" class="col s12 m12 l12">
                    <div class="section-project">
                        <div class="section-project-title">
                            <p>Company List</p>
                            <hr>
                        </div>

                       <div class="section-project-table">
                        <table class="striped highlight">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Tel</th>
                                <th>Fax</th>
                                <th>Url</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
$i = 1;
while ($company_row = mysqli_fetch_array($result_company)) {
    $id = $company_row['comp_id'];
    $status = $company_row['comp_status'];
    $division = $company_row['comp_division'];
    ?>
                            <tr class="del<?php echo $id ?>">
                                <td><?php echo $company_row['comp_code']; ?></td>
                                <td> <a id="<?php echo $id; ?>" href="company-more.php<?php echo '?id=' . $id; ?>"><?php echo $company_row['comp_name']; ?></a></td>
                                <td><?php echo $company_row['comp_address']; ?></td>
                                <td><?php echo $company_row['comp_tel']; ?></td>
                                <td><?php echo $company_row['comp_fax']; ?></td>
                                <td><a target="_blank" href="<?php echo $company_row['comp_url']; ?>"><?php echo $company_row['comp_url']; ?></a></td>


                                <td>
                                <a rel="tooltip" style="color:red"  title="Delete" class="modal-trigger delete" id="<?php echo $id; ?>" href="#delete_company<?php echo $id; ?>"> <i class="fa fa-times-circle" aria-hidden="true"></i> </a> &nbsp;&nbsp;
                             <?php include 'modal-delete-company.php';?>

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
    $('.collapsible').collapsible();
  });
      </script>


</body>
</html>
