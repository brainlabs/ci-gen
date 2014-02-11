<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $operator
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class operators extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data operator
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('operator', $limit, $offset);

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
     *  Count All operator
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('operator');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All operator
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
                
        $this->db->like('nama', $keyword);  
                
        $this->db->like('username', $keyword);  
                
        $this->db->like('password', $keyword);  
                
        $this->db->like('no_telepon', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('operator');

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
    * Search All operator
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search($keyword)
    {
        $this->db->from('operator');        
                
        $this->db->like('nama', $keyword);  
                
        $this->db->like('username', $keyword);  
                
        $this->db->like('password', $keyword);  
                
        $this->db->like('no_telepon', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One operator
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('{primary_key_tabel}operator_id', $id);
        $result = $this->db->get('operator');

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
    *  Default form data operator
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'nama' => '',
            
                'username' => '',
            
                'password' => '',
            
                'jabaatan_id' => '',
            
                'no_telepon' => '',
            
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
        
            'nama' => $this->input->post('nama', TRUE),
        
            'username' => $this->input->post('username', TRUE),
        
            'password' => $this->input->post('password', TRUE),
        
            'jabaatan_id' => $this->input->post('jabaatan_id', TRUE),
        
            'no_telepon' => $this->input->post('no_telepon', TRUE),
        
        );
        
        
        $this->db->insert('operator', $data);
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
        
                'nama' => $this->input->post('nama', TRUE),
        
                'username' => $this->input->post('username', TRUE),
        
                'password' => $this->input->post('password', TRUE),
        
                'jabaatan_id' => $this->input->post('jabaatan_id', TRUE),
        
                'no_telepon' => $this->input->post('no_telepon', TRUE),
        
        );
        
        
        $this->db->where('operator_id', $id);
        $this->db->update('operator', $data);
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
        $this->db->where('operator_id', $id);
        $this->db->delete('operator');
        
    }

}
