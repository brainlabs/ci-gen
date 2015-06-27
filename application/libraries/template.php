<?php if(! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Class template
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
class template
{

    /** @var array $_js */
    private $_js = [];

    /** @var array $_css */
    private $_css = [];

    /** @var array $_data */
    private $_data = [];

    /** @var string $_template */
    private $_template = 'template';

    /** @var  $_ci */
    private $ci;
    
    /**
     * Class constructor
     */
    function __construct()
    {
        $this->ci = &get_instance();
        log_message('debug', "Template Class Initialized");
    }
    
    /**
     * @param string $template
     */
    function set_template($template = '')
    {
        if(file_exists(APPPATH . 'views/' . $template) or file_exists(APPPATH . 'views/' . $template . EXT)) {
            $this->_template = $template;
        } else {
            show_error('The filename provided does not exist in <strong>' . APPPATH . 'views</strong>. Remember to include the extension if other than ".php"');
        }
    }

    /**
     * Created js additional
     * @param        $script
     * @param string $type
     * @param bool   $defer
     * @return bool
     */
    function js_add($script, $type = 'import', $defer = false)
    {
        $success = true;
        $js = null;

        $this->ci->load->helper('url');

        switch($type) {
            case 'import':
                $filepath = base_url() . $script;
                $js = '<script type="text/javascript" src="' . $filepath . '"';
                if($defer) {
                    $js .= ' defer="defer"';
                }
                $js .= "></script>";
                break;

            case 'embed':
                $js = '<script type="text/javascript"';
                if($defer) {
                    $js .= ' defer="defer"';
                }
                $js .= ">";
                $js .= $script;
                $js .= '</script>';
                break;

            default:
                $success = false;
                break;
        }

        // Add to js array if it doesn't already exist
        if($js != null && ! in_array($js, $this->_js)) {
            $this->_js[] = $js;

        }

        return $success;
    }
    
    
    /**
     * Created js additional
     * @param        $style
     * @param string $type
     * @param bool   $media
     * @return bool
     */
    function css_add($style, $type = 'link', $media = false)
    {
        $success = true;
        $css = null;

        $this->ci->load->helper('url');
        $filepath = base_url() . $style;

        switch($type) {
            case 'link':

                $css = '<link type="text/css" rel="stylesheet" href="' . $filepath . '"';
                if($media) {
                    $css .= ' media="' . $media . '"';
                }
                $css .= ' />';
                break;

            case 'import':
                $css = '<style type="text/css">@import url(' . $filepath . ');</style>';
                break;

            case 'embed':
                $css = '<style type="text/css">';
                $css .= $style;
                $css .= '</style>';
                break;

            default:
                $success = false;
                break;
        }

        // Add to js array if it doesn't already exist
        if($css != null && ! in_array($css, $this->_css)) {
            $this->_css[] = $css;

        }

        return $success;
    }

    /**
     * Extract Css to rendered
     */
    function _extract()
    {
        $_css = "";
        if($this->_css) {
            foreach($this->_css as $css) {
                $_css .= $css;
            }
        }
        
        $_js = "";
        if($this->_js) {
            foreach($this->_js as $js) {
                $_js .= $js;
            }
        }
        
        $this->_data['css'] = $_css;
        
        $this->_data['js'] = $_js;
    }
    
    /**
     * @param $view
     * @param $data
     */
    function _view($view, $data)
    {
        $this->_data['content'] = $this->ci->load->view($view, $data, true);
    }

    /**
     * @param       $view
     * @param array $data
     */
    function render($view, $data = [])
    {
        $this->_extract();
        $this->_view($view, $data);
        
        $this->ci->load->view($this->_template, $this->_data);
    }

}


