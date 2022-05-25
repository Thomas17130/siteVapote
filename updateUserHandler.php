<?php 

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';


$db = getPdoLink($config); 
if (empty(session_id())) {
    session_start();
}
$valid = array(
    'email'=> false,
);
$id = $_SESSION['id']; 
$email = null ;
$firstname = null;
$lastname = null;
$nickname = null; 
$img = null;


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { 
// on initialise nos erreurs $nameError = null; 
//$firstnameError = null; $ageError = null; $telError = null; $emailError = null; $paysError = null; $commentError = null; 
//$metierError = null; $urlError = null; // On assigne nos valeurs $name = $_POST['name']; $firstname = $_POST['firstname']; 
//$age = $_POST['age']; $tel = $_POST['tel']; $email = $_POST['email']; $pays = $_POST['pays']; $comment = $_POST['comment']; $
//metier = $_POST['metier']; $url = $_POST['url']; // On verifie que les champs sont remplis $valid = true; if (empty($name)) { 
//$nameError = 'Please enter Name'; $valid = false; } if (empty($firstname)) { $firstnameError = 'Please enter firstname'; $valid = false; 
//} 
    if (empty($_POST['email'])){ 
        $emailError = 'Entrer son adresse email';  
    }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
        $emailError = 'Entrer une adresse email valide'; 
    }else{
        $email = htmlentities(trim($_POST['email']));
        $valid['email'] = true;
    }
    if(empty($_POST['firstname'])){
        $firstnameError = 'entrez votre prénom';
    }else{
        $firstname = htmlentities(trim($_POST['firstname']));
        $valid['firstname'] = true;
    }
    if (empty($_POST['lastname'])) {
        $lastnameError = 'Entrez votre nom';
    } else {
        $lastname = htmlentities(trim($_POST['lastname']));
        $valid['lastname'] = true;
    }
    if (empty($_POST['nickname'])) {
        $nicknameError = 'Entrez votre pseudo';
    } else {
        $nickname = htmlentities(trim($_POST['nickname']));
        $valid['nickanme'] = true; 
    }
    if (empty($_POST['img'])) {
        $imgError = 'Inserez une image';
    } else {
        $img = htmlentities(trim($_POST['img']));
        $valid['img'] = true;
    }
    
    if($valid){
        updateUser($db, $firstname, $lastname, $email, $nickname, $img, $id);
    }else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailSuccess = 'Votre adresse email a bien été modifié'; $valid = false; 
        set($email,['email']);
    }else if (empty($firstname)) {
        $firstnameSuccess = 'votre prénom a bien été modifié'; $valid = false; 
        set($firstname, ['firstname']);
    }else if (empty($lastname)) {
        $lastnameSuccess = 'votre nom a bien été modifié'; $valid = false; 
        set($lastname, ['lastname']);
    }else if (isset($nickname)) {
        $nicknameSuccess = 'votre pseudo a bien été modifié'; $valid = false;
        set($nickname, ['nickname']); 
    }else if (empty($img)) {
        $imgSuccess = 'votre avatar a bien été modifié'; $valid = false; 
        set($img, ['img']);
    }else{
        $valid = false;
    }
    // mise à jour des donnés if ($valid) { $pdo = Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

header("Location: index.php");