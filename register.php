<?php

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';

$db = getPdoLink($config); 
if (empty(session_id())) {
    session_start();
}

$userForm = array(
    $firstname = htmlentities(trim($_POST['firstname']),ENT_QUOTES),
    $lastname = htmlentities(trim($_POST['lastname']),ENT_QUOTES),
    $email = filter_var(htmlentities(trim($_POST['email']),FILTER_VALIDATE_EMAIL)),
    $password = htmlentities(trim($_POST['password']),ENT_QUOTES),
    $nickname = htmlentities(trim($_POST['nickname']),ENT_QUOTES),
    $img = 'assets/img/img_avatar3.png'
);


if(in_array("", $userForm)){
    $msgError = 'Tout les champs sont obligatoires';
}else {
    if(!$email){
    $msgError = 'l\'email n\'est pas valide';
    }elseif(strlen($password)<8){
        $msgError = 'le mot de passe doit contenir au moins 8 caractères';
    }else{
        $result = register($db, $firstname, $lastname, $email, $password, $nickname, $img);
        if($result){
            $msgSuccess = 'le compte a bien été créer';
        }else{
            $msgError = 'Une erreur s\'est produite';
        }
    }
}

$lastUrl = $_SERVER['HTTP_REFERER'];
if ($msgError) {
    header("Location: $lastUrl?error=$msgError");
}else{
    header("Location: index.php?success=$msgSuccess");
}
