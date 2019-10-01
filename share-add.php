
<?php
header('Content-Type: text/html; charset=utf-8');
?>
<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_project = mysqli_query($mysqli, "SELECT * FROM tbl_project");
$result_price = mysqli_query($mysqli, "SELECT * FROM tbl_project");
$result_employee = mysqli_query($mysqli, "SELECT * FROM tbl_employee");

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);

?>

<?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=project_db", "root", "");
function fill_unit_select_box($connect)
{
    $output = 'Choose Employee';
    $query = "SELECT * FROM tbl_employee";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["emp_name"] . '">' . $row["emp_name"] . '</option>';
    }
    return $output;
}
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

    <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="assets/js/init.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/materialize.js"></script>

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
            <li><a href="share-add.php" class="active"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Sharing</a></li>
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
                        <p>Add Sharing Project</p>
                        <hr>
                    </div>
                    <div class="section-sharing-form">
                    <div class="row">
                        <form class="col s12" id="add_sharings">
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="project_name">
                                    <option value="" disabled selected>Choose project</option>
                                    <?php
while ($proj_row = mysqli_fetch_array($result_project)) {?>
                                    <option  value="<?php echo $proj_row['proj_project']; ?>"><?php echo $proj_row['proj_project']; ?></option>
                                    <?php }?>
                                    </select>
                                    <label>SELECT PROJECT</label>
                                </div>
                                <div class="input-field col s12">
                                    <select name="price">
                                    <option value="" disabled selected>Choose Price</option>
                                    <?php
while ($proj_row = mysqli_fetch_array($result_price)) {
    $incentives_price = $proj_row['proj_incentive'];?>
                                    <option  value="<?php echo $proj_row['proj_salesprice']; ?>"><?php echo $proj_row['proj_project']; ?> = Php <?php echo number_format("$incentives_price"); ?>.00</option>
                                    <?php }?>
                                    </select>
                                    <label>SELECT PRICE</label>
                                </div>
                                <div id="dynamic_field">
                                <div class="input-field col s12 m6 l6">
                                    <select name="employee_name[]">
                                    <option value="" disabled selected>Choose employee</option>
                                    <?php
while ($emp_row = mysqli_fetch_array($result_employee)) {?>

                                    <option  value="<?php echo $emp_row['emp_name']; ?>"><?php echo $emp_row['emp_name']; ?></option>
                                    <?php }?>
                                    </select>
                                    <label>SELECT EMPLOYEE</label>
                                </div>

                                <div class="input-field col s12 m5 l5">
                                    <input id="measure" name="measurement[]" type="text" class="validate">
                                    <label for="measure">Average</label>
                                </div>
                                <div class="input-field col s12 m1 l1" style="padding-right:10px;">
                                <button type="button" name="add" id="add" style="background-color:transparent; box-shadow:none; width:2%;height:2%;border-radius:50px;" class="btn btn-success"><span style="color:#c3b47b"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></button>
                                </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="form-add-project-btn">
                                <button name="add_project" id="submit" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>&nbsp;Submit</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
    </div>
</section>


<!-- <script>
        $(document).ready(function(){

              // initialize

            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append(
                    ' <div id="dynamic_field"><div class="input-field col s12 m6 l6"><select name="employee_name[]"><option value="" disabled selected>Choose employee</option><?php while ($emp_row = mysqli_fetch_array($result_employee)) {?><option  value="<?php echo $emp_row['emp_id']; ?>"><?php echo $emp_row['emp_name']; ?></option><?php }?></select><label>SELECT EMPLOYEE</label></div> <div class="input-field col s12 m6 l6"> <input id="measure" name="measurement[]" type="text" class="validate"><label for="measure">Average</label></div></div> ');
                    $('select').formSelect();
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });

            $('#submit').click(function(){
                $.ajax({
                    async: true,
                    url: "select_sharing.php",
                    method: "POST",
                    data: $('#select_sharing').serialize(),
                    success:function(rt)
                    {
                        alert(rt);
                        $('#select_sharing')[0].reset();
                    }
                });
            });
        });


    </script> -->

    <script>
$(document).ready(function(){

 $(document).on('click', '#add', function(){
  var html = '';
  html += '<div class="remove-content">';
  html += '<div class="input-field col s12 m6 l6">';
  html += '<select name="employee_name[]"><option value=""><?php echo fill_unit_select_box($connect); ?></option></select><label>SELECT EMPLOYEE</label>';
  html += '</div>';
  html += '<div class="input-field col s12 m5 l5">';
  html += ' <input id="measure" name="measurement[]" type="text" class="validate"><label for="measure">Average</label>';
  html += '</div>';
  html += ' <div class="input-field col s12 m1 l1" style="text-align:left">';
  html += '<button style="background-color:transparent; box-shadow:none; width:2%;height:2%;border-radius:50px;" type="button" name="remove" class="btn btn-danger btn-sm remove"><span style="color:red"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></button>';
  html += '</div>';
  html += '</div>';


  $('#dynamic_field').append(html);
  $('select').formSelect();
 });

 $(document).on('click', '.remove', function(){
  $(this).closest('.remove-content').remove();
 });

 $('#submit').click(function(){
                $.ajax({
                    async: true,
                    url: "add_sharings.php",
                    method: "POST",
                    data: $('#add_sharings').serialize(),
                    success:function(rt)
                    {
                        alert(rt);
                        $('#add_sharings')[0].reset();
                    }
                });
            });

});
</script>

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
