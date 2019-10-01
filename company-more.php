
<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$get_id = $_GET['id'];

$result_companymore = mysqli_query($mysqli, "SELECT * FROM tbl_company WHERE comp_id='$get_id'");
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
                    <div class="company-list-body">
                        <div class="company-list-more">
                            <div class="company-list-more-bg">
                                <form method="POST" action="edit_company_query.php">
                                <?php
$i = 1;
while ($company_row = mysqli_fetch_array($result_companymore)) {
    $id = $company_row['comp_id'];
    $status = $company_row['comp_status'];
    $division = $company_row['comp_division'];

    ?>
                                    <div class="company-list-flex">
                                        <div class="company-list-picture">
                                            <img src="assets/images/company-image.png" />
                                        </div>
                                        <div class="company-list-code-name">
                                            <div class="company-code">
                                                <p>Company Code</p>
                                                <input id="comp_id" name="comp_id" type="hidden" class="validate" value="<?php echo $company_row['comp_id']; ?>">
                                                <input  name="company_code" type="text" value="<?php echo $company_row['comp_code']; ?>">
                                            </div>
                                            <div class="company-name">
                                                <p>Company Name</p>
                                                <input type="text" name="company_name" value="<?php echo $company_row['comp_name']; ?> " placeholder="Company name">

                                            </div>
                                            <div class="company-name">
                                                <p></p>
                                                <input type="text" name="company_namesec" value="<?php echo $company_row['comp_namesec']; ?> " placeholder="Company name">

                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Display Name</p>
                                            </div>
                                            <div class="input">
                                            <input name="display_name" type="text" value="<?php echo $company_row['comp_displayname']; ?> " placeholder="Display name">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Post Code</p>
                                            </div>
                                            <div class="input">
                                            <input  name="post_code" type="text" value="<?php echo $company_row['comp_postcode']; ?> " placeholder="Post code">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Company Address</p>
                                            </div>
                                            <div class="input">
                                            <input name="address" type="text" value="<?php echo $company_row['comp_address']; ?> " placeholder="Company address">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Building Name</p>
                                            </div>
                                            <div class="input">
                                            <input  name="building_name" type="text" value="<?php echo $company_row['comp_buildingname']; ?> " placeholder="Building name">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Tel</p>
                                            </div>
                                            <div class="input">
                                            <input  name="tel"  type="text" value="<?php echo $company_row['comp_tel']; ?> " placeholder="Tel">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Fax</p>
                                            </div>
                                            <div class="input">
                                                 <input name="fax" type="text" value="<?php echo $company_row['comp_fax']; ?> " placeholder="Fax">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Url</p>
                                            </div>
                                            <div class="input">
                                            <input  type="text" name="url" value="<?php echo $company_row['comp_url']; ?> " placeholder="Url">
                                            </div>
                                        </div>
                                        <div class="company-list-input-radio margin-gap">
                                            <div class="label">
                                                <p>Status</p>
                                            </div>
                                            <div class="input">
                                                <p>
                                                    <label>
                                                        <input name="status" value="未顧客" type="radio" <?php echo ($status == '未顧客') ? 'checked' : '' ?> />
                                                        <span>未顧客</span>
                                                    </label>
                                                    <label>
                                                        <input name="status" value="顧客" type="radio" <?php echo ($status == '顧客') ? 'checked' : '' ?> />
                                                        <span>顧客</span>
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="company-list-input-radio margin-gap">
                                            <div class="label">
                                                <p>Division</p>
                                            </div>
                                            <div class="input">
                                                <p>
                                                    <label>
                                                        <input name="division" value="法人" type="radio" <?php echo ($division == '法人') ? 'checked' : '' ?> />
                                                        <span>法人</span>
                                                    </label>
                                                    <label>
                                                        <input name="division" value="個人" type="radio" <?php echo ($division == '個人') ? 'checked' : '' ?> />
                                                        <span>個人</span>
                                                    </label>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Industry</p>
                                            </div>
                                            <div class="input">
                                                <select name="industry">
                                                    <option value="<?php echo $company_row['comp_industry']; ?>" selected><?php echo $company_row['comp_industry']; ?></option>
                                                    <option value="農業">農業</option>
                                                    <option value="林業">林業</option>
                                                    <option value="漁業">漁業</option>
                                                    <option value="鉱業">鉱業</option>
                                                    <option value="建設業">建設業</option>
                                                    <option value="製造業">製造業</option>
                                                    <option value="電気・ガス・熱供給・水道業">電気・ガス・熱供給・水道業</option>
                                                    <option value="情報通信業">情報通信業</option>
                                                    <option value="卸売・小売業">卸売・小売業</option>
                                                    <option value="金融・保険業">金融・保険業</option>
                                                    <option value="不動産業">不動産業</option>
                                                    <option value="飲食店・宿泊業">飲食店・宿泊業</option>
                                                    <option value="教育・学習支援業">教育・学習支援業</option>
                                                    <option value="複合サービス業">複合サービス業</option>
                                                    <option value="サービス業（他に分類されないもの）">サービス業（他に分類されないもの）</option>
                                                    <option value="公務（他に分類されないもの）">公務（他に分類されないもの）</option>
                                                    <option value="医療、福祉業">医療、福祉業</option>
                                                    <option value="分類不能の廃業">分類不能の廃業</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Register Date</p>
                                            </div>
                                            <div class="input">
                                            <input  type="text" name="register_date" value="<?php echo $company_row['comp_regdate']; ?> " placeholder="Url">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="label">
                                                <p>Update date</p>
                                            </div>
                                            <div class="input">
                                            <input  type="text" name="update_date" value="<?php date_default_timezone_set('Asia/Manila');
    echo date('Y-m-d H:i:s');?>" placeholder="Url">
                                            </div>
                                        </div>
                                        <div class="company-list-input margin-gap">
                                            <div class="button">
                                                 <button name="edit_company" class="waves-effect waves-light btn-small">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </form>
                            </div>
                        </div>




                        <?php
$i = 1;
while ($company_row = mysqli_fetch_array($result_companymore)) {
    $id = $company_row['comp_id'];

    ?>
    <p> <?php echo $company_row['comp_name']; ?> </p>

<?php }?>

                     </div>
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
        <script>
       $(document).ready(function(){
    $('select').formSelect();
  });
      </script>


</body>
</html>
