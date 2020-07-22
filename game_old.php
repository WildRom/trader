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
// require_once 'inc/config.php';
// session_start();

//get POST info
if ($_POST['login'] === 'login') {
    if (empty($_POST['user_nick']) || empty($_POST['password'])) {
        header("Location: ../index.php");
    } else {
        // Get data from DB
        $data = $_POST;

        $user = $data['user_nick'];
        $password = $data['password'];
        if (isset($_POST['new']) && $_POST['new'] === 'true') {
          $newGame = true;
        } else {
          $newGame = false;
          echo "Welcome to a NEW game, " . $user;
          //TODO New Data to DB
          require_once 'inc/insert_new_data.php';
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

                print('<script>setCookie("TRADER_NICK_NAME", "' . $user . '");</script>');
                print('<script>setCookie("TRADER_SESSION", "' . $sessionID . '");</script>');
                print('<script>location.href="../game.php?nick=' . $user . '"</script>');
            } 
        }
    }
}
?>




<?php  

  
    // IF NOT NEW GAME, $user_data DO NOT EXIST YET
    if (!isset($user_data)) {
        //SELECT USER INFO
        $stmt = $db->prepare("SELECT character_money, sessionID, user_id, level, experience, port, destination, start_travel, end_travel FROM trader_users WHERE nick_name=:name");
        $stmt->execute(["name" => $user]);
        $user_data = $stmt->fetch();
        echo "<pre>";
        var_dump($user_data);
        echo "</pre>";
    }

    $nickName = $user;
    $money = $user_data["character_money"];
    $session = $user_data["sessionID"];
    $userId = $user_data["user_id"];
    $level = $user_data["level"];
    $experience = $user_data["experience"];
    $port = $user_data['port'];
    $destination = $user_data['destination'];
    $startTravel = $user_data['start_travel'];
    $endTravel = $user_data['end_travel'];

    //FIELD_DATA
    // $stmt = $db->prepare("SELECT * FROM trader_fields WHERE user_id=:user_id ORDER BY field_no");
    // $stmt->execute(["user_id"=>$aUserId]);
    // $fields_data = $stmt->fetchAll();

    // ********************* GAME SCREEN ******************************************

    // require_once('game.html.php');

    // *********************END GAME SCREEN ***************************************
} else {
    // NO GET data
    echo "It's a game, but something is wrong";
}

// ********************* GAME SCREEN ******************************************

// *********************END GAME SCREEN ***************************************
