
<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_company = mysqli_query($mysqli, "SELECT LPAD(comp_code, 3, '0') AS code FROM tbl_company ORDER BY comp_id DESC LIMIT 1");

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
            <li><a href="add_company.php" class="active"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Add Company</a></li>
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
            <div class="col s12 m12 l12">
                <div class="add-company">
                    <div class="add-company-tile">
                        <p>Add Company</p>
                    </div>

                    <div class="add-company-body">
                        <div class="add-company-form-content">
                            <form method="POST" action="add_company_query.php">
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Company Code</p>
                                        </div>
                                    </div>
                                    <div class="form-input small">
                                        <div class="form-input-content">
                                        <?php

$i = 1;
while ($comp_row = mysqli_fetch_array($result_company)) {
    $id = $comp_row['code'];
    $code_sum = $id + 1;
    $codes = str_pad($code_sum, 3, "0", STR_PAD_LEFT);
    ?>
                                        <input id="company-code" name="company_code" type="text" value="<?php echo $codes; ?>"  />
                                        <?php }?>
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Company Name</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                            <input name="company_name" type="text" required  />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                            <input name="company_name_two" type="text"  />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Display Name</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                            <input name="display_name" type="text" required  />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Post Code</p>
                                        </div>
                                    </div>
                                    <div class="form-input small">
                                        <div class="form-input-content">
                                            <input name="post_code" type="text" required  />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Company Address</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                            <input name="address" type="text" required   />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Building Name</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                            <input name="building_name" type="text" required   />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Tel</p>
                                        </div>
                                    </div>
                                    <div class="form-input medium">
                                        <div class="form-input-content">
                                            <input name="tel" type="text" required   />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Fax</p>
                                        </div>
                                    </div>
                                    <div class="form-input medium">
                                        <div class="form-input-content">
                                            <input name="fax" type="text" required  />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>URL</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                            <input name="url" type="text" required  />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Status</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content radio">
                                             <label><input name="status" type="radio" value="未顧客" /> <span>未顧客</span> </label>
                                            <label> <input name="status" type="radio" value="顧客" /><span>顧客</span> </label>
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Division</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content radio">
                                             <label><input name="division" type="radio" value="法人" /> <span>法人</span> </label>
                                            <label> <input name="division" type="radio" value="個人" /><span>個人</span> </label>
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Industry</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                          <select name="industry">
                                                <option value="" disabled selected>Choose your option</option>
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
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Registration Date</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                        <input name="register_date" type="text" value="<?php date_default_timezone_set('Asia/Manila');
echo date('Y-m-d H:i:s');?>"  />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex">
                                    <div class="form-label">
                                        <div class="form-label-content">
                                            <p>Update Date</p>
                                        </div>
                                    </div>
                                    <div class="form-input large">
                                        <div class="form-input-content">
                                        <input name="update_date" type="text"  value="<?php date_default_timezone_set('Asia/Manila');
echo date('Y-m-d H:i:s');?>" />
                                        </div>
                                     </div>
                                </div>
                                <div class="form-input-flex button">
                                    <div class="button-content">
                                        <div class="form-input-content">
                                        <button name="add_company" type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;Submit</button>
                                        </div>
                                     </div>
                                </div>
                            </form>
                        </div>
                     </div>
                    <!-- <div class="add-company-form">
                         <div class="row">
                            <form class="col s12" method="POST" action="add_company_query.php">
                                <div class="row">
                                   <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="company_name">会社名</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l3">
                                        <input id="company_name" name="company_name" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l2">
                                       <div class="label-field">
                                            <label for="display_name">表示名</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l3">
                                        <input id="display_name" name="display_name" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="phonetic">フリガナ</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="phonetic" name="phonetic" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="zip_code">郵便番号</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="zip_code" name="zip_code" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="address">住所</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="address" name="address" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="building_name">ビル・建物名</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="building_name" name="building_name" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="telephone">tel</label>
                                        </div>
                                    </div>
                                    <div class=" col s4 m2 l2">
                                        <input id="telephone1" maxlength="2" name="telephone1" type="text" class="validate" placeholder="xx">
                                     </div>
                                     <div class=" col s4 m2 l2">
                                        <input id="telephone2" maxlength="4" name="telephone2" type="text" class="validate" placeholder="xxxx">
                                     </div>
                                     <div class=" col s4 m2 l2">
                                        <input id="telephone3"  maxlength="4"name="telephone3" type="text" class="validate" placeholder="xxxx">
                                     </div>

                                     <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="fax">Fax</label>
                                        </div>
                                    </div>
                                    <div class=" col s4 m2 l2">
                                        <input id="fax1" maxlength="2" name="fax1" type="text" class="validate" placeholder="xx">
                                     </div>
                                     <div class=" col s4 m2 l2">
                                        <input id="fax2" maxlength="4" name="fax2" type="text" class="validate" placeholder="xxxx">
                                     </div>
                                     <div class=" col s4 m2 l2">
                                        <input id="fax3" maxlength="4" name="fax3" type="text" class="validate" placeholder="xxxx">
                                     </div>
                                     <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="url">Url</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="url" name="url" type="text" class="validate">
                                    </div>

                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="status">ステータス</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="status" name="status" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="category">区分</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="category" name="category" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="industry">業種</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="industry" name="industry" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="establish">設立</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <input id="establish" name="establish" type="text" class="validate">
                                    </div>
                                    <div class=" col s12 m4 l4">
                                       <div class="label-field">
                                            <label for="company_name">&nbsp;</label>
                                        </div>
                                    </div>
                                    <div class=" col s12 m8 l8">
                                        <p>
                                         <input name="other" type="radio" id="test1" value="未顧客" />
                                         <label for="test1">未顧客</label>

                                         <input name="other" type="radio" id="test2" value="顧客"/>
                                         <label for="test2">顧客</label>

                                        <input name="other" type="radio" id="test3" value="法人" />
                                         <label for="test3">法人</label>

                                        <input name="other" type="radio" id="test4" value="個人" />
                                        <label for="test4">個人</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="form-add-project-btn">
                                         <button name="add_company" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>&nbsp;Submit</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
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
