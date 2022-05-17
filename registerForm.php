<?php

require __DIR__ . '/utilities/header.php'
?>
<section class="container">
    <div class="row">
        <form class="card col-8 mx-auto" action="register.php" method="POST">
            <div class="col-12 mt-3 d-flex justify-content-around">
                <input class="form-control mb-3 " type="text" name="lastname" placeholder="nom">
                <input class="form-control mb-3 " type="text" name="firstname" placeholder="Prénom">
                </div>
            <input class="form-control mb-3 col-8" type="email" name="email" placeholder="nom@nom.fr">
            <input class="form-control mb-3 col-8" type="password" name="password" placeholder="mot de passe">
            <input class="form-control mb-3 col-8" type="text" name="nickname" placeholder="pseudo">
            <input class="form-control mb-3 col-8" type="file" name="image">
            <button class="btn btn-primary col-2" type="submit">Enregistrer</button>
            <?php if(isset($_GET['error'])){
                echo "<div class='alert alert-danger' role='alert'>
                    <p class='text-center'>    
                        {$_GET['error']}
                    </p>
                </div>";
            }?>
        </form>
    </div>
</section>
<?php

require __DIR__ . '/utilities/header.php'
?>


