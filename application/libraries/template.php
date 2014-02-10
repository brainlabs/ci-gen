<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  Copyright 2013
 * 
 */

/**
 * Template library
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */
class template
{

    private $_js = array();
    private $_css = array();
    private $_data = array();
    private $_template = 'template';
    private $ci;
    
    


    function __construct()
    {
        $this->ci = & get_instance();
        log_message('debug', "Template Class Initialized");
    }
    
    
    function set_template($template ='')
    {
       
        if(file_exists(APPPATH .'views/' . $template) or file_exists(APPPATH .'views/' . $template .EXT))
        {
             $this->_template = $template;
        }
        else 
        {
            show_error('The filename provided does not exist in <strong>'. APPPATH .'views</strong>. Remember to include the extension if other than ".php"');
        }
    }
    
    function js_add($script,$type = 'import',$defer = FALSE)
    {
        $success = TRUE;
        $js = NULL;

        $this->ci->load->helper('url');

        switch ($type)
        {
           case 'import':
              $filepath = base_url() . $script;
              $js = '<script type="text/javascript" src="'. $filepath .'"';
              if ($defer)
              {
                 $js .= ' defer="defer"';
              }
              $js .= "></script>";
              break;

           case 'embed':
              $js = '<script type="text/javascript"';
              if ($defer)
              {
                 $js .= ' defer="defer"';
              }
              $js .= ">";
              $js .= $script;
              $js .= '</script>';
              break;

           default:
              $success = FALSE;
              break;
        }

        // Add to js array if it doesn't already exist
        if ($js != NULL && !in_array($js, $this->_js))
        {
           $this->_js[] = $js;

        }

        return $success;
    }
    
    
    
    function css_add($style,$type = 'link',$media = FALSE)
    {
        $success    = TRUE;
        $css        = NULL;

         $this->ci->load->helper('url');
         $filepath = base_url() . $style;

        switch ($type)
        {
           case 'link':

              $css = '<link type="text/css" rel="stylesheet" href="'. $filepath .'"';
              if ($media)
              {
                 $css .= ' media="'. $media .'"';
              }
              $css .= ' />';
              break;

           case 'import':
              $css = '<style type="text/css">@import url('. $filepath .');</style>';
              break;

           case 'embed':
              $css = '<style type="text/css">';
              $css .= $style;
              $css .= '</style>';
              break;

           default:
              $success = FALSE;
              break;
        }
      
        // Add to js array if it doesn't already exist
        if ($css != NULL && !in_array($css, $this->_css))
        {
           $this->_css[] = $css;

        }

        return $success;
    }
            
    function _extract()
    {
        $_css = "";
        if($this->_css)
        {
            foreach ($this->_css as $css)
            {
                $_css .=$css;
            }
        }
        
        $_js = "";
        if($this->_js)
        {
            foreach ($this->_js as $js)
            {
                $_js .=$js;
            }
        }
        
        $this->_data['css'] = $_css;
        
        $this->_data['js'] =  $_js;
    }
    
    
    function _view($view,$data)
    {        
        $this->_data['content'] = $this->ci->load->view($view,$data,TRUE);
    }
            
    function render($view,$data= array())
    {
        $this->_extract();
        $this->_view($view,$data);
        
        $this->ci->load->view($this->_template,  $this->_data);
    }

}

?>
