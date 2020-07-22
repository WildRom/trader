<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <script>
  function setCookie(name, value) {
    document.cookie = name + "=" + escape(value) + "; path=/";
  }
  </script>
</head>
<?php

// Connect to DB
require_once 'config.php';
session_start();

//get POST info
if ($_POST['login'] === 'login') {
    if (empty($_POST['user_nick']) || empty($_POST['password'])) {
        header("Location: ../index.php");
    } else {
        // Get data from DB
        $data = $_POST;

        $user = $data['user_nick'];
        $password = $data['password'];

        //Check user name for unique
        $stmt = $db->prepare("SELECT * FROM trader_users WHERE nick_name=:name");
        $stmt->execute(["name" => $user]);
        $userCount = $stmt->rowCount();
        $user_data = $stmt->fetch();

        if (!$userCount) {
            echo "No such user";
        } elseif ($userCount === 1) {
            if (password_verify($password, $user_data['password'])) {
                //Password good
                $sessionID = rand(1, 1000000000);

                // UPDATE SESSIONID
                $stmt = $db->prepare("UPDATE trader_users SET sessionID=:sessionID WHERE nick_name=:name");
                $stmt->execute(["sessionID" => $sessionID, "name" => $user]);

                print('<script>setCookie("TRADER_NICK_NAME", "' . $user . '");</script>');
                print('<script>setCookie("TRADER_SESSION", "' . $sessionID . '");</script>');
                print('<script>location.href="../game.php?nick=' . $user . '"</script>');
            }
        }
    }
}
?>
