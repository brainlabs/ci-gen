<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *  Copyright 2013
 * 
 */

/**
 * Description of excel_reader
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */
require_once APPPATH."/third_party/PHPExcel.php"; 

class excel extends PHPExcel 
{ 
    public function __construct() 
    { 
        parent::__construct(); 
    } 
}

?>
