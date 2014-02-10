<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of generator
 * @created on : 22 Jan 14, 0:57:11
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
class crud extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
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


    public function get_table()
    {
        $list_table = $this->db->list_tables();
        
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
    
    
    function get_field($table = null)
    {
        if($table)
        {
            return $this->db->field_data($table);
        }
        else
        {
            return array();
        }
    }
    
    
    function generate_form($table = null)
    {
        $this->table->set_template($this->tpl); 
        $this->table->set_heading('Field', 'Field Type', 'Validation','Show');
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
                    $show = form_checkbox('fields['. $label->name .'][show]', 1,false);
                }
                else
                {
                    $show = form_checkbox('fields['. $label->name .'][show]', 1,true);
                }
                $data[] = array(
                        $label->name,
                        $this->_dropdown('fields['. $label->name .'][type]'),
                        form_checkbox('fields['. $label->name .'][validation]', 1,true) . ' Required',
                        $show,
                );
            }
            
            return $this->table->generate($data);
        }
        else
        {
            return '';
        }
        
        
        
        
       
    }
    
    
    
    function _dropdown($name = 'dropdown')
    {
        $data = array(
            'text'=>'Text',
            'textarea'=>'Textarea',
            'password'=>'Password',
            'email'=> 'Email',
            'select'=>'Select',
            'checkbox'=>'Checkbox',
            'radio'=>'Radio'
            );
        
        
            return form_dropdown($name,$data,'text','class="form-control input-sm"');
    }
    
    
    function generate_model($nama_tabel,$fields)
    {
        $data['nama_tabel'] = $nama_tabel;
        //$data['']
    }
    
    
    

}
