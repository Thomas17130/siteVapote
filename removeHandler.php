<?php 

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';



$db = getPdoLink($config);
if (empty(session_id())) {
    session_start();
}
$id = $_SESSION['id'];
$userstatement = getUser($db, $id);
$userVerif = $userstatement->fetchObject();
$removeUser = ($_POST['id']);

if($id = $_SESSION['id']){
    removeUser($db, $id);
}else {
$msgError = 'Le profil ne peut être supprimé';
}
$lastUrl = $_SERVER['HTTP_REFERER'];
if ($msgError)
{
    header("Location: $lastUrl?error=$msgError");
}else{
    $_SESSION['id'] = $id;
    header("Location: index.php");
}



