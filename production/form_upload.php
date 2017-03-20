<?php

require_once 'import/config.php';
session_start();

if(array_key_exists('file', $_FILES))
{
    if($_FILES['file']['type'] === 'text/xml' && $_FILES['file']['size'] <= 200000)
    {
        if(!array_key_exists('xmls', $_SESSION))
        	$_SESSION['xmls'] = array();

        //-- Save content files in SESSION array with key value equal to file name without extension (.xml)
        array_push($_SESSION['xmls'], array(explode('.', $_FILES['file']['name'])[0] => file_get_contents($_FILES['file']['tmp_name'])));
        //-- Save file in uploads folder
        move_uploaded_file($_FILES['file']['tmp_name'], __UPLOADURL__.$_FILES['file']['name']);
    }
}


if(array_key_exists('projectName', $_GET))
{
	foreach ($_SESSION['xmls'] as $xml_array) {
		unlink(__UPLOADURL__.key($xml_array).'.xml');
	}
	unset($_SESSION['xmls']);
}