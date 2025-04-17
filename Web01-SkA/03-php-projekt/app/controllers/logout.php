<?php
    session_start();
    session_unset();     // smaže všechny session proměnné
    session_destroy();   // zničí session

    header("Location: book_list.php");
    exit();