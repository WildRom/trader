<?php

require_once '../inc/config.php';
require_once '../inc/funcs.inc.php';

if(isset($_POST['get_ports'])){
  if(isset($_POST['except'])){
    $exc = $_POST['except'];
    $query = "SELECT * FROM trader_ports WHERE NOT (`port_id` = ".$exc.")  ORDER BY `port_id`";
  } else {
    $query = "SELECT * FROM trader_ports ORDER BY `port_id`";
  }
  if (isset($db)) {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $portsCount = $stmt->rowCount();
    $ports = $stmt->fetchAll();
    foreach ($ports as $port) {
      echo '<option value="'.$port['port_id'].'">'.$port['port_name'].'</option>';
    }
  } else {
      die('DB ERROR!');
  }
}
//add route - distance
if(isset($_POST['add-route'])) {
  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";
}

?>