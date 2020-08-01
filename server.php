<?php

require_once 'inc/config.php';
require_once 'inc/funcs.inc.php';

if(isset($_POST['user'])) {
    $user = trim($_POST['user']);
    $query = "SELECT nick_name FROM trader_users WHERE nick_name=:nick";
    $stmt = $db->prepare($query);
    $stmt->execute(["nick" => $user]);
    $userCount = $stmt->rowCount();
    if($userCount > 0){
        echo 'no';
    } else {
        echo 'yes';
    }
} elseif(isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT `user_email` FROM trader_users WHERE user_email=:email";
    $stmt = $db->prepare($query);
    $stmt->execute(["email" => $email]);
    $userCount = $stmt->rowCount();
    if($userCount> 0){
        echo 'no';
    } else {
        echo 'yes';
    }
}

?>