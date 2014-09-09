
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
    	
        $this->template->render('dashboard/view');
	      
    }
    
    
    

    
}

?>
