<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of generator
 * @created on : 22 Jan 14, 0:05:21
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
class gens extends CI_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->template->set_template('generator/template');
        $this->load->library('Generate');
        
    }
    
    function index()
    {
        $data = array(
            'table' => $this->generate->get_table()
        );
       
       $this->template->js_add('assets/js/generator.js');
       $this->template->render('generator/index',$data);
     
    }
    
    
    function write()
    {
        $table = $this->input->post('table');
        
        $data = form_open('#','method="post" id="form"');
        $data .= $this->generate->generate_form($table);
        
        $data .= form_button(
                array(
                    'value'=>'Build',
                    'class'=>'btn btn-primary',
                    'id'=>'build'
                    ),
                  'Build'
                );
        $data .= form_close();
        echo json_encode($data);
        
    }
    
    
    function build()
    {
        $this->generate->build_view();
    }
    
    
    function coba()
    {
        $data= $this->generate->get_field('agama');
        foreach ($data as $key)
        {
            print_r($key);
            echo '<br/>';
        }
    }
    
    
    
}
