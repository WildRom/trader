<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
  <title>Login</title>
  <script>
  function setCookie(name, value) {
    document.cookie = name + "=" + escape(value) + "; path=/";
  }
  </script>
</head>

<?php

require_once 'inc/config.php';
session_start();

?>

<body>
  <div class="container-fluid">
    <!-- row -->
    <div class="row">

      <!-- image container -->
      <div class="col-lg-6 col-md-6 d-none d-md-block image-container">
      </div>
      <!-- end image container -->

      <!-- form container -->
      <div class="col-lg-6 col-md-6 form-container">
        <!-- form box -->
        <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
          <div class="logo mb-3">
            <img src="img/ship1.png" alt="logo" width="300">
          </div>
          <div class="heading mb-4">
            <h4 class="ltu">Prisijunkite</h4>
            <h4 class="eng">Login into your account</h4>
          </div>
          <!-- form -->
          <!-- <form action="inc/login.php" method="post"> -->
          <form action="game.php" method="post">
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="user_nick" placeholder="User name..." required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-lock"></i></span>
              <input type="password" name="password" placeholder="Password..." required>
            </div>
            <div class="row mb-3">
              <div class="col-6 d-flex">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" id="cb1" name="cb1">
                  <label for="cb1" class="cutom-control-label text-white ltu">Atsiminti</label>
                  <label for="cb1" class="cutom-control-label text-white eng">Remember</label>
                </div>
              </div>
              <div class="col-6 text-right">
                <a href="forget.php" class="forget-link ltu">Užmiršau slaptažodį</a>
                <a href="forget.php" class="forget-link eng">Forget password</a>
              </div>
            </div>
            <div class="text-left mb-3">
              <input type="hidden" name="new_game" value="false">
              <button type="submit" class="btn ltu" name="login" value="login">Jungtis</button>
              <button type="submit" class="btn eng" name="login" value="login">Login</button>
            </div>
            <div style="color: #777" class="ltu">Dar neprisiregistravęs?
              <a href="register.php" class="register-link">Registruokis</a>
            </div>
            <div style="color: #777" class="eng">Don't have an account
              <a href="register.php" class="register-link">Register here</a>
            </div>
          </form><!-- end  forma -->
        </div><!-- end form box -->
      </div><!-- end form container -->
    </div><!-- .row end -->
  </div><!-- container -->

  <script src="js/cookies.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
