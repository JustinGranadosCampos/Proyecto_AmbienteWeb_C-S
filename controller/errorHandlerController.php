<?php
error_reporting(0);

function controlErrores($err_severity = null, $err_msg = null, $err_file = null, $err_line = null, array $err_context = array())
{
    if (!class_exists("Conexion")){
        include_once '../model/Conexion.inc.php';
    }
    $conexion = new Conexion();
    
    $e = @error_get_last();
    #echo '<pre>'; print_r($e); echo '</pre>';
    if (@is_array($e)) {
        $code = isset($e['type']) ? $e['type'] : 0;
        $msg = isset($e['message']) ? $e['message'] : 'Prueba';
        $file = isset($e['file']) ? $e['file'] : '';
        $line = isset($e['line']) ? $e['line'] : '';
        $conexion -> reportError( $code, $msg, $file, $line );
        if ($code>0){
        
            #error_handler($code, $msg, $file, $line);
            $conexion -> reportError( $code, $msg, $file, $line );
        }
        #echo '<pre>'; print_r("sale"); echo '</pre>';
    }
}

set_error_handler('controlErrores');
register_shutdown_function( "controlErrores" );
?>