<?php

if(!array_key_exists('file', $_FILES))
    die('No files');
else
{
    if($_FILES['file']['type'] === 'text/xml' && $_FILES['file']['size'] <= 100)
    {
        require_once 'import/config.php';

        move_uploaded_file($_FILES['file']['tmp_name'], __UPLOADDIR__.$_FILES['file']['name']);
    }
}