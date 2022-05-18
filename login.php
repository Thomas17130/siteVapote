<?php
require __DIR__ . '/utilities/header.php'
?>
<section class="container">
    <div class="row">
        <form class="card col-8 mx-auto" action="loginHandler.php" method="POST">
            <input class="form-control mt-3 mb-3 col-8" type="email" name="email" placeholder="Email ">
            <input class="form-control mb-3 col-8" type="password" name="password" placeholder="mot de passe">
            <button class="btn btn-primary col-2 mb-3" type="submit">Connexion</button>
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

require __DIR__ . '/utilities/footer.php'
?>
