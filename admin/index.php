<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../inc/config.php';
require_once '../inc/funcs.inc.php';

if (!isset($_SESSION)) {
  session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container mt-5">
  <div class="error" id="error"></div>
  <h3 class="text-center mb-4">Add Ports distances</h3>
  <form method="post" action="server.php" id="insert-form">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="ports-table">
        <thead class="text-uppercase">
        <tr>
          <th>Start Port</th>
          <th>End Port</th>
          <th>Distance in Nautical Miles</th>
          <th>Time in min.(10kn)</th>
          <th>User Level</th>
<!--          <th><button type="button" class="btn btn-success btn-x add" name="add"><i class="fas fa-plus-square"></i></button></th>-->
        </tr>
        </thead>
        <tbody>
        <tr>
          <td><select class="form-control" name="start" id="port-start"><option value="">Select Port</option></select></td>
          <td><select class="form-control" name="end" id="port-end"><option value="">Select Port</option></select></td>
          <td><input type="number" name="nm" class="form-control" id="inputNM" min="0" max="100000" autofocus></td>
          <td><input type="number" name="time" class="form-control" id="timeMinutes" min="0" max="100000"
                     value="0"></td>
          <td><input type="number" name="user_lvl" class="form-control" id="userLVL" min="1" max="10" value="1"></td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-info add" name="add-route" value="add-route" id="add-route">Add</button>
    </div>
  </form>
</div>

<script src="js/scripts.js"></script>
</body>
</html>
