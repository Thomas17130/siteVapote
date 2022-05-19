    <form class="mx-auto" action="loginHandler.php" method="POST">
        <div class="d-flex justify-content-between">
            <div class="col-4">
                <input class="form-control text-center" type="email" name="email" placeholder="Email ">
            </div>
            <div class="col-4">
                <input class="form-control text-center" type="password" name="password" placeholder="mot de passe">
            </div>
            <div class="col-auto">
                <button class="btn btn-primary text-center" type="submit">Connexion</button>
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


