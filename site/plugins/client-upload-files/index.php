<?php

Kirby::plugin('azertypow/client-upload-files', [
    'routes' => [
        [
            'pattern' => 'client/api/upload',
            'method' => 'POST',
            'action'  => function () {
                // DEFAULTS
                $timenow = time();
                $ip = $_SERVER['REMOTE_ADDR'];
//include 'mysql_connect.php';


// accept upload by default
                $uploadOk = 0;

// Check if file was sent
                if(isset($_POST["submit"])) {

                    $target_dir = "./";



                    $newarraynama=rtrim($arraynama,", ");
                    echo "<br />escapeshellarg: ".trim(escapeshellarg($_FILES["fileToUpload"]["name"]), "\'")."<br />";
                    echo "<br />".$_FILES["fileToUpload"]["name"]."<br />";
                    if (trim(escapeshellarg($_FILES["fileToUpload"]["name"]),"'") == $_FILES["fileToUpload"]["name"]){
                        echo "<br /> Filename is OK<br />";
                        //$myfiletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        //echo "Filetype: ".$myfiletype."<br />";
//    $target_filename = time()."_".substr(md5(microtime()),rand(0,26),5).".".$myfiletype;
                        // adding original name
//    $target_filename = time()."_".substr(md5(microtime()),rand(0,26),5)."_".$_FILES["fileToUpload"]["name"].".".$myfiletype;
                        $target_filename = time()."_".substr(md5(microtime()),rand(0,26),5)."_".$_FILES["fileToUpload"]["name"];
                        //echo "Filename: ".$target_filename."<br />";
                        $target_file = $target_dir."files/".$target_filename;
                        //echo "Filename: ".$target_file."<br />";

                    } else {
                        echo "<br /> Filename is NOT OK<br />";
                        $uploadOk++;
                    }



                    // Check file size (500000 = 500KB)
                    $filesize = escapeshellarg($_FILES["fileToUpload"]["size"]);
                    if ($filesize > 1000000) {
                        echo "<br />Sorry, your file is too large: ".$filesize."<br />";
                        $uploadOk++;
                    }


                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk > 0) {
                        echo "Sorry, your file was not uploaded. $uploadOk errors.<br />";
                        // if everything is ok, process the file
                    } else {
                        // scan the file
                        $safe_path = escapeshellarg($_FILES['fileToUpload']['tmp_name']);
                        echo '<BR />'.$safe_path.'<br />';
                        $command = 'clamscan ' . $safe_path;
                        $out = '';
                        // filevalid should be 0 = pass scan
                        $filevalid = -1;
                        echo exec($command, $out, $filevalid);

                        // move validated file to uploaded folder
                        if ($filevalid == 0){
                            echo '<br />';

                            echo '<BR />'.$target_file.'<br />';
                            // for some reasons using $safe_path directly does not work, neither using escape escapeshellarg($_FILES["fileToUpload"]["tmp_name"]
                            // ->
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//      if (move_uploaded_file(escapeshellarg($_FILES["fileToUpload"]["tmp_name"]), $target_file)) {
//      if (move_uploaded_file($safe_path, $target_file)) {
                                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                                echo "The file ".$target_filename." has been uploaded.<br />";
                                echo 'URL is <a href="'.$target_file.'" target="_blank">'.$target_file.'</a><br />';
                            } else {
                                echo "Sorry, there was an error uploading your file.<br />";
                            }
                        } else {
                            echo "Sorry, the file did not pass validation!";
                        }
                    }
                }

            }
        ],

    ]
]);
