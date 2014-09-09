<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of generator
 * @created on : 22 Jan 14, 0:05:21
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
class builder extends CI_Controller
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
            	'table' => $this->generate->get_table(),
    			
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
        //$this->generate->build_view();
       $this->generate->output = APPPATH . 'modules/';
       $msg = $this->generate->run($this->input->post('table'),$this->input->post('fields'));
       
       $msg = notify($msg, 'Info');
       
       echo $msg;
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
                    $result[] = array('name'=>$value,'label'=> $this->generate->set_label($value));
                }
            }
        }
        return $result;
    } 

    
    
    
    
    
    function tools()
    {
       $data['menus'] = $this->dir_to_array(APPPATH . 'modules/');
       $this->template->js_add('assets/js/generator.js');
       $this->template->render('generator/tools',$data);
    }


    function create_menu()
    {
        if($this->input->post('fields'))
        {
            $fields = $this->input->post('fields');
            $menus = array();

            if($fields)
            {
                foreach ($fields as $key => $val)
                {                    
                    $menus[] = array('link'=> $key,'label'=>$val);
                }
            }
            $data = array(
                'menus'             => $menus,      
                'php_open'          => '<?php',
                'php_close'         => '?>',              
            );



            $source = $this->parser->parse('template/template', $data, TRUE);

            write_file(APPPATH . 'views/template.php', $source);

            //echo json_encode($this->input->post('fields'));
            
             $msg = notify('Menu On Navbar has been created', 'Info');
            
        }
        else 
        {
        
            $msg = notify('No data to be created', 'danger','Oops');
        }
        
        echo $msg;
    }
    
    
    
 
    
    
}
