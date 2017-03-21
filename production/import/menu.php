<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo __PROD__; ?>" class="site_title"><i class="fa fa-play-circle"></i> <span>PTP VIP360</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo __IMGDIR__.'users/'.$_SESSION['img']; ?>" alt="<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenue,</span>
                <h2><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <?php if(array_key_exists("xmls", $_SESSION) && count($_SESSION['xmls']) === 7) { ?>
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Général</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-desktop"></i> Ancres de la page <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#xmlFiles_display"><b>Affichage des XML</b></a></li>
                            <li><a href="#xmlFiles_functions"><b>Fonctions XML</b></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <?php } ?>

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Copnfiguration">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Plein écran">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Vérouillage">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Déconnexion" href="<?php __PROD__ ?>logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo __IMGDIR__.'users/'.$_SESSION['img']; ?>" alt="<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;">Aide</a></li>
                        <li><a href="<?php __PROD__ ?>logout.php"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->