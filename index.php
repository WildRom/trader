<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'inc/config.php';
require_once 'inc/funcs.inc.php';

if (!isset($_SESSION)) {
    session_start();
}

$msg = [];
if(isset($_POST['login'])) {
    //Login to game
    if (empty($_POST['user']) || empty($_POST['password'])) {
        // if some fields are empty
        header("Location: index.php");
    } else {
        //good
        $data = $_POST;
        $user = $data['user'];
        $password = $data['password'];
        if (isset($_POST['new']) && $_POST['new'] === 'true') {
            $newGame = true;
            echo "Welcome to a NEW game";
            //TODO New Data to DB
            require_once 'inc/insert_new_data.php';
        } else {
            $newGame = false;
        }
        //Check user name for unique
        $query = "SELECT nick_name, `password` FROM trader_users WHERE nick_name=:nick";
        $stmt = $db->prepare($query);
        $stmt->execute(["nick" => $user]);
        $userCount = $stmt->rowCount();
        $user_data = $stmt->fetch();
        echo "<pre>";
        var_dump($user_data);
        echo "</pre>";

        if (!$userCount) {
            $msg = "No such user";
            die('No such user');
        } elseif ($userCount === 1) {
            if (password_verify($password, $user_data['password'])) {
                //Password good
                $user = $user_data['nick_name'];
                $sessionID = rand(1, 1000000000);

                // UPDATE SESSIONID
                $stmt = $db->prepare("UPDATE trader_users SET sessionID=:sessionID WHERE nick_name=:name");
                $stmt->execute(["sessionID" => $sessionID, "name" => $user]);

                $_SESSION["user"] = $user;
                $_SESSION["sessionID"] = $sessionID;
                header('Location: game.php');

//                setcookie("TRADER_NICK_NAME", $user);
//                setcookie("TRADER_SESSION", $sessionID);
            }
        }
    }
}
require_once "templates/index.html.php";
