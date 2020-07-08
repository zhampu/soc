<?php

Kirby::plugin('azertypow/client-upload-files', [
    'routes' => [
        [
            'pattern' => 'client/api/upload',
            'method' => 'POST',
            'action'  => function () {
                header('Access-Control-Allow-Origin: *');
                $rootDirPath = realpath( "./");
                $uploadDir = 'uploads';

                $uploadsDirPath = "$rootDirPath/$uploadDir/";

                echo $uploadsDirPath;

                if ( !file_exists( $uploadsDirPath ) ) {
                    mkdir($uploadsDirPath, 0777, true);
                }

                $uploadFile = $uploadsDirPath . basename($_FILES['userfile']['name']);

                echo "test: $uploadFile";

                echo '<pre>';
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
                    echo "fichier téléchargé \n";
                } else {
                    echo "erreur: \n";
                }

                echo 'info: ';
                print_r($_FILES);

                echo '</pre>';

            }
        ],
        [
            'pattern' => 'client/api/upload/interface-sample',
            'action'  => function() {

                echo '
                    <!-- Le type d\'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
                    <form enctype="multipart/form-data" action="/client/api/upload" method="post">
                      <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
                      <!-- Le nom de l\'élément input détermine le nom dans le tableau $_FILES -->
                      Envoyez ce fichier : <input name="userfile" type="file" />
                      <input type="submit" value="Envoyer le fichier" />
                    </form>
                ';
            }
        ]
    ]
]);
