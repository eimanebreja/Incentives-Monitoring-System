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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"
        rel="stylesheet" media="screen,projection" />
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
                        <li><a class="dropdown-trigger" href="#!"
                                data-target="dropdown2">@<?php echo $user_row['user_name']; ?><i
                                    class="material-icons right">arrow_drop_down</i></a></li>
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
                                <input placeholder="Enter the firstname..." id="user_id" name="user_id" type="hidden"
                                    value="<?php echo $user_row['user_id']; ?>" class="validate">
                            </div>
                            <strong> <span id="newPassword" class="required alert"></span></strong>
                            <div class="input-field col s12 m12 l12">
                                <input id="user_password" type="password" name="user_password" class="validate"
                                    value="<?php echo $user_row['user_password']; ?>">
                                <label for="user_password">New Password </label>
                            </div>

                            <div class="input-field col s12 m12 l12 center">
                                <button name="editprof" type="submit" class="btn btn-success"><i
                                        class="glyphicon glyphicon-save"></i>&nbsp;Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <ul class="side-nav fixed">

            <li class="title-sidenav">PROJECT</li>
            <li><a href="project-list.php"><i class="fa fa-list-alt" aria-hidden="true"></i> List of Project</a></li>
            <li><a href="add-project.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Project</a></li>
            <li><a href="share-project.php"><i class="fa fa-share-alt" aria-hidden="true"></i>Sharing of Project</a>
            </li>
            <li><a href="share-add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Sharing</a></li>
            <li><a href="company.php"><i class="fa fa-building" aria-hidden="true"></i></i>Company</a></li>
            <li><a href="add_company.php" class="active"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Add
                    Company</a></li>
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
            <div class="section-project">
                <div class="center">
                    <div class="row">
                        <div class="col s12">
                            <div class="form">
                                <span>
                                    <font color="#c3b47b">ADD</font> COMPANY
                                </span></br>
                                <span class="span_second">Fill in the form below:</span></br>

                                <i class="icon medium material-icons">create</i>
                            </div>
                            <form method="POST" action="add_company_query.php">

                                <div class="company_code">
                                    <!-- <div class="cc_style col 6">
                          <span class="">Company code</span>
                        </div>  -->
                                    <div class="cc_style_two input-effect">
                                        <div class="col-3 input-effect">
                                            <?php

