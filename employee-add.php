<?php include 'session.php';?>

<?php
include_once "dbcon.php";

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
            <li><a href="company.php"><i class="fa fa-building" aria-hidden="true"></i></i>Company</a></li>
            <li><a href="add_company.php"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Add Company</a></li>
            <li class="divider"></li>
            <li class="title-sidenav">EMPLOYEE</li>
            <li><a href="employee-list.php"><i class="fa fa-list-ul" aria-hidden="true"></i>List of Employee</a></li>
            <li><a href="employee-add.php" class="active"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Employee</a></li>
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
                        <p>Add Employee</p>
                        <hr>
                    </div>
                    <div class="section-adding-employee">
                        <form method="POST" action="add_employee_query.php">
                            <div class="row">
                                <div class="col s6 m6 l6">
                                    <div class="image-profile" style="padding-bottom:30px;">
                                    <img src="upload/user.png" name="imagePhoto" height="150" width="150">
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="input-field col s12 m12 l12">
                                        <input  id="firstname" name="firstname" type="text" class="validate" placeholder="">
                                        <label for="firstname">Firstname</label>
                                    </div>
                                    <div class="input-field col s12 m12 l12">
                                        <input  id="lastname" name="lastname" type="text" class="validate" placeholder="">
                                        <label for="lastname">Lastname</label>
                                    </div>
                                </div>
                                <div class="col s12 m12 l12">
                                <div class="input-field col s12">
                                    <select name="position">
                                    <option value="" disabled selected>Choose position</option>
                                    <option  value="Web Developer">Web Developer</option>
                                    <option  value="Designer">Designer</option>
                                    <option  value="Bridge">Bridge</option>
                                    </select>
                                    <label>SELECT POSITION</label>
                                </div>
                                    <div class="input-field col s12 m12 l12">
                                        <input  id="email" name="email" type="email" class="validate" placeholder="">
                                        <label for="email">Email Address</label>
                                    </div>
                                    <div class="input-field col s12 m12 l12">
                                        <input  id="telephone" name="phone" type="text" class="validate" placeholder="">
                                        <label for="telephone">Telephone Number</label>
                                    </div>
                                    <div class="input-field col s12 m12 l12">
                                        <input  id="address" name="address" type="text" class="validate" placeholder="">
                                        <label for="address">Address</label>
                                    </div>
                                    <!-- <div class="input-field col s12 m12 l12">
                                        <label for="color">Chart Color</label>
                                    </div> -->
                                    <div class="input-field col s12 m12 l12">
                                    <input id="color" class="jscolor"  type="text" name="color" value="ab2567" placeholder="">
                                    <label for="color">Chart Color</label>
                                        <!-- <input  id="color" name="color" type="text" class="validate"> -->
                                    </div>
                                    <button style="background-color:#b1a05d; margin-left:100px;" name="addemploy" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>&nbsp;Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>
</section>











  <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="assets/js/init.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/materialize.js"></script>
    <script src="assets/js/jscolor.js"></script>
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
      $(".dropdown-trigger").dropdown();
  </script>
    <script>
        $(document).ready(function(){
    $('select').formSelect();
  });


</script>


</body>
</html>
