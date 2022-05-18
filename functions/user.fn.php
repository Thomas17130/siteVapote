<?php
    //securiser le SQL, le XML...
function register($db, $firstname, $lastname, $email, $password, $nickname, $img){
    $check = $db->prepare('
        SELECT * FROM user 
        WHERE email = :email 
        OR nickname = :nickname
    ');
    $check->execute(array(
        ':email' => $email,
        ':nickname' => $nickname
    ));
    if($userExist = $check->fetch()){
        $msgError = 'L\'utilisateur est déja pris.';
    }else{
        $insert = $db->prepare("
            INSERT INTO `user`
            (`firstname`, `lastname`, `email`, `password`, `nickname`, `img`)
            VALUES (:firstname, :lastname, :email, :password, :nickname, :img)
        ");
        $insert->bindValue(':firstname', $firstname, PDO::PARAM_STR); 
        $insert->bindValue(':lastname', $lastname, PDO::PARAM_STR); 
        $insert->bindValue(':email', $email, PDO::PARAM_STR); 
        $insert->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR); 
        $insert->bindValue(':nickname', $nickname, PDO::PARAM_STR); 
        $insert->bindValue(':img', $img, PDO::PARAM_STR); 
        $result = $insert->execute();
        return $result; 
    }
}
function login($db){
   
}
function getUser($db){

}
function setEmail($db){

}
function setPassword($db){

}
function setNickname($db){

}
function setImg($db){

}
function removeUser($db){

}
