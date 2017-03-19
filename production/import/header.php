<?php

require_once 'config.php';

session_start();

if($_SERVER['REQUEST_URI'] != __PROD__.'login.php')
{
    if (!array_key_exists('logged_in', $_SESSION))
        header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title_page; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo __ROOT__; ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo __ROOT__; ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo __ROOT__; ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo __ROOT__; ?>vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="<?php echo __ROOT__; ?>vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo __ROOT__; ?>build/css/custom.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <link href="<?php echo __CSSDIR__; ?>style.css" rel="stylesheet">
</head>

<body class="<?php echo $body_class; ?>">

<?php
    if($_SERVER['REQUEST_URI'] != __PROD__.'login.php') {
?>
    <div class="container body">
        <div class="main_container">
<?php
        require_once 'menu.php';
    }
?>
