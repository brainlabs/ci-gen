<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of generator
 * @created on : 22 Jan 14, 0:57:11
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */


class Generate
{

    private $ci ;
    
    
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
        $this->ci->table->set_heading('Field', 'Field Type', 'Validation','Show');
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
                
               if(!$label->primary_key)
               {
                    if($label->type !== 'timestamp')
                   {
                   
                        $data[] = array(
                                $label->name,
                                $this->_dropdown('fields['. $label->name .'][type]'),
                                form_checkbox('fields['. $label->name .'][validation]', 1,FALSE) . ' Required',
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
            'INPUT'=>'INPUT',
            'CHECKBOX'=>'CHECKBOX',
            'RADIO'=>'RADIO',
            'PASSWORD'=> 'PASSWORD',
            'SELECT'=>'SELECT',
            'TEXTAREA'=>'TEXTAREA',            
            );
        
        
            return form_dropdown($name,$data,'text','class="form-control input-sm"');
    }
    
    
    function generate_model($nama_tabel,$fields)
    {
        $data['nama_tabel'] = $nama_tabel;
        //$data['']
    }
    
    
    
    // Buat label dari filed
    function set_label($text = NULL)
    {
        if($text)
        {
            $label = str_replace('_', ' ', $text);
            $label = ucwords($label);
        }
        else
        {
            $label = '';
        }
        
        return $label;
    }
    
    
    
    
    // Render
    
    function render()
    {
        $data['php_open'] = '<?php';
        $data['php_close'] = '?>';
        $data['nama_tabel'] = $tabel;
    }
    
    
  
    
    
    
    
    
    
    public function build_model($table =NULL)
    {
        if($table)
        {
            $field = $this->get_field($table);
        }
    }
    
    
    public function build_view()
    {
       $fields = $this->ci->input->post('fields');
       $table_name = $this->ci->input->post('table');
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
           
           $replace = preg_replace('/_id/', '', $key);
           
           $config =  array(
                            'name'  => $key,
                            'id'    => $key,                       
                            'class' => 'form-control input-sm $validation',
                            'placeholder' => $this->set_label($key),
                            ); 
           
           
           switch ($val['type'])
           {
               case 'INPUT' :
                   $input = "form_input(
                                array(
                                 'name'  => '$key',
                                 'id'    => '$key',                       
                                 'class' => 'form-control input-sm $validation',
                                 'placeholder' => '" . $this->set_label($key) . "',
                                 ),
                                 set_value('$key',\$table_name['$key'])
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
                                 'name'  => '$key',
                                 'id'    => '$key',                       
                                 'class' => 'form-control input-sm $validation',
                                 'placeholder' => ' ". $this->set_label($key) ."',
                                 ),
                                 set_value('$key',\$table_name['$key'])
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
                           'class=\"input-sm $validation\"'
                           );";
                   break;
               
               case 'TEXTAREA' :
                   $input = form_textarea($config,  set_value($key),'rows="3"');
                   break;
               
               default :
                   $input = '';
               
           }
           
           
           if(isset($val['show']))
           {
              // echo $this->generate->set_label($key) . '<br/>';
              // echo  $input;
               
               $form[] = array (
               'field' => $input,
               'label' => $this->set_label($key)
            );
               
              
           }
          
           
      
           
          // echo '<br/>';
       }
       
       
       $data['form'] = $form;
       
       $source = $this->ci->parser->parse('template/coba', $data, TRUE);
       
       write_file('./coba.php', $source);
        
    }
    
    
    private function create_form ($field = null)
    {
        $tpl = '';
        
        if($field)
        {
            
        }
        
        return $tpl;
    }
    
    
   
    
    
    
    
    
    
    
    

}
