{php-open} if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of ${table-name}
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class {table-name}s extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('{table-name}', $limit, $offset);

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
     *  Count All data
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('{table-name}');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All data
    *
    *  @param limit   : Integer
    *  @param offset  : Integer
    *  @param keyword : mixed
    *
    *  @return array
    *
    */
    public function get_search($limit, $offset,$keyword) 
    {
        {fields_search2}        
        $this->db->or_like('{name_field_table}', $keyword);  
        {/fields_search2}
        $this->db->limit($limit, $offset);
        $result = $this->db->get('{table-name}');

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
    * Search All data
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search($keyword)
    {
        $this->db->from('{table-name}');        
        {fields_search}        
        $this->db->or_like('{name_field_table}', $keyword);  
        {/fields_search}
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One data
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('{primary_key_tabel}{primary_key}', $id);
        $result = $this->db->get('{table-name}');

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
    *  Default New data form
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            {fields_add}
                '{name_field_table}' => '',
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
        {fields_tabel1}
            '{name_field_table}' => $this->input->post('{name_field_table}', TRUE),
        {/fields_tabel1}
        );

        $this->db->insert('{table-name}', $data);
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
        {fields_tabel2}
                '{name_field_table}' => $this->input->post('{name_field_table}', TRUE),
        {/fields_tabel2}
        );
        $this->db->where('{primary_key}', $id);
        $this->db->update('{table-name}', $data);
    }


    
    
    
    /**
    *  Delete data by id
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function delete($id)
    {       
        $this->db->where('{primary_key}{/primary_key_tabel}', $id);
        $this->db->delete('{table-name}');
        
    }

}
