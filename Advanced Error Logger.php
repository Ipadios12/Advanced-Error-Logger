<?php
/*
Plugin Name: Advanced Error Logger
Description: Captures and logs PHP, errors and attempts to fix them automatically. If fixing fails, removes the problematic line.
Version: 2.0
Author: Constantinescu Valentin
*/

function error_logger_handle_error($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        return;
    }

   
    echo "<div id='error-logger' style='background-color: #f44336; color: white; padding: 10px; margin: 10px 0; border-radius: 5px;'>";
    echo "<strong>Error:</strong> [$errno] $errstr - $errfile:$errline";
    echo "<form method='post' style='display: inline-block; margin-top: 10px;'>";
    echo "<input type='hidden' name='error_file' value='" . esc_attr($errfile) . "'>";
    echo "<input type='hidden' name='error_line' value='" . esc_attr($errline) . "'>";
    echo "<button type='submit' name='fix_error' style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 10px;'>Fix Error</button>";
    echo "</form>";
    echo "</div>";

    
    return true;
}

function error_logger_fix_error() {
    if (isset($_POST['fix_error'])) {
        $file = $_POST['error_file'];
        $line = $_POST['error_line'];

        
        if (is_writable($file)) {
            $file_content = file($file);

            
            if ($file_content !== false && isset($file_content[$line - 1])) {
                
                unset($file_content[$line - 1]);
                file_put_contents($file, implode('', $file_content));

               
                echo "<script>
                    document.getElementById('error-logger').style.display = 'none';
                    alert('Error on line $line of $file has been removed.');
                    </script>";
            } else {
               
                echo "<div style='background-color: #f44336; color: white; padding: 10px; margin: 10px 0; border-radius: 5px;'>";
                echo "Could not fix the error. Please check the file path and line number.";
                echo "</div>";
            }
        } else {
           
            echo "<div style='background-color: #f44336; color: white; padding: 10px; margin: 10px 0; border-radius: 5px;'>";
            echo "The file is not writable. Please check the file permissions.";
            echo "</div>";
        }
    }
}

add_action('init', 'error_logger_fix_error');
set_error_handler('error_logger_handle_error');

?>