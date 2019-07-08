<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="../pubic/dist/img/favicon.png">

  <title>Login Page</title>

  <?php include('../includes/admin/style.php'); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>
<body class="login-img3-body">

  <div class="container">
    <form class="login-form" method="POST" onsubmit="return loginAdmin();">
      <div class="login-wrap">
        <div id="info"></div>
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
      </div>
    </form>
  </div>
<?php include('../includes/admin/script.php'); ?>
<script>
  function loginAdmin(){
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
        type:"POST",
        url:"../__factory/create.login.php",
        data:{
          username:username,
          password:password
        },
        cache:false,
        success:res=>{
          $("#info").html(res);
        }
    });
    return false;
  }
</script>
</body>
</html>
