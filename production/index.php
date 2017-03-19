<?php

$title_page = 'PTP VIP360 - Accueil';
$body_class = 'nav-md';

require_once 'import/header.php';

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Envoyer les fichiers XML</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Zone de dépôt multiple pour envoi de fichiers</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Glisser plusieurs fichiers dans la zone ci-dessous pour un envoi multiple ou cliquer pour sélectionner les fichiers.</p>
                        <form action="form_upload.php" class="dropzone" id="ptpVIP360Xmls"></form>
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php

require_once 'import/footer.php';

?>