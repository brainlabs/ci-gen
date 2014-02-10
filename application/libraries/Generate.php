<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of generator
 * Create automatically crud code
 * @created on : 22 Jan 14, 0:57:11
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */


class Generate
{

    private $ci ;
    public  $output ='./output/';
    




    protected $tpl = array (
                    'table_open'          => '<table class="table table-condensed table-bordered">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
    
    function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->library('table');
        $this->ci->load->database();
    }

    function year()
    {
        return date('Y');
    }

    private function php_tags()
    {
        return array(
            'php_open'=>'<?php',
            'php_close'=>'?>'
        );
    }

        // Ambil Seluruh tabel dari database
    public function get_table()
    {
        $list_table = $this->ci->db->list_tables();
        
        $data =array();
        if($list_table)
        {
            foreach ($list_table as $key)
            {
                $data[$key] = $key;
            }
        }
        return $data;
    }
    
    
    
    // Ambil field dari tabel
    function get_field($table = null)
    {
        if($table)
        {
            return $this->ci->db->field_data($table);
        }
        else
        {
            return array();
        }
    }
    
    // Generate Form 
    function generate_form($table = null)
    {
        $this->ci->table->set_template($this->tpl); 
        $this->ci->table->set_heading('Field', 'Field Type', 'Validation ' . form_checkbox(array('id'=>'all','name'=>'all'),1,FALSE),'Show');
        $template = '';
        
        $data = array();
        if($table)
        {
            $field = $this->get_field($table);
            
            
            
            foreach ($field as $label)
            {
               // $template .= $this->_dropdown('fields['. $label->name .'][type]');
                if($label->primary_key)
                {
                    $show = '-';
                }
                else
                {
                    $show = form_checkbox('fields['. $label->name .'][show]', 1,true);
                }
                
                // chek 
               if(!$label->primary_key)
               {
                    if($label->type !== 'timestamp')
                   {
                   
                        $data[] = array(
                                $label->name,
                                $this->_dropdown('fields['. $label->name .'][type]'),
                                form_checkbox(
                                        array(
                                            'name'=> 'fields['. $label->name .'][validation]',
                                            'class'=> 'validation'
                                            ), 
                                            1,
                                        FALSE) . ' Required',
                                $show,
                            );
                   }
               }    
               else
               {
                   if($label->type != 'timestamp')
                   {
                        $data[] = array(
                                 $label->name,
                                 '-',
                                 '-',
                                 $show,
                         );
                   }
               }
            }
            
            return $this->ci->table->generate($data);
        }
        else
        {
            return '';
        }
        
    }
    
    
    
    function _dropdown($name = 'dropdown')
    {
        $data = array(
            'INPUT'     =>'INPUT',
            'CHECKBOX'  =>'CHECKBOX',
            'RADIO'     =>'RADIO',
            'PASSWORD'  =>'PASSWORD',
            'SELECT'    =>'SELECT',
            'TEXTAREA'  =>'TEXTAREA',            
            );
        
        
            return form_dropdown($name,$data,'text','class="form-control input-sm"');
    }
    
    
       
    
    
    // Buat label dari field name
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
    
        
     // get tables field, label, primary_key
    private function get_field_label ($table = NULL)
    {
        $label_name     = array();
        $field_name     = array();
        $field_search   = array();
        $primary_key    = '';
        $fields = $this->get_field($table);
        
        if($fields)
        {
            foreach ($fields as $field)
            {
                if(!$field->primary_key && $field->type !='timestamp')
                {
                    $field_name[] = array('field_name' => $field->name,'label'=> $this->set_label($field->name));
                    $label_name[] = array('label_name' => $this->set_label($field->name));
                }
                
                if($field->primary_key)
                {
                    $primary_key = $field->name;
                }
                
                if($field->type == 'varchar' || $field->type == 'text')
                {
                    $field_search[] = array('field_name' => $field->name);
                }
                
            }
        }
        
        return array(
            'labels'        => $label_name,
            'fields'        => $field_name,
            'fields_search' => $field_search,
            'primary_key'   => $primary_key
           );
    }
    
    
    
    
    // Create Form
    private function build_form($table,$post_field)
    {
       //$fields = $this->ci->input->post('fields');
       $fields = $post_field;
       $table_name = $table;
       $form = array();
       foreach ($fields as $key => $val)
       {
           
           
           if(isset($val['validation']))
           {
               $validation =  " required";
           }
           else
           {
               $validation = '';
           }
           
         // $replace = preg_replace('/_id/', '', $key);
           
       
           switch ($val['type'])
           {
               case 'INPUT' :
                   $input = "form_input(
                                array(
                                 'name'         => '$key',
                                 'id'           => '$key',                       
                                 'class'        => 'form-control input-sm $validation',
                                 'placeholder'  => '" . $this->set_label($key) . "',
                                 ),
                                 set_value('$key',\$table['$key'])
                           );";
                   break;
               
               case 'CHECKBOX' :
                   $input = "form_checkbox(
                            array(
                                 'name'  => $key,
                                 'id'    => $key,                       
                                 'class' => 'form-control input-sm $validation',                                 
                                 )
                            )";
                   break;
               
               case 'PASSWORD' :
                   $input = "form_password(
                                array(
                                 'name'         => '$key',
                                 'id'           => '$key',                       
                                 'class'        => 'form-control input-sm $validation',
                                 'placeholder'  => ' ". $this->set_label($key) ."',
                                 ),
                                 set_value('$key',\$table['$key'])
                           );";
                   break;
               
