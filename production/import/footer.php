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
        <!-- bootstrap-progressbar -->
        <script src="<?php echo __ROOT__; ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo __ROOT__; ?>vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo __ROOT__; ?>vendors/moment/min/moment.min.js"></script>
        <script src="<?php echo __ROOT__; ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="<?php echo __ROOT__; ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="<?php echo __ROOT__; ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="<?php echo __ROOT__; ?>vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="<?php echo __ROOT__; ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="<?php echo __ROOT__; ?>vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo __ROOT__; ?>vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="<?php echo __ROOT__; ?>vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="<?php echo __ROOT__; ?>vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="<?php echo __ROOT__; ?>vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="<?php echo __ROOT__; ?>vendors/starrr/dist/starrr.js"></script>
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