<?php

$title_page = 'PTP VIP360 - Accueil';
$body_class = '';

require_once 'import/header.php';

if(!array_key_exists('loged_in', $_SESSION))
    header('Location: login.php');

?>

    <h1>Bienvenue sur la page d'accueil</h1>

<?php

require_once 'import/footer.php';

?>