{php_open} if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of {table}
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright {year}    
 */
 
 
class {table}s extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data {table}
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('{table}', $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    

    /**
     *  Count All {table}
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('{table}');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All {table}
    *
    *  @param limit   : Integer
    *  @param offset  : Integer
    *  @param keyword : mixed
    *
    *  @return array
    *
    */
    public function get_search($limit, $offset) 
    {
        $keyword = $this->session->userdata('keyword');
        {fields_search}        
        $this->db->like('{field_name}', $keyword);  
        {/fields_search}
        $this->db->limit($limit, $offset);
        $result = $this->db->get('{table}');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    
    
    /**
    * Search All {table}
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('{table}');        
        {fields_search}        
        $this->db->like('{field_name}', $keyword);  
        {/fields_search}
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One {table}
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('{primary_key}', $id);
        $result = $this->db->get('{table}');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    /**
    *  Default form data {table}
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            {fields_add}
                '{field_name}' => '',
            {/fields_add}
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save() 
    {
        $data = array(
        {fields_save}
            '{field_name}' => strip_tags($this->input->post('{field_name}', TRUE)),
        {/fields_save}
        );
        
        
        $this->db->insert('{table}', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id)
    {
        $data = array(
        {fields_update}
                '{field_name}' => strip_tags($this->input->post('{field_name}', TRUE)),
        {/fields_update}
        );
        
        
        $this->db->where('{primary_key}', $id);
        $this->db->update('{table}', $data);
    }


    
    
    
    /**
    *  Delete data by id
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function destroy($id)
    {       
        $this->db->where('{primary_key}', $id);
        $this->db->delete('{table}');
        
    }







    {dropdown}
    
    // get {tabel}
    public function get_{tabel}() 
    {
      
        $result = $this->db->get('{tabel}')
                           ->result();

        $ret ['']= 'Pilih {label} :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->{primary_key}] = $row->{fill};
            }
        }
        
        return $ret;
    }


    {/dropdown}



}
