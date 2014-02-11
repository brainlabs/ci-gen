<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $kategori
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class kategoris extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data kategori
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('kategori', $limit, $offset);

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
     *  Count All kategori
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('kategori');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All kategori
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
                
        $this->db->like('nama_kategori', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('kategori');

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
    * Search All kategori
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search($keyword)
    {
        $this->db->from('kategori');        
                
        $this->db->like('nama_kategori', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One kategori
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('{primary_key_tabel}kategori_id', $id);
        $result = $this->db->get('kategori');

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
    *  Default form data kategori
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'nama_kategori' => '',
            
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
        
            'nama_kategori' => $this->input->post('nama_kategori', TRUE),
        
        );
        
        
        $this->db->insert('kategori', $data);
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
        
                'nama_kategori' => $this->input->post('nama_kategori', TRUE),
        
        );
        
        
        $this->db->where('kategori_id', $id);
        $this->db->update('kategori', $data);
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
        $this->db->where('kategori_id', $id);
        $this->db->delete('kategori');
        
    }

}
