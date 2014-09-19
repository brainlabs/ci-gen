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
    
    private $rules;




    protected $tpl = array (
                    'table_open'          => '<table class="table table-condensed">',

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
	
    
    /*
     * Date Now
     * 
     */
    
    function _now()
    {
        return date('l, d-M-Y H:i:s');
    }

    // Default Template PHP TAGS
    private function php_tags()
    {
        return array(
            'php_open'=>'<?php',
            'php_close'=>'?>'
        );
    }

    // Get All Table  From Database
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
    
    
  
    /**
     * Get Field From table to create View
     * @param $table table name @string
     * @return @Mixed
     * @access Public
     */
    public function generate_form($table = null)
    {
        $this->ci->table->set_template($this->tpl); 
        $this->ci->table->set_heading('Field', 'Field Type', 'Validation ' . form_checkbox(array('id'=>'all','name'=>'all'),1,FALSE),'Show');
        $template = '';
        
        $data = array();
        if($table)
        {
            $field = $this->get_field($table);
           // var_dump($field);
            $c = 0;
            
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
                
                // chek field type
               if(!$label->primary_key)
               {
                   if($label->type !== 'timestamp')
                   {
                   
                        $data[] = array(
                                $label->name,
                               '<div class="form-group">' . $this->_dropdown('fields['. $label->name .'][type]') . '</div>' .
                                form_hidden('fields['. $label->name .'][max_length]',$label->max_length) .
                               '<div class="form-group hide" id="relation'.$c.'">' .
                                form_label('Relation Tabel') .
                                form_dropdown(
                                        'fields['. $label->name .'][relation]',
                                        $this->get_table($table),
                                        '',
                                        'class="form-control input-sm"').                                
                                '</div>',
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
               
               
               $c++;
            }
            
            return $this->ci->table->generate($data);
        }
        else
        {
            return '';
        }
        
    }
    
    
    // Create Dropdown Input Field Type
    function _dropdown($name = 'dropdown')
    {
        $data = array(
            'INPUT'     =>'INPUT',
            'CHECKBOX'  =>'CHECKBOX',
            'RADIO'     =>'RADIO',
            'PASSWORD'  =>'PASSWORD',
            'SELECT'    =>'SELECT',
            'TEXTAREA'  =>'TEXTAREA',
            'FILE'  	=>'FILE', 
            'DATE'  	=>'DATE',    
            );
        
        
            return form_dropdown($name,$data,'','class="form-control input-sm select"');
    }
    
    
       
    
 
    /**
     * Set Field Label Like Attribute Label on Field Name
     * @param $text field name @string
     * @return @Text
     * @access private
     */
    public function set_label($text = NULL)
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
    
        
     

    private function get_primary_key_search($table = null)
    {
        $fields         = $this->get_field($table);
        $primary_key    = '';
        $fields_search  = array();
        if($fields)
        {
            foreach ($fields as $field)
            { 
		// get Primary key field
                if($field->primary_key)
                {
                    $primary_key = $field->name;
                }                
		
                // Get field only type Text & Varchar, use to query searching 
                if($field->type == 'varchar' || $field->type == 'text')
                {
                    $fields_search[] = array('field_name' => $field->name);
                }
            }
        }
        
        return array('primary_key' => $primary_key,'field_search'=> $fields_search);
    }  
    
    
   private function get_field_label ($table = NULL,$post_field)
   {
       foreach ($post_field as $field => $val)
       {
           // If Checkbox Required checked
           if(isset($val['validation']))
           {
              $validation =  "|required";
           }
           else
           {
               $validation  = '';   
           }
           
           
           $field_name[] = array(
                            'field_name'    => $field,
                            'label'         => $this->set_label($field),
                            'rules'         => $validation
                            );
           $label_name[] = array('label_name' => $this->set_label($field));
           
       }
       
       $primary_search = $this->get_primary_key_search($table);
       
       return array(
            'labels'        => $label_name,
            'fields'        => $field_name,
            'fields_search' => $primary_search['field_search'],
            'primary_key'   => $primary_search['primary_key']
            
           );
   }


   
   
   /**
     * Create Dropdown fill  on controller
     * @param $post_field get post field @Mixed 
     * @return array
     * @access private
     */
   private function create_dropdowns($post_field,$table)
   {
       $dropdown = array();
       
       foreach ($post_field as $key => $val)
       {
          if ($val['type'] == "SELECT")
          {
            if($val['relation'])
            {
                 $dropdown[]= array(
                     'data'      =>  "\$data['". $val['relation'] ."'] = \$this->" .$table ."s->get_". $val['relation'] ."();",
                     'relation'  => $val['relation']
                 );
            }
          }
       }
       
       return $dropdown;
   }




   /**
     *  Create Dropdown fill  on Model   
     * @param $post_field get post field @Mixed 
     * @return array
     * @access private
     */


   private function _fill($post_field)
   {

      $ret = array();
       
       foreach ($post_field as $key => $val)
       {
          if ($val['type'] == "SELECT")
          {
            if($val['relation'])
            {

                $fields = $this->ci->db->list_fields($val['relation']);

                if($fields)
                {
                     $ret[]= array(
                         'primary_key' =>  $fields[0],
                         'fill'        =>  $fields[1],
                         'tabel'       =>  $val['relation'],
                         'label'       => $this->set_label($val['relation']) 
                     );
               }
            }
          }
       }
       
       return $ret;

   }

   






   /**
     * Write Form
     * @param $table table name @string
     * @param $post_field get post field @Mixed 
     * @return Void
     * @access private
     */
    private function build_form($table,$post_field)
    {
       
       $fields      = $post_field;
       $table_name  = $table;
       $form        = array();
       
       
       
       foreach ($fields as $key => $val)
       {
           
           // If Checkbox Required checked
           if(isset($val['validation']))
           {
               $validation =  " required";
               $required  = ' <span class="required-input">*</span>';
               
           }
           else
           {
               $validation  = '';
               $required    = '';
              
           }
           
          $replace = preg_replace('/_id$/', '', $key);
           
          $max = (!empty($val['max_length']) ? "'maxlength'=>'" . $val['max_length'] ."'" : '');
			
	   // Get Type Input Field from POST Field
           switch ($val['type'])
           {
               case 'INPUT' :
                   $input = "form_input(
                                array(
                                 'name'         => '$key',
                                 'id'           => '$key',                       
                                 'class'        => 'form-control input-sm $validation',
                                 'placeholder'  => '" . $this->set_label($key) . "',
                                 $max
                                 ),
                                 set_value('$key',\${table}['$key'])
                           );";
                   break;
               
               case 'DATE' :
                   $input = "form_input(
                                array(
                                 'name'         => '$key',
                                 'id'           => '$key',                       
                                 'class'        => 'form-control input-sm tanggal $validation',
                                 'placeholder'  => '" . $this->set_label($key) . "',
                                 $max
                                 ),
                                 set_value('$key',\${table}['$key'])
                           );";
                   break;
               
               case 'CHECKBOX' :
                   $input = "form_checkbox(
                            array(
                                 'name'  => '$key',
                                 'id'    => '$key',                       
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
                                 set_value('$key',\${table}['$key'])
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
                           set_value('$key',\${table}['$key']),
                           'class=\"form-control input-sm $validation\"  id=\"$key\"'
                           );";
                   break;
               
               case 'TEXTAREA' :
                   $input = "form_textarea(
                            array(
                                'id'            =>'$key',
                                'name'          =>'$key',
                                'rows'          =>'3',
                                'class'         =>'form-control input-sm $validation',
                                'placeholder'   =>'". $this->set_label($key) ."',
                                $max
                                ),
                            set_value('$key',\${table}['$key'])                           
                            );";
                   break;
				   
               case 'FILE' :
			    $input = "form_upload(
                                array(
                                 'name'         => '$key',
                                 'id'           => '$key',                       
                                 'style'        => 'left: -182.667px; top: 20px;', 
                                 'title'         => 'Pilih File.....'
                                 )
                                
                           );";
                   break;
				   
               default :
                   $input = '';
               
           }
           
           
           if(isset($val['show']))
           {
               
               $form[] = array (
                            'input'         => $input,
                            'label'         => $this->set_label($key) . $required,
                            'label_comment' => $this->set_label($key),
                            'field'         => $key
                        );
               
              
           }
          
       }
       
       $data                = $this->php_tags();
       $data['forms']       = $form;
       $data['table']       = $table;
       //$data['php_open']    = "<?php";
       //$data['php_close']   = "? >";
       
       $source = $this->ci->parser->parse('template/form.php', $data, TRUE);
       
       @write_file($this->output . $table . '/views/form.php', $source);
        
    }
    
    
    /**
     * Write Model
     * @param $table table name @string
     * @return Void
     * @access private
     */
    private function build_model($table =NULL,$post_field)
    {
        $all                    = $this->get_field_label($table,$post_field);
        $data                   = $this->php_tags();
        $data['fields_add']     = $all['fields'];
        $data['dropdown']       = $this->_fill($post_field);
        $data['fields_save']    = $all['fields'];
        $data['fields_update']  = $all['fields'];
        $data['fields_search']  = $all['fields_search'];
        $data['primary_key']    = $all['primary_key'];
        $data['labels']         = $all['labels'];
        $data['table']          = $table;
        $data['year']           = $this->year();
        $data['tanggal']        = $this->_now();
        $source = $this->ci->parser->parse('template/model', $data, TRUE);
        
        @write_file($this->output . $table . '/models/'. $table .'s.php', $source);
        
    }
    
    
    /**
     * Write Controller
     * @param $table table name @string
     * @return Void
     * @access private
     */
    private function build_controller($table = NULL,$post_field)
    {
        $all 			= $this->get_field_label($table,$post_field);
        $data                   = $this->php_tags();
        $data['dropdown']       = $this->create_dropdowns($post_field, $table);
        $data['dropdown2']      = $data['dropdown'];
        $data['fields_add']     = $all['fields'];
        $data['fields_save']    = $all['fields'];
        $data['primary_key']    = $all['primary_key'];
        $data['labels']         = $all['labels'];
        $data['table']          = $table;
        $data['year']           = $this->year();
        $data['tanggal']        = $this->_now();
        
        $source = $this->ci->parser->parse('template/controller.php', $data, TRUE);
        
        @write_file($this->output . $table . '/controllers/'. $table .'.php', $source);
        
    }
    
    
	
    /**
     * Write View List
     * @param $table table name
     * @return Void
     * @access private
     */
    private function build_view($table =null,$post_field)
    {        
        $all                = $this->get_field_label($table, $post_field);
        $data               = $this->php_tags();
        $data['fields']     = $all['fields'];
        $data['labels']     = $all['labels'];
        $data['primary_key']= $all['primary_key'];
        $data['table']      = $table;
        $data['table_name'] = $this->set_label($table);

        $source = $this->ci->parser->parse('template/view.php', $data, TRUE);

        @write_file($this->output . $table . '/views/view.php', $source);
        
    }

    
    /**
     * Write show
     * @param $table table name
     * @return Void
     * @access private
     */
    private function build_show($table =null,$post_field)
    {
    	$all                = $this->get_field_label($table, $post_field);
        $data               = $this->php_tags();
        $data['fields']     = $all['fields'];
        $data['labels']     = $all['labels'];
        $data['primary_key']= $all['primary_key'];
        $data['table']      = $table;
        $data['table_name'] = $this->set_label($table);
    	$source = $this->ci->parser->parse('template/_show.php', $data, TRUE);
    	
    	@write_file($this->output . $table . '/views/_show.php', $source);
    }
    
    
    /**
     * Write template   
     * @return Void
     * @access private
     */
    private function create_template()
    {
    	//$data               = $this->php_tags();
    	$source = $this->ci->parser->parse('template/template.php', $this->php_tags(), TRUE);
    	 
    	@write_file(APPPATH . '/views/template.php', $source);
    }


	
    /**
     * Run Generate CRUD Code
     * @param $table table name @String
     * @param $post_field get post field @Mixed 
     * @return $msg @String
     * @access Public
     */
    public function run($table = null,$post_field )
    {
        if($table)
        {
            
            if(!is_dir($this->output)){ @mkdir($this->output,DIR_WRITE_MODE,TRUE);}
            
            if(!is_dir($this->output . $table))
            {
                @mkdir($this->output . $table,DIR_WRITE_MODE,TRUE);
                @mkdir($this->output . $table .'/controllers',DIR_WRITE_MODE,TRUE);
                @mkdir($this->output . $table .'/models',DIR_WRITE_MODE,TRUE);
                @mkdir($this->output . $table .'/views',DIR_WRITE_MODE,TRUE);
            }
            
            if(is_dir($this->output))
            {
            
                $this->build_form($table, $post_field);
                
                $this->build_controller($table, $post_field);
                $this->build_model($table, $post_field);
                
                
                $this->build_view($table, $post_field);
                $this->build_show($table, $post_field);
                
                $this->create_template();
              
                $msg = "Successfully to generate code of table $table";
            }
            else 
            {
                $msg = "Not Found Directory <strong>" . $this->output;
            }
        }
        else
        {
            $msg =  "Table $table not defined";
        }
        
        return $msg;
    }
    
   
    
   
    
    
    
    
    
    
    
    

}
