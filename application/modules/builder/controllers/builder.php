<?php if(! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of generator
 * @created on : 22 Jan 14, 0:05:21
 * @author  DAUD D. SIMBOLON <daud.simbolon@gmail.com>
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
        $data = [
            'table' => $this->generate->get_table(),

        ];

        $this->template->js_add('assets/js/generator.js');
        $this->template->render('generator/index', $data);

    }
    
    /**
     * generate code
     */
    function write()
    {
        $table = $this->input->post('table');
        
        $data = form_open('#', 'method="post" id="form"');
        $data .= $this->generate->generate_form($table);
        
        $data .= form_button(
            [
                'value' => 'Build',
                'class' => 'btn btn-primary',
                'id' => 'build'
            ],
            'Build'
        );
        $data .= form_close();
        echo json_encode($data);
        
    }

    /**
     * Build Code
     */
    function build()
    {
        //$this->generate->build_view();
        $this->generate->output = APPPATH . 'modules/';
        $msg = $this->generate->run($this->input->post('table'), $this->input->post('fields'));

        $msg = notify($msg, 'Info');

        echo $msg;
    }
    
    
    /**
     * @param             $dir
     * @param string      $separator
     * @param string      $paths
     * @return array
     */
    private function dir_to_array($dir, $separator = DIRECTORY_SEPARATOR, $paths = 'relative')
    {
        $result = [];
        $cdir = scandir($dir);
        foreach($cdir as $key => $value) {
            if(! in_array($value, [".", ".."])) {
                if(is_dir($dir . $separator . $value)) {
                    $result[] = ['name' => $value, 'label' => $this->generate->set_label($value)];
                }
            }
        }

        return $result;
    }
    

    /**
     * Listing directory on modules to array
     */
    function tools()
    {
        $data['menus'] = $this->dir_to_array(APPPATH . 'modules/');
        $this->template->js_add('assets/js/generator.js');
        $this->template->render('generator/tools', $data);
    }

    /**
     * Create menu automatically
     */
    function create_menu()
    {
        if($this->input->post('fields')) {
            $fields = $this->input->post('fields');
            $menus = [];

            // check if have post field
            if($fields) {
                foreach($fields as $key => $val) {
                    $menus[] = ['link' => $key, 'label' => $val];
                }
            }
            $data = [
                'menus' => $menus,
                'php_open' => '<?php',
                'php_close' => '?>',
            ];


            $source = $this->parser->parse('template/template', $data, true);

            write_file(APPPATH . 'views/template.php', $source);

            //echo json_encode($this->input->post('fields'));
            
            $msg = notify('Menu On Navbar has been created', 'Info');
            
        } else {

            $msg = notify('No data to be created', 'danger', 'Oops');
        }
        
        echo $msg;
    }
    
    
}
