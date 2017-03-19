<?php

session_start();

if(!array_key_exists('loged_in', $_SESSION))
    header('Location: login.php');