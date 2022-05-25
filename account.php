<?php 
include 'utilities/header.php';
require __DIR__ . '/functions/user.fn.php';
$userStatement = getUser($db, $_SESSION['email']);
$user = $userStatement->fetchObject();

?>
<div class="d-flex flex-column align-items-center">
    <div class="col-4">
        <div class="col-4">
            <p>Email: <?= $user->email ?></p>
        </div>
        <p>Prénom: <?= $user->firstname ?></p>
    </div>
    <div class="col-4">
        <p>Nom: <?= $user->lastname ?></p>
    </div>
    <div class="col-4">
        <p>Pseudo: <?= $user->nickname ?></p>
    </div>
    <div class="col-4">
        <a class="btn btn-primary text-center" href="updateUser.php">Modifier le profil</a>
        <a class="btn btn-primary text-center" href="removeHandler.php">Supprimer le profil</a>
    </div>
</div>
<?php if(isset($_GET['error'])){
    echo "<div class='alert alert-danger' role='alert'>
        <p class='text-center'>    
            {$_GET['error']}
        </p>
    </div>";
}?>


<?php 
include 'utilities/footer.php';
?>