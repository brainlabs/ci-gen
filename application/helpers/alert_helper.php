<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');
/*
 *  Copyright 2013
 * 
 */

/**
 * Alert helper
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */


if(!function_exists('alert'))
{
    function alert($msg,$type = 'info') 
    {
        $tpl = '';
        switch ($type)
        {
            case 'info' :
                $tpl  = '<div class="alert  alert-info alert-dismissable">';
                break;
            
            case 'success' :
                $tpl  = '<div class="alert  alert-success alert-dismissable">';
                break;
            
            case 'warning' :
                $tpl  = '<div class="alert  alert-warning alert-dismissable">';
                break;
            
            case 'danger' :
                $tpl  = '<div class="alert  alert-danger alert-dismissable">';
                break;
            default :
                 $tpl  = '<div class="alert  alert-info alert-dismissable">';
                break;                
        }
        
        
        $tpl .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        $tpl .= '<strong> '. ucwords($type) .'! </strong>' . $msg;
        $tpl .= '</div>';
        
        return $tpl;
    }
}

?>