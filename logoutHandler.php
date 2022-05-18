<?php

if (empty(session_id())) {
    session_start();
}
unset($_SESSION);
session_destroy();
header("Location: index.php");