<?php
require_once 'inc/config.php';
require_once 'inc/funcs.inc.php';

if (!isset($_SESSION)) {
    session_start();
}
$user = '';
$email = '';

if(isset($_POST['register'])) {
    $data = $_POST;
    $user = trim($data['user']);
    $email = trim($data['email']);
    $msg = [];
    if($data['user'] == '' || $data['email'] == '' || $data['password'] == ''){
        $msg[] = 'All fields must be filled!';
    } elseif ($data['password'] !== $data['password2']){
        $msg[] = 'Passwords do not match!';
    }
    if(count($msg) === 0){
        $password = $data['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $time = time();
        $sessionID = rand(1, 1000000000);
        $query = "INSERT INTO trader_users(
                                nick_name,
                                `password`,
                                sessionID,
                                user_email,
                                character_birth_day)
                        VALUES(
                                :name,
                                :password,
                                :sessionID,
                                :user_email,
                                :character_birth_day)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'name' => $user,
            'password' => $password,
            'sessionID' => $sessionID,
            'user_email' => $email,
            'character_birth_day' => $time
        ]);
        $_SESSION['user'] = $user;
        $_SESSION['sessionID'] = $sessionID;
        header("Location: game.php");
    }
}
include_once "templates/register.html.php";
