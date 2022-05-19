<?php

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';

$db = getPdoLink($config); 

if (empty(session_id())) {
    session_start();
}

$email = $_POST['email'];
$password = $_POST['password'];

if(in_array("", $_POST)){
    $msgError = 'Tout les champs sont obligatoires';
}else{
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));
    $results = login($db, $email, $password);
    $result = $results['data'];
    $msg = $results['msg'];
}
$lastUrl = $_SERVER['HTTP_REFERER'];

if ($msgError) {
    header("Location: $lastUrl?error=$msgError");
}elseif (!$results || $msg == $msgError){
    $msg = 'l\'identifiant ou le mot de passe est incorrect';
    header("Location: $lastUrl?error=$msg");
}else{
    $_SESSION['id'] = $result->id;
    $_SESSION['firstname'] = $result->firstname;
    $_SESSION['lastname'] = $result->lastname;
    $_SESSION['email'] = $result->email;
    $_SESSION['nickname'] = $result->nickname;
    header("Location: index.php?success=$msg");
}

