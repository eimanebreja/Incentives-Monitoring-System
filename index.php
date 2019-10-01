
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
    <div class="whole-body">
        <div class="valign-wrapper row login-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
                <form role="form" class="form-horizontal" method="POST" action="login.php">
                    <div class="card-content">
                        <div class="title-text">
                            <p>This Site is Private!</p>
                        </div>
                        <hr>
                        <div class="input-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="email">Username</label>
                                    <input type="text" class="validate" name="user_name" id="username" />
                                </div>
                                <div class="input-field col s12 ">
                                    <label for="password">Password </label>
                                    <input type="password" class="validate" name="user_password" id="password" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action right-align">
                        <input type="submit" name="submit" class="btn orange waves-effect waves-light" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>







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


</body>
</html>
