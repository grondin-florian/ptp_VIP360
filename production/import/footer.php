<?php
    if($_SERVER['REQUEST_URI'] != __PROD__.'login.php') {
?>
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a><br/>
                        <b>PanotourPro VIP360</b> - Un outil complémentaire pour PTP par <em><a href="http://groupe-vip360.com">Groupe VIP360</a></em>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo __ROOT__; ?>vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo __ROOT__; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo __ROOT__; ?>vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo __ROOT__; ?>vendors/nprogress/nprogress.js"></script>
        <!-- Dropzone.js -->
        <script src="<?php echo __ROOT__; ?>vendors/dropzone/dist/min/dropzone.min.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?php echo __ROOT__; ?>build/js/custom.min.js"></script>

        <script type="text/javascript">
            var UPLOAD_URI = '<?php echo __PROD__.__UPLOADDIR__; ?>',
                ROOT = '<?php echo __ROOT__; ?>',
                PROD = '<?php echo __PROD__; ?>';
        </script>

        <!-- Custom Script -->
        <script src="<?php echo __JSDIR__; ?>main.js"></script>
<?php
    }
?>
    </body>
</html>