<html>
    <head>
        <?php

        function prep_path($path) {
            return str_replace("\\", "/", $path);
        }

        function preVar($param, $exit = false) {
            echo '<pre>';
            var_dump($param);
            echo '</pre>';
            if ($exit)
                exit;
        }

        function directory_map($source_dir, $directory_depth = 0, $hidden = FALSE) {
            if ($fp = @opendir($source_dir)) {
                $filedata = array();
                $new_depth = $directory_depth - 1;
                $source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

                while (FALSE !== ($file = readdir($fp))) {
                    if (!trim($file, '.') OR ( $hidden == FALSE && $file[0] == '.')) {
                        continue;
                    }

                    if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir . $file)) {
                        $filedata[$file] = directory_map($source_dir . $file . DIRECTORY_SEPARATOR, $new_depth, $hidden);
                    } else {
                        $filedata[] = $file;
                    }
                }

                closedir($fp);
                return $filedata;
            }

            return FALSE;
        }

        function addClassForText($dirArray, $outText, $skipThisFiles) {

            foreach ($dirArray as $key => $value) {
                if (is_array($value)) {
                    $outText = addClassForText($value, $outText, $skipThisFiles);
                } else {
                    if (!in_array($value, $skipThisFiles)) {

                        $value = str_replace('.php', '', $value);
                        $outText.="* @property " . ucfirst($value) . ' $' . strtolower($value) . "\n";
                    }
                }
            }

            return $outText;
        }

        function addClassForArray($dirArray, $outArray, $skipThisFiles) {

            foreach ($dirArray as $key => $value) {
                if (is_array($value)) {
                    $outArray = addClassForText($value, $outArray, $skipThisFiles);
                } else {
                    if (!in_array($value, $skipThisFiles)) {

                        $value = str_replace('.php', '', $value);
                        $outArray[] = ucfirst($value);
                    }
                }
            }

            return $outArray;
        }

        $absPath = prep_path(getcwd());
        $currentDir = NULL;
        $currentDirA = explode("/", $absPath);
        $currentDir = @end($currentDirA);
        ?>
        <title><?php echo ($currentDir != NULL) ? $currentDir . ' - ' : ''; ?> CodeIgniter - AUTO-TEMPLATE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="NetBeans CodeIgniter autocompleter"/>
        <meta name="keywords" content="netbeans ci autocompleter" />
        <meta name="author" content="Tomas Kaplar"/>
        <style type="text/css">
            body {
                font-family: "Courier New", Courier, monospace;
                font-size: 15px;
                color: #666;
                line-height: 23px;
            }
        </style>
        <link rel="shortcut icon" href="data:image/png;base64,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"/>
    </head>
    <?php
    $this_file_name = pathinfo(__FILE__, PATHINFO_BASENAME);
    $index_file_name = 'index.php';
    $index_file = FALSE;
    $applicationPath = FALSE;
    $skipThisFiles = array('index.html');


    if (file_exists($index_file_name)) {
        $index_file = file_get_contents($index_file_name);
    } else {
        die('File ' . $index_file_name . ' not exist. Please put this file (' . $this_file_name . ') into codeigniter project root!');
    }
    // get application path from index.php
    if ($index_file !== FALSE) {

        //$application_folder = 'application';
        $pos1 = strpos($index_file, '$application_folder') + strlen('$application_folder');
        $pos2 = strpos($index_file, ";", $pos1);

        $applicationPath = trim(str_replace("\"", "'", substr($index_file, $pos1, $pos2 - $pos1)), "'= \t\n\r\0\x0B");
        $absPath .= prep_path(DIRECTORY_SEPARATOR);
        $absApplicationPath = prep_path($absPath . $applicationPath . DIRECTORY_SEPARATOR);
        echo 'Project path: ' . $currentDir . '<br>';
        echo 'Project abs path:  ' . $absPath . '<br>';
        echo 'Application path: ' . $applicationPath . '<br>';
        echo 'Application abs path: ' . $absApplicationPath . '<br>';


        $ci_path = prep_path('system' . DIRECTORY_SEPARATOR . 'core');

        echo 'CodeIgniter core path:  ' . $ci_path . '<br>';
        echo str_repeat("-", 150) . '<br>';
        echo '<br>';


        $dir_model = directory_map($absApplicationPath . 'models');
        $dir_lib = directory_map($absApplicationPath . 'libraries');
        $dir_core = directory_map($absApplicationPath . 'core');

//        preVar($dir_model);
//        preVar($dir_lib);
//        preVar($dir_core);

        $outputFirst = "";
        $output = "<?php \n//Last update " . date('d.m.Y, H:i', time()) . "\n\n";
        $output .= "/** \n";
        $outputFirst .= '
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property CI_Benchmark $benchmark
* @property CI_Cache $cache
* @property CI_Calendar $calendar
* @property CI_Cart $cart
* @property CI_Config $config
* @property CI_Controller $controller
* @property CI_Email $email
* @property CI_Encrypt $encrypt
* @property CI_Exceptions $exceptions
* @property CI_Form_validation $form_validation
* @property CI_Ftp $ftp
* @property CI_Image_lib $image_lib
* @property CI_Input $input
* @property CI_Lang $lang
* @property CI_Loader $load
* @property CI_Log $log
* @property CI_Migration $migration
* @property CI_Model $model
* @property CI_Output $output
* @property CI_Pagination $pagination
* @property CI_Parser $parser
* @property CI_Profiler $profiler
* @property CI_Router $router
* @property CI_Session $session
* @property CI_Security $security
* @property CI_Sha1 $sha1
* @property CI_Utf8 $utf8
* @property CI_Table $table
* @property CI_Trackback $trackbackv
* @property CI_Typography $typography
* @property CI_Unit_test $unit_test
* @property CI_Upload $upload
* @property CI_URI $uri
* @property CI_DB_utility $dbutil
* @property CI_User_agent $user_agent
* @property CI_Validation $validation
* @property CI_Xmlrpc $xmlrpc
* @property CI_Xmlrpcs $xmlrpcs
* @property CI_Zip $zip';

        $arrayCoreClass = addClassForArray($dir_core, array(), $skipThisFiles);
        foreach ($arrayCoreClass as $value) {
            $value2 = str_replace('MY_', 'CI_', $value);
            $outputFirst = str_replace($value2, $value, $outputFirst);
        }
        $output.=$outputFirst;
        $output.="\n" . addClassForText($dir_model, '', $skipThisFiles);
        $output.=str_replace('my_', '', addClassForText($dir_lib, '', $skipThisFiles));

        $output.="*/" . "\n";
        $output.="class CI_Controller { 
                
 /**
 * @access public
 * @return CI_Controller
 * 
 */
function get_instance() {}

};";
        $output.="\n\n\n";
        $output .='class CI_DB_Driver {
 /**
  * Execute the query
  *
  * Accepts an SQL string as input and returns a result object upon
  * successful execution of a "read" type query.  Returns boolean TRUE
  * upon successful execution of a "write" type query. Returns boolean
  * FALSE upon failure, and if the $db_debug variable is set to TRUE
  * will raise an error.
  *
  * @access public
  * @param string An SQL query string
  * @param array An array of binding data
  * @return CI_DB_mysql_result
  */
 function query() {}
};
';
        $output .= "/** \n\n";
        $output.= substr(addClassForText($dir_model, '', $skipThisFiles), 0, -2);
        $output.='
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property CI_Config $config
* @property CI_Loader $load
* @property CI_Session $session';
        $output.="\n*/" . "\n\n";
        $output.="class CI_Model {}; \n";
        $output.='/**
 * @return CI_Controller
 */
function get_instance() {}';


        $res = file_put_contents($absPath . 'CI_AUTOCOMPLETE.php', $output);
        if ($res) {
            echo "Operation succeed... <br>This is your Auto Complete File: <b>" . $absPath . "CI_AUTOCOMPLETE.php</b>";
        } else {
            echo 'Operation Error';
        }

       
    } else {
        die('Cannot get application path from ' . $index_file_name . '.');
    }
    ?>
</html>
