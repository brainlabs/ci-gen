<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of post
 * @created on : Saturday, 27-Jun-2015 11:41:28
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class posts extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data post
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('post', $limit, $offset);

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
     *  Count All post
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('post');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All post
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
                
        $this->db->like('title', $keyword);  
                
        $this->db->like('body', $keyword);  
                
        $this->db->like('images', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('post');

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
    * Search All post
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('post');        
                
        $this->db->like('title', $keyword);  
                
        $this->db->like('body', $keyword);  
                
        $this->db->like('images', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One post
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('post_id', $id);
        $result = $this->db->get('post');

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
    *  Default form data post
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'category_id' => '',
            
                'title' => '',
            
                'body' => '',
            
                'images' => '',
            
                'user_id' => '',
            
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
        
            'category_id' => strip_tags($this->input->post('category_id', TRUE)),
        
            'title' => strip_tags($this->input->post('title', TRUE)),
        
            'body' => strip_tags($this->input->post('body', TRUE)),
        
            'images' => strip_tags($this->input->post('images', TRUE)),
        
            'user_id' => strip_tags($this->input->post('user_id', TRUE)),
        
        );
        
        
        $this->db->insert('post', $data);
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
        
                'category_id' => strip_tags($this->input->post('category_id', TRUE)),
        
                'title' => strip_tags($this->input->post('title', TRUE)),
        
                'body' => strip_tags($this->input->post('body', TRUE)),
        
                'images' => strip_tags($this->input->post('images', TRUE)),
        
                'user_id' => strip_tags($this->input->post('user_id', TRUE)),
        
        );
        
        
        $this->db->where('post_id', $id);
        $this->db->update('post', $data);
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
        $this->db->where('post_id', $id);
        $this->db->delete('post');
        
    }







    
    
    // get category
    public function get_category() 
    {
      
        $result = $this->db->get('category')
                           ->result();

        $ret ['']= 'Pilih Category :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->category_id] = $row->cat_name;
            }
        }
        
        return $ret;
    }


    



}
