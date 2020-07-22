<?php

// Connect to DB
require_once 'inc/config.php';
session_start();

if ((!empty($_POST)) && ($_POST['login'])) {
    //Login to game
    if (empty($_POST['user_nick']) || empty($_POST['password'])) {
        header("Location: ../index.php");
    } else {
        //All are good
        $data = $_POST;
        $user = $data['user_nick'];
        $password = $data['password'];
        if (isset($_POST['new']) && $_POST['new'] === 'true') {
            $newGame = true;
            echo "Welcome to a NEW game, " . $user;
            //TODO New Data to DB
            require_once 'inc/insert_new_data.php';

        } else {
            $newGame = false;
        }
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

                setcookie("TRADER_NICK_NAME", $user);
                setcookie("TRADER_SESSION", $sessionID);
                echo "Game starts!";
                echo '<pre>';
                var_dump($user_data);
                echo '</pre>';
            }
        }

    }
// ************************************* REGISTRATION, NEW GAME !!! *********
} elseif ((!empty($_POST)) && ($_POST['register'])) {
    echo "Register screen!";
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
} else {
    // header("Location: index.php");
    echo "As nezinau";
}