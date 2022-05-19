<?php
    //securiser le SQL, le XML...
function register($db, $firstname, $lastname, $email, $password, $nickname, $img){
    $check = getUser($db, $email);
    if($userExist = $check->fetchObject()){
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
function login($db, $email, $password){
    $check = getUser($db, $email);
    $userExist = $check->fetchObject();
    if(!$userExist){
        return false;
    }else{
        $msgSuccess = 'Vous êtes connecté';
        $msgError = 'l\'identifiant ou le mot de passe est incorrect';
        return $result = array(
            'data'=>$userExist ,
            'msg'=>password_verify($password, $userExist->password) ? $msgSuccess : $msgError
        );
    }
}
function getUser($db, $email){
    $user = $db->prepare('
        SELECT * FROM user 
        WHERE email = :email 
    ');
    $user->bindValue(':email', $email, PDO::PARAM_STR);
    $user->execute();
    return $user;    
}
function updateUser($db, $firstname, $lastname, $email, $password, $nickname, $img){
    $check = getUser($db, $email);
    if($userExist = $check->fetchObject()){
        $msgSuccess = 'Les modifications ont bien été pris en compte';
    }else{
        $insert = $db->prepare("
            UPDATE `user`
            (`email`, `password`, `nickname`, `img`)
            SET (:email, :password, :nickname, :img)
        "); 
        $result = $insert->executeStatement(array(
            'email'=> $email,
            'password'=> $password,
            'nickname'=> $nickname,
            'img'=> $img
        ));
        return $result; 
    } 
}
function removeUser($db){

}
