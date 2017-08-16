<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of siswa
 * @created on : Wednesday, 16-Aug-2017 14:06:09
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2017    
 */
 
 
class siswas extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data siswa
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('siswa', $limit, $offset);

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
     *  Count All siswa
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('siswa');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All siswa
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
                
        $this->db->like('nama_siswa', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('siswa');

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
    * Search All siswa
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('siswa');        
                
        $this->db->like('nama_siswa', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One siswa
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('siswa_id', $id);
        $result = $this->db->get('siswa');

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
    *  Default form data siswa
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'nama_siswa' => '',
            
                'kelamin' => '',
            
                'tanggal_lahir' => '',
            
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
        
            'nama_siswa' => strip_tags($this->input->post('nama_siswa', TRUE)),
        
            'kelamin' => strip_tags($this->input->post('kelamin', TRUE)),
        
            'tanggal_lahir' => strip_tags($this->input->post('tanggal_lahir', TRUE)),
        
        );
        
        
        $this->db->insert('siswa', $data);
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
        
                'nama_siswa' => strip_tags($this->input->post('nama_siswa', TRUE)),
        
                'kelamin' => strip_tags($this->input->post('kelamin', TRUE)),
        
                'tanggal_lahir' => strip_tags($this->input->post('tanggal_lahir', TRUE)),
        
        );
        
        
        $this->db->where('siswa_id', $id);
        $this->db->update('siswa', $data);
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
        $this->db->where('siswa_id', $id);
        $this->db->delete('siswa');
        
    }







    



}
