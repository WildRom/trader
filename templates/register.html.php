<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css">
  <title>Register</title>
</head>
<body>
<div class="lang">
  <span class="flag-lang" id="gb"><img src="assets/img/flags/gb.svg" alt="English"></span>
  <span class="flag-lang" id="lt"><img src="assets/img/flags/lt.svg" alt="Lithuanian"></span>
  <span class="flag-lang" id="ru"><img src="assets/img/flags/ru.svg" alt="Russian"></span>
</div>
<div class="container">
  <img src="assets/img/roger.png" alt="roger" width="160px">
  <form action="register.php" method="post" class="form-box" id="reg-form">
    <div class="row errors">
        <?php if(isset($msg) && !empty($msg)): ?>
            <label id="errors"><?php echo $msg[0]; ?></label>
      <?php endif; ?>
    </div>
    <div class="row">
      <label for="user">UserName:</label>
      <input type="text" name="user" id="user" value="<?=$user;?>" required>
    </div>
    <div class="row">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?=$email;?>" required>
    </div>
    <div class="row">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
    </div>
    <div class="row">
      <label for="password2">Repeat Password:</label>
      <input type="password" name="password2" id="password2" required>
    </div>
    <div class="row btn-group">
      <a class="register" href="index.php">Login</a>
      <button id="reg" type="submit" class="btn-login" name="register" value="register">Register</button>
    </div>
  </form>
</div>
<script>
  $(function(){
    $('#reg').prop('disabled', true);
    $('#reg').css('color', 'red');
    $('#user').focus();
    let usr = $('#user');
    usr.on('focus', function(){
      usr.css('border', '2px solid #777777');
      $('.errors').html('');
    });
    usr.on('blur', function(){
      let user = usr.val();
      if(!user || user == ''){
        usr.css('border', '3px solid red');
      } else {
        usr.css('border', '2px solid #777777');
        //ajax check username for uniq
        $.post(
          'server.php',
          {user: user},
          function(data){
            if(data == 'no'){
              $('.errors').html('User '+ user+ ' already exists!');
            }else if(data == 'yes'){
              $('.errors').html('');
            }
          }
        )
      }
    })
    let ml = $('#email');
    let mail = ml.val();
    ml.on('focus', function(){
      ml.css('border', '2px solid #777777');
      $('.errors').html('');
    });
    ml.on('blur', function(){
      let ml = $('#email');
      let mail = ml.val();
      if(!mail || mail == ''){
        ml.css('border', '3px solid red');
      } else {
        usr.css('border', '2px solid #777777');
        //ajax check username for uniq
        $.post(
          'server.php',
          {email: mail},
          function(data){
            if(data == 'no'){
              $('.errors').html('Email '+ mail + ' already exists!');
            }else if(data == 'yes'){
              $('.errors').html('');
            }
          }
        )
      }
    });

    $('form :input').on('keyup', function(){
      if($('#user').val() == '' || $('#email').val() == '' || $('#password').val() == '' || $('#password2').val()
        == ''){
          $('.errors').html('');
          $('#reg').prop('disabled', true);
          $('#reg').css('color', 'red');
      } else if($('#password').val() !== $('#password2').val()){
        $('.errors').html('Passwords do not match!');
        $('#reg').prop('disabled', true);
        $('#reg').css('color', 'red');
      }else {
          $('.errors').html('');
          $('#reg').prop('disabled', false);
          $('#reg').css('color', 'green');
      }
    })

  })
</script>
</body>
</html>