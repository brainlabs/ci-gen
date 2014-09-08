<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of radar
 * @created on : Monday, 08-Sep-2014 16:55:14
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2014    
 */
 
 
class radars extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data radar
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('radar', $limit, $offset);

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
     *  Count All radar
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('radar');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All radar
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
                
        $this->db->like('jenis_kapal_id', $keyword);  
                
        $this->db->like('nama_kapal', $keyword);  
                
        $this->db->like('imo', $keyword);  
                
        $this->db->like('mmsi', $keyword);  
                
        $this->db->like('panjang', $keyword);  
                
        $this->db->like('lebar', $keyword);  
                
        $this->db->like('situasi', $keyword);  
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('antara_kp', $keyword);  
                
        $this->db->like('sampai_kp', $keyword);  
                
        $this->db->like('jenis_objek', $keyword);  
                
        $this->db->like('kode', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('radar');

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
    * Search All radar
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('radar');        
                
        $this->db->like('jenis_kapal_id', $keyword);  
                
        $this->db->like('nama_kapal', $keyword);  
                
        $this->db->like('imo', $keyword);  
                
        $this->db->like('mmsi', $keyword);  
                
        $this->db->like('panjang', $keyword);  
                
        $this->db->like('lebar', $keyword);  
                
        $this->db->like('situasi', $keyword);  
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('antara_kp', $keyword);  
                
        $this->db->like('sampai_kp', $keyword);  
                
        $this->db->like('jenis_objek', $keyword);  
                
        $this->db->like('kode', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One radar
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('radar_id', $id);
        $result = $this->db->get('radar');

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
    *  Default form data radar
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'jenis_kapal_id' => '',
            
                'nama_kapal' => '',
            
                'imo' => '',
            
                'mmsi' => '',
            
                'panjang' => '',
            
                'lebar' => '',
            
                'tanggal' => '',
            
                'jam' => '',
            
                'situasi' => '',
            
                'keterangan' => '',
            
                'antara_kp' => '',
            
                'sampai_kp' => '',
            
                'jenis_objek' => '',
            
                'user_id' => '',
            
                'respon' => '',
            
                'shift_id' => '',
            
                'sosialisasi' => '',
            
                'aktivitas_id' => '',
            
                'kode' => '',
            
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
        
            'jenis_kapal_id' => strip_tags($this->input->post('jenis_kapal_id', TRUE)),
        
            'nama_kapal' => strip_tags($this->input->post('nama_kapal', TRUE)),
        
            'imo' => strip_tags($this->input->post('imo', TRUE)),
        
            'mmsi' => strip_tags($this->input->post('mmsi', TRUE)),
        
            'panjang' => strip_tags($this->input->post('panjang', TRUE)),
        
            'lebar' => strip_tags($this->input->post('lebar', TRUE)),
        
            'tanggal' => strip_tags($this->input->post('tanggal', TRUE)),
        
            'jam' => strip_tags($this->input->post('jam', TRUE)),
        
            'situasi' => strip_tags($this->input->post('situasi', TRUE)),
        
            'keterangan' => strip_tags($this->input->post('keterangan', TRUE)),
        
            'antara_kp' => strip_tags($this->input->post('antara_kp', TRUE)),
        
            'sampai_kp' => strip_tags($this->input->post('sampai_kp', TRUE)),
        
            'jenis_objek' => strip_tags($this->input->post('jenis_objek', TRUE)),
        
            'user_id' => strip_tags($this->input->post('user_id', TRUE)),
        
            'respon' => strip_tags($this->input->post('respon', TRUE)),
        
            'shift_id' => strip_tags($this->input->post('shift_id', TRUE)),
        
            'sosialisasi' => strip_tags($this->input->post('sosialisasi', TRUE)),
        
            'aktivitas_id' => strip_tags($this->input->post('aktivitas_id', TRUE)),
        
            'kode' => strip_tags($this->input->post('kode', TRUE)),
        
        );
        
        
        $this->db->insert('radar', $data);
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
        
                'jenis_kapal_id' => strip_tags($this->input->post('jenis_kapal_id', TRUE)),
        
                'nama_kapal' => strip_tags($this->input->post('nama_kapal', TRUE)),
        
                'imo' => strip_tags($this->input->post('imo', TRUE)),
        
                'mmsi' => strip_tags($this->input->post('mmsi', TRUE)),
        
                'panjang' => strip_tags($this->input->post('panjang', TRUE)),
        
                'lebar' => strip_tags($this->input->post('lebar', TRUE)),
        
                'tanggal' => strip_tags($this->input->post('tanggal', TRUE)),
        
                'jam' => strip_tags($this->input->post('jam', TRUE)),
        
                'situasi' => strip_tags($this->input->post('situasi', TRUE)),
        
                'keterangan' => strip_tags($this->input->post('keterangan', TRUE)),
        
                'antara_kp' => strip_tags($this->input->post('antara_kp', TRUE)),
        
                'sampai_kp' => strip_tags($this->input->post('sampai_kp', TRUE)),
        
                'jenis_objek' => strip_tags($this->input->post('jenis_objek', TRUE)),
        
                'user_id' => strip_tags($this->input->post('user_id', TRUE)),
        
                'respon' => strip_tags($this->input->post('respon', TRUE)),
        
                'shift_id' => strip_tags($this->input->post('shift_id', TRUE)),
        
                'sosialisasi' => strip_tags($this->input->post('sosialisasi', TRUE)),
        
                'aktivitas_id' => strip_tags($this->input->post('aktivitas_id', TRUE)),
        
                'kode' => strip_tags($this->input->post('kode', TRUE)),
        
        );
        
        
        $this->db->where('radar_id', $id);
        $this->db->update('radar', $data);
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
        $this->db->where('radar_id', $id);
        $this->db->delete('radar');
        
    }







    



}
