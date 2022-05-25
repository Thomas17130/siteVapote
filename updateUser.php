<?php 
include 'utilities/header.php';
require __DIR__ . '/functions/user.fn.php';
$userStatement = getUser($db, $_SESSION['email']);
$user = $userStatement->fetchObject();
?>
<form class="mx-auto" action="updateUserHandler.php" method="POST">
        <div class="d-flex flex-column align-items-center">
            <div class="col-4">
                <div class="">
                    <input class="form-control text-center" type="email" name="firstname" placeholder="<?= $user->firstname ?>">
                </div>
                <div class="">
                    <input class="form-control text-center" type="email" name="lastname" placeholder="<?= $user->lastname ?>">
                </div>
                <input class="form-control text-center" type="email" name="email" placeholder="<?= $user->email ?>">
            </div>
            <div class="col-4">
                <input class="form-control text-center" type="password" name="password" placeholder="mot de passe">
            </div>
            <div class="col-4">
                <input class="form-control text-center" type="text" name="nickname" placeholder="<?= $user->nickname ?>">
            </div>

            <div class="col-4">
                <input class="form-control mb-3 col-8" type="file" name="image">
            </div>
            <div class="col-auto">
            <button class="btn btn-primary text-center" type="submit">Valider</button>
            </div>
        </div>
        <?php if(isset($_GET['error'])){
            echo "<div class='alert alert-danger' role='alert'>
                <p class='text-center'>    
                    {$_GET['error']}
                </p>
            </div>";
        }?>
    </form>
    <?php 
    include 'utilities/footer.php';
    ?>


