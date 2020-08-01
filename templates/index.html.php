<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/main.css">
  <title>Login</title>
</head>
<body>
<div class="lang">
  <span class="flag-lang" id="gb"><img src="assets/img/flags/gb.svg" alt="English"></span>
  <span class="flag-lang" id="lt"><img src="assets/img/flags/lt.svg" alt="Lithuanian"></span>
  <span class="flag-lang" id="ru"><img src="assets/img/flags/ru.svg" alt="Russian"></span>
</div>
<div class="container">
  <img src="assets/img/roger.png" alt="roger" width="160px">
  <form action="index.php" method="post" class="form-box">
    <div class="row">
      <label for="user">User:</label>
      <input type="text" name="user" id="user" required>
    </div>
    <div class="row">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
    </div>
    <div class="row btn-group">
      <a class="register" href="register.php">Register</a>
      <button type="submit" class="btn-login" name="login" value="login">Log In</button>
    </div>
  </form>
</div>

</body>
</html>