               case 'RADIO' :
                   $input = "form_radio(
                            array(
                                 'name'  => '$key',
                                 'id'    => '$key',                       
                                 'class' => 'form-control input-sm $validation',                                 
                                 ) 
                           );";
                   break;
               
               case 'SELECT' :
                   $input = "form_dropdown(
                           '$key',
                           $$replace,  
                           set_value('$key',''),
                           'class=\"input-sm $validation\"  id=\"$key\"'
                           );";
                   break;
               
               case 'TEXTAREA' :
                   $input = "form_textarea(
                            array(
                                'id'            =>'$key',
                                'name'          =>'$key',
                                'cols'          =>'$key',
                                'class'         =>'form-control input-sm $validation',
                                'placeholder'   =>'". $this->set_label($key) ."',
                                ),
                            set_value($key)                           
                            );";
                   break;
               
               default :
                   $input = '';
               
           }
           
           
           if(isset($val['show']))
           {
               
               $form[] = array (
                            'input' => $input,
                            'label' => $this->set_label($key),
                            'field' => $key
                        );
               
              
           }
          
       }
       
       $data                = $this->php_tags();
       $data['forms']       = $form;
       $data['table']       = $table;
       //$data['php_open']    = "<?php";
       //$data['php_close']   = "? >";
       
       $source = $this->ci->parser->parse('template/form.php', $data, TRUE);
       
       write_file($this->output . $table . '/views/form.php', $source);
        
    }
    
    
    // Create Model
    private function build_model($table =NULL)
    {
        $all                    = $this->get_field_label($table);
        $data                   = $this->php_tags();
        $data['fields_add']     = $all['fields'];
        $data['fields_save']    = $all['fields'];
        $data['fields_update']  = $all['fields'];
        $data['fields_search']  = $all['fields_search'];
        $data['primary_key']    = $all['primary_key'];
        $data['labels']         = $all['labels'];
        $data['table']          = $table;
        $data['year']           = $this->year();
        $source = $this->ci->parser->parse('template/model', $data, TRUE);
        
        write_file($this->output . $table . '/models/'. $table .'s.php', $source);
        
    }
    
    
    private function build_controller($table =NULL)
    {
        $all = $this->get_field_label($table);
        $data                   = $this->php_tags();
        $data['fields_add']     = $all['fields'];
        $data['fields_save']    = $all['fields'];
        $data['primary_key']    = $all['primary_key'];
        $data['labels']         = $all['labels'];
        $data['table']          = $table;
        $data['year']           = $this->year();
        $source = $this->ci->parser->parse('template/controller.php', $data, TRUE);
        
        write_file($this->output . $table . '/controllers/'. $table .'.php', $source);
        
    }
    
    
    private function build_view($table =null)
    {        
        $all                = $this->get_field_label($table);
        $data               = $this->php_tags();
        $data['fields']     = $all['fields'];
        $data['labels']     = $all['labels'];
        $data['primary_key']= $all['primary_key'];
        $data['table']      = $table;

        $source = $this->ci->parser->parse('template/view.php', $data, TRUE);

        write_file($this->output . $table . '/views/view.php', $source);
        
        
    }

    



    // Run to generate crud code
    public function run($table = null,$post_field )
    {
        if($table)
        {
            if(!is_dir($this->output . $table))
            {
                @mkdir($this->output . $table,DIR_WRITE_MODE,TRUE);
                @mkdir($this->output . $table .'/controllers',DIR_WRITE_MODE,TRUE);
                @mkdir($this->output . $table .'/models',DIR_WRITE_MODE,TRUE);
                @mkdir($this->output . $table .'/views',DIR_WRITE_MODE,TRUE);
            }
            
            $this->build_controller($table);
            $this->build_model($table);
            $this->build_form($table, $post_field);
            $this->build_view($table);
            $msg = "Successfully to generate code of table $table";
        }
        else
        {
            $msg =  "Table $table not defined";
        }
        
        return $msg;
    }
    
   
    
   
    
    
    
    
    
    
    
    

}