$i = 1;
while ($comp_row = mysqli_fetch_array($result_company)) {
    $id = $comp_row['code'];
    $code_sum = $id + 1;
    $codes = str_pad($code_sum, 3, "0", STR_PAD_LEFT);
    ?>
                                            <input name="company_code" type="text" value="<?php echo $codes; ?>">
                                            <?php }?>
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="company_name">
                                    <!-- <div class="cn_style col 6">
                            <span class="">Company name</span>
                          </div>  -->
                                    <div class="cn_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" type="text" name="company_name"
                                                placeholder="Company name">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="company_name">
                                    <!-- <div class="cn_style col 6">
                            <span class="">Company name</span>
                          </div>  -->
                                    <div class="cn_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" type="text" name="company_name_two" placeholder="">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="display_name">
                                    <!-- <div class="dn_style col 6">
                            <span class="">Display name</span>
                          </div>  -->
                                    <div class="dn_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" name="display_name" type="text"
                                                placeholder="Display name">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="post_code">
                                    <!-- <div class="pc_style col 6">
                            <span class="">Post code</span>
                          </div>  -->
                                    <div class="pc_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" name="post_code" type="text"
                                                placeholder="Post code">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="company_address">
                                    <!-- <div class="cd_style col 6">
                            <span class="">Company address</span>
                          </div>  -->
                                    <div class="cd_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" name="address" type="text"
                                                placeholder="Company address">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="building_name">
                                    <!-- <div class="bn_style col 6">
                            <span class="">Building name</span>
                          </div>  -->
                                    <div class="bn_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" name="building_name" type="text"
                                                placeholder="Building name">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="telephone">
                                    <!-- <div class="t_style col 6">
                            <span class="">Tel</span>
                          </div>  -->
                                    <div class="t_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" name="tel" type="text" placeholder="Tel">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="fax">
                                    <!-- <div class="f_style col 6">
                            <span class="">Fax</span>
                          </div>  -->
                                    <div class="f_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" name="fax" type="text" placeholder="Fax">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="url">
                                    <!-- <div class="u_style col 6">
                            <span class="">Url</span>
                          </div>  -->
                                    <div class="u_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input class="effect-10" type="text" name="url" placeholder="Url">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="status">
                                    <div class="s_style col 12">
                                        <span class="">Status</span>
                                    </div>
                                    <div class="s_style_two col 12">
                                        <p style="margin-left: -80px;">
                                            <label>
                                                <input class="with-gap" name="status" type="radio" value="未顧客" />
                                                <span style="color:rgba(0, 0, 0, 0.445)">未顧客</span>
                                            </label>
                                        </p>
                                        <p style="margin-top: -35px; margin-left: 30px;">
                                            <label>
                                                <input class="with-gap" name="status" type="radio" value="顧客" />
                                                <span style="color:rgba(0, 0, 0, 0.445)">顧客</span>
                                            </label>
                                        </p>

                                    </div>
                                </div>

                                <div class="division">
                                    <div class="d_style col 12">
                                        <span class="">Division</span>
                                    </div>
                                    <div class="d_style_two col 12">
                                        <p style="margin-left: -80px;">
                                            <label>
                                                <input class="with-gap" name="division" type="radio" value="法人" />
                                                <span style="color:rgba(0, 0, 0, 0.445)">法人</span>
                                            </label>
                                        </p>
                                        <p style="margin-top: -35px; margin-left: 30px;">
                                            <label>
                                                <input class="with-gap" name="division" type="radio" value="個人" />
                                                <span style="color:rgba(0, 0, 0, 0.445)">個人</span>
                                            </label>
                                        </p>

                                    </div>
                                </div>

                                <div class="industry">
                                    <!-- <div class="i_style col 12">
                            <span class="">Industry</span>
                          </div>  -->
                                    <div class="i_style_two">
                                        <select name="industry" id="">
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

                                <div class="registration_date">
                                    <!-- <div class="gd_style col 6">
                            <span class="">Registration</span>
                          </div>  -->
                                    <div class="gd_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input name="register_date" class="effect-10" value="<?php date_default_timezone_set('Asia/Manila');
echo date('Y-m-d H:i:s');?>" type="text" placeholder="Registration date">
                                        </div>
                                    </div>
                                </div>

                                <div class="update">
                                    <!-- <div class="up_style col 6">
                            <span class="">Update</span>
                          </div>  -->
                                    <div class="up_style_two col 6">
                                        <div class="col-3 input-effect">
                                            <input name="update_date" class="effect-10" type="text" value="<?php date_default_timezone_set('Asia/Manila');
echo date('Y-m-d H:i:s');?>" placeholder="Update">
                                            <span class="focus-bg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                    <div class="b_style col 12">
                                        <button name="add_company"
                                            class="waves-effect waves-light btn-small">Submit</button>
                                    </div>
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
    <script>
    $(document).ready(function() {
        $('.tabs').tabs();
    });
    </script>
    <script>
    $(document).ready(function() {
        $('.modal').modal();
    });
    </script>

    <script>
    $(document).ready(function() {
        $('select').formSelect();
    });
    </script>


    <script>
    $(document).ready(function() {
        $('.datepicker').datepicker();
    });

    $('.dropdown-trigger').dropdown();


    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {
                el: this.el,
                multiple: this.multiple
            }, this.dropdown)
        }

        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
            $this = $(this),
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            };
        }

        var accordion = new Accordion($('#accordion'), false);
    });
    </script>


</body>

</html>