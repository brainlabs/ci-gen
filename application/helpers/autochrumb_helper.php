<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Daud D. Simbolon
 */
if(!function_exists('set_label'))
{
    function set_label($text = NULL)
    {
        if($text)
        {
            $label = preg_replace('/_id$/', '', $text);
            $label = str_replace('_', ' ', $label);
            $label = ucwords($label);
        }
        else
        {
            $label = '';
        }
        
        return $label;
    }

}

if(!function_exists('create_breadcrumb'))
{
    function create_breadcrumb()
    {
        $ci = &get_instance();
        $i=1;
        $uri = $ci->uri->segment($i);
        $link = '<ol class="breadcrumb">';
        
        while($uri != '')
        {
            $prep_link = '';
            
            for($j=1; $j<=$i;$j++)
            {
                $prep_link .= $ci->uri->segment($j).'/';
            }

            if($ci->uri->segment($i+1) == '')
            {
                //$link.='<li><a href="'.site_url($prep_link).'"><b>';
                $link.='<li><b>';
                $link.=set_label($ci->uri->segment($i) ).'</b></li> ';
            }
            else
            {
                $link.='<li><a href="'.site_url($prep_link).'"> <i class="fa fa-home"></i> ';
                $link.= set_label($ci->uri->segment($i) ).'</a></li> ';
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }
        
        $link .= '</ol>';
        return $link;
    }
}



