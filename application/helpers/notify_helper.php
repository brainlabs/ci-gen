<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

/**
 * Alert helper
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */

if(!function_exists('notify'))
{
    function notify($msg,$type = 'info',$judul = '') 
    {
        $tpl = '';
        switch ($type)
        {
            case 'info' :
                $tpl  = '<div class="alert  alert-info fade">';
                $prefix = "Info";
                break;
            
            case 'success' :
                $tpl  = '<div class="alert  alert-success fade">';
                $prefix = "Sukses";
                break;
            
            case 'warning' :
                $tpl  = '<div class="alert  alert-warning fade">';
                $prefix = "Peringatan";
                break;
            
            case 'danger' :
                $tpl  = '<div class="alert  alert-danger fade">';
                $prefix = "Bahaya";
                break;
            default :
                 $tpl  = '<div class="alert  alert-info fade>';
                 $prefix = "Info";
                break;                
        }

        $tpl .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $tpl .= '<strong> '. (trim($judul) !='' ? ucwords($judul) : ucwords($prefix)) .'! </strong> ' . $msg;
        $tpl .= '<script>
                
                $(document).ready(function(){
                     $(".alert").delay(7500).addClass("in").fadeOut("slow");
                });
                
                </script>';
        $tpl .= '</div>';
        
        return $tpl;
    }
}

?>
