<?php
    if (!file_exists("variaveis.php")) {

        $file = fopen('variaveis.php', 'w');
        if (isset($_POST['config'])) {
            $text  = "\ndefine('DB_HOSTNAME', '".$_POST['server']."');\n";
            $text .= "define('DB_USERNAME', '".$_POST['User']."');\n";
            $text .= "define('DB_PASSWORD', '".$_POST['paswd']."');\n";
            $text .= "define('DB_DRIVER', '".$_POST['driver']."');";
        }
        fwrite($file, '<?php ');
        fwrite($file, $text);
        fclose($file);
    }
    header("Location: ../");
?>