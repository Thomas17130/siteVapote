<?php

include 'utilities/header.php';
if (!empty($_SESSION['id'])) {
    echo '<h2>Bonjour '. $_SESSION['firstname'].'</h2>';
}

include 'utilities/footer.php';

