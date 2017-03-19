<?php

$title_page = 'Groupe VIP360 | Gentelella Alela! - Connexion';
$body_class = 'login';

require_once 'import/header.php';

$errors = [];

if(array_key_exists('username', $_POST) && trim($_POST['username']) != ''
&& array_key_exists('password', $_POST) && $_POST['password'] != '')
{
    $user = $pdo->getVIPUser(trim($_POST['username']), $_POST['password']);

    if(empty($user))
    {
        array_push($errors, array('invalid_tokens' => 'Le nom d\'utilisateur ou le mot de passe sont incorrectes'));
    }
    else
    {
        $_SESSION['loged_in'] = true;
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['first_name'] = $user->getFirstName();
        $_SESSION['last_name'] = $user->getLastName();

        header('Location: '.__PROD__);
    }
}
echo $_SESSION['username'].' : '.$_SESSION['first_name'].' '.$_SESSION['last_name'];
?>


<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post">
                    <h1>Formulaire de connexion</h1>
                    <div>
                        <input name="username" type="text" class="form-control" placeholder="Identifiant" required="" value="<?php if(array_key_exists('username', $_POST)) echo trim($_POST['username']); ?>" />
                    </div>
                    <div>
                        <input name="password" type="password" class="form-control" placeholder="Mot de passe" required="" />
                    </div>
                    <?php
                    foreach($errors as $error)
                    {
                        foreach ($error as $type => $string)
                        {
                            if($type === 'invalid_tokens')
                            {
                                echo '<div class="red">';
                                echo '<p>'.$string.'</p>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                    <div>
                        <button type="submit" class="btn btn-default submit">Connexion</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <h2><img src="images/icon/logo-groupe-vip-360.png" class="img-responsive" alt="Groupe VIP360" title="Groupe VIP360" /></h2>
                            <p>©<?php echo date('Y'); ?> Tous droits réservés.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<?php

require_once 'import/footer.php';

?>
