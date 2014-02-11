<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $jurnals
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class jurnalss extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data jurnals
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('jurnals', $limit, $offset);

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
     *  Count All jurnals
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('jurnals');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All jurnals
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
                
        $this->db->like('uraian', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('jurnals');

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
    * Search All jurnals
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search($keyword)
    {
        $this->db->from('jurnals');        
                
        $this->db->like('uraian', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One jurnals
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('{primary_key_tabel}jurnal_id', $id);
        $result = $this->db->get('jurnals');

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
    *  Default form data jurnals
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'operator_id' => '',
            
                'tanggal' => '',
            
                'jam' => '',
            
                'uraian' => '',
            
                'shift' => '',
            
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save($id = NULL) 
    {
        $data = array(
        
            'operator_id' => $this->input->post('operator_id', TRUE),
        
            'tanggal' => $this->input->post('tanggal', TRUE),
        
            'jam' => $this->input->post('jam', TRUE),
        
            'uraian' => $this->input->post('uraian', TRUE),
        
            'shift' => $this->input->post('shift', TRUE),
        
        );
        
        
        $this->db->insert('jurnals', $data);
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
        
                'operator_id' => $this->input->post('operator_id', TRUE),
        
                'tanggal' => $this->input->post('tanggal', TRUE),
        
                'jam' => $this->input->post('jam', TRUE),
        
                'uraian' => $this->input->post('uraian', TRUE),
        
                'shift' => $this->input->post('shift', TRUE),
        
        );
        
        
        $this->db->where('jurnal_id', $id);
        $this->db->update('jurnals', $data);
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
        $this->db->where('jurnal_id', $id);
        $this->db->delete('jurnals');
        
    }

}
