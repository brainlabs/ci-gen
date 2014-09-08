
<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller Dashboard
 * @created on : 16-05-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class dashboard extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
       
    }
    

    /**
    * List all data pegawai
    *
    */
    public function index() 
    {
    	$data = array(
    			
    			'menus' => $this->dir_to_array(APPPATH . 'modules/')
    	);
        $this->template->render('dashboard/view',$data);
	      
    }
    
    
    private function dir_to_array($dir, $separator = DIRECTORY_SEPARATOR, $paths = 'relative')
    {
    	$result = array();
    	$cdir = scandir($dir);
    	foreach ($cdir as $key => $value)
    	{
    		if (!in_array($value, array(".", "..")))
    		{
    			if (is_dir($dir . $separator . $value))
    			{
    				$result[] = array('name'=>$value,'label'=> set_label($value));
    			}
    		}
    	}
    	return $result;
    }

    

    
}

?>
