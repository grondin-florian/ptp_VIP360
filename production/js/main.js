jQuery(document).ready(function($) {
    if($('#ptpVIP360Xmls').length > 0) 
    {
        Dropzone.options.ptpVIP360Xmls = {
            maxFiles: 7,
            addRemoveLinks: true,
            acceptedFiles: '.xml',
            maxFilesize: 0.2,

            dictCancelUpload: 'Annuler l\'envoi du fichier',
            dictCancelUploadConfirmation: 'Êtes-vous sûre de vouloir abandonner l\'envoi du fichier',
            dictRemoveFile: 'Supprimer ce fichier',
            dictDefaultMessage: 'Déposer vos fichiers ici pour les envoyer',
            dictInvalidFileType: 'L\'extension du fichier envoyé n\'est pas supporté',
            dictFileTooBig: 'La taille limite pour un fichier est de {{maxFilesize}} Mo',
            dictResponseError: 'Erreur coté serveur : Code {{statusCode}}',
            dictMaxFilesExceeded: 'Nombre maximum de fichier atteint. Supprimez-en pour pouvoir continuer l\'envoi',

            init: function() {
                this.on('success', function(file, resp) {

                });
                this.on('removedfile', function(file) {
                    alert('Catch removed file event');
                });
                this.on('queuecomplete', function(file) {
                    if($('#ptpVIP360Xmls').find('.dz-preview.dz-success.dz-complete').length === 7)
                        location.reload();
                });
            }
        }
    }


    if($('#xmlFiles_display').length > 0) 
    {
        $('.remove-xmls').click(function() {
            if(confirm('Êtes-vous sûre de vouloir recommencer le projet ?'))
            {
                $.ajax(PROD + 'form_upload.php', {
                    data: {
                        projectName: PROJECTNAME
                    },
                    success: function(result) {
                        location.reload();
                    }
                });
            }
        });
    }
});
