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
                $key_tmp = key($_SESSION['xmls'][0]);
                if(strpos($key_tmp, '_') > 0)
                    $projectName = substr($key_tmp, 0, strpos($key_tmp, '_'));
                else
                    $projectName = substr($key_tmp, 0, strpos($key_tmp, '.'));
            ?>
            <div class="col-md-6 col-xs-12" id="xmlFiles_display">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des fichiers XML <small><?php echo $projectName; ?></small></h2>
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
                            <?php foreach ($_SESSION['xmls'] as $xml_array) { ?>
                            <li>
                                <a>
                                    <span class="image">
                                        <img src="<?php echo __IMGDIR__.'icon/xml-file.png' ?>" alt="<?php echo key($xml_array); ?>" />
                                    </span>
                                    <span>
                                        <span><?php echo key($xml_array); ?>.xml</span>
                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <script type="text/javascript">var PROJECTNAME = '<?php echo $projectName; ?>'</script>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /page content -->

<?php

require_once 'import/footer.php';

?>