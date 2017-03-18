<?php

$title_page = 'Groupe VIP360 | Gentelella Alela! - Connexion';
$body_class = 'login';

require_once 'header.php';

?>


<div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form>
          <h1>Formulaire de connexion</h1>
          <div>
            <input type="text" class="form-control" placeholder="Identifiant" required="" />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Mot de passe" required="" />
          </div>
          <div>
            <a class="btn btn-default submit" href="index.html">Connexion</a>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <div>
              <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
              <h2><i class="fa fa-play-circle"></i> Groupe VIP360</h2>
              <p>©<?php echo date('Y'); ?> All Rights Reserved.</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
