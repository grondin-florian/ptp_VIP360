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
                <h3>Traitement des fichiers XML</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <?php if(!array_key_exists("xmls", $_SESSION)) { ?>
            <div class="col-md-12 col-sm-12 col-xs-12" id="xmlFiles_dz">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Zone de dépôt multiple pour envoi de fichiers</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Glisser vos 7 fichiers dans la zone ci-dessous pour un envoi multiple ou cliquer pour sélectionner les fichiers.</p>
                        <form action="form_upload.php" class="dropzone" id="ptpVIP360Xmls"></form>
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php
            if(array_key_exists("xmls", $_SESSION) && count($_SESSION['xmls']) === 7) {
                foreach ($_SESSION['xmls'] as $key => $xml) {
                    if(strpos($key, '_') > 0)
                        $_SESSION['projectName'] = substr($key, 0, strpos($key, '_'));
                    else
                        $_SESSION['projectName'] = $key;
                    break;
                }
            ?>
            <div class="col-md-6 col-xs-12" id="xmlFiles_display">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des fichiers XML <small><?php echo $_SESSION['projectName']; ?></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="remove-xmls">Supprimer tout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="list-unstyled msg_list">
                            <?php foreach ($_SESSION['xmls'] as $key => $xml) { ?>
                            <li>
                                <a>
                                    <span class="image">
                                        <img src="<?php echo __IMGDIR__.'icon/xml-file.png' ?>" alt="<?php echo $key; ?>" />
                                    </span>
                                    <span>
                                        <b><?php echo $key; ?>.xml</b>
                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12" id="xmlFiles_functions">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des fonctions <small><?php echo $_SESSION['projectName']; ?></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="execute_functions.php" method="post" class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="sr-only">Switch</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="dropdown-toggle-block-form">
                                        <label>
                                            <input type="checkbox" class="js-switch" name="functions_selected[]" value="multipleButtonsThree_noViewChange"/> Bouttons triple : pas de changement de vue
                                        </label>
                                        <div class="block-form">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="multipleButtonsThree_noViewChange_qty">Quantité</label>
                                                <div class="col-md-2 col-sm-4 col-xs-12">
                                                    <input type="number" class="form-control" placeholder="0" min="0" name="multipleButtonsThree_noViewChange_qty" id="multipleButtonsThree_noViewChange_qty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-toggle-block-form">
                                        <label>
                                            <input type="checkbox" class="js-switch" name="functions_selected[]" value="multipleButtonsFour_noViewChange"/> Bouttons quadruple : pas de changement de vue
                                        </label>
                                        <div class="block-form">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="multipleButtonsFour_noViewChange_qty">Quantité</label>
                                                <div class="col-md-2 col-sm-4 col-xs-12">
                                                    <input type="number" class="form-control" placeholder="0" min="0" name="multipleButtonsFour_noViewChange_qty" id="multipleButtonsFour_noViewChange_qty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-toggle-block-form">
                                        <label>
                                            <input type="checkbox" class="js-switch" name="functions_selected[]" value="multipleButtonsFive_noViewChange"/> Bouttons quintuple : pas de changement de vue
                                        </label>
                                        <div class="block-form">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="multipleButtonsFive_noViewChange_qty">Quantité</label>
                                                <div class="col-md-2 col-sm-4 col-xs-12">
                                                    <input type="number" class="form-control" placeholder="0" min="0" name="multipleButtonsFive_noViewChange_qty" id="multipleButtonsFive_noViewChange_qty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Réinitialiser</button>
                                    <button type="submit" class="btn btn-success">Transformer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script type="text/javascript">var PROJECTNAME = '<?php echo $_SESSION['projectName']; ?>'</script>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /page content -->

<?php

require_once 'import/footer.php';

?>