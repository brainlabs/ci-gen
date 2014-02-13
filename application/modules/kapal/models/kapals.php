<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $kapal
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class kapals extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data kapal
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('kapal', $limit, $offset);

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
     *  Count All kapal
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('kapal');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All kapal
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
                
        $this->db->like('nama_kapal', $keyword);  
                
        $this->db->like('mmsi', $keyword);  
                
        $this->db->like('panjang', $keyword);  
                
        $this->db->like('lebar', $keyword);  
                
        $this->db->like('draught', $keyword);  
                
        $this->db->like('bobot', $keyword);  
                
        $this->db->like('tujuan', $keyword);  
                
        $this->db->like('waktu_masuk_lintasan', $keyword);  
                
        $this->db->like('waktu_keluar_lintasan', $keyword);  
                
        $this->db->like('waktu_sandar', $keyword);  
                
        $this->db->like('lokasi_sandar_shipyard', $keyword);  
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('lintang_utara', $keyword);  
                
        $this->db->like('bujur_timur', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('kapal');

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
    * Search All kapal
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search($keyword)
    {
        $this->db->from('kapal');        
                
        $this->db->like('nama_kapal', $keyword);  
                
        $this->db->like('mmsi', $keyword);  
                
        $this->db->like('panjang', $keyword);  
                
        $this->db->like('lebar', $keyword);  
                
        $this->db->like('draught', $keyword);  
                
        $this->db->like('bobot', $keyword);  
                
        $this->db->like('tujuan', $keyword);  
                
        $this->db->like('waktu_masuk_lintasan', $keyword);  
                
        $this->db->like('waktu_keluar_lintasan', $keyword);  
                
        $this->db->like('waktu_sandar', $keyword);  
                
        $this->db->like('lokasi_sandar_shipyard', $keyword);  
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('lintang_utara', $keyword);  
                
        $this->db->like('bujur_timur', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One kapal
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('{primary_key_tabel}kapal_id', $id);
        $result = $this->db->get('kapal');

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
    *  Default form data kapal
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'nama_kapal' => '',
            
                'kategori_id' => '',
            
                'mmsi' => '',
            
                'panjang' => '',
            
                'lebar' => '',
            
                'draught' => '',
            
                'bobot' => '',
            
                'tujuan' => '',
            
                'waktu_masuk_lintasan' => '',
            
                'waktu_keluar_lintasan' => '',
            
                'waktu_sandar' => '',
            
                'lokasi_sandar_zona' => '',
            
                'lokasi_sandar_shipyard' => '',
            
                'keterangan' => '',
            
                'sosialisasi' => '',
            
                'lintang_utara' => '',
            
                'bujur_timur' => '',
            
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
        
            'nama_kapal' => $this->input->post('nama_kapal', TRUE),
        
            'kategori_id' => $this->input->post('kategori_id', TRUE),
        
            'mmsi' => $this->input->post('mmsi', TRUE),
        
            'panjang' => $this->input->post('panjang', TRUE),
        
            'lebar' => $this->input->post('lebar', TRUE),
        
            'draught' => $this->input->post('draught', TRUE),
        
            'bobot' => $this->input->post('bobot', TRUE),
        
            'tujuan' => $this->input->post('tujuan', TRUE),
        
            'waktu_masuk_lintasan' => $this->input->post('waktu_masuk_lintasan', TRUE),
        
            'waktu_keluar_lintasan' => $this->input->post('waktu_keluar_lintasan', TRUE),
        
            'waktu_sandar' => $this->input->post('waktu_sandar', TRUE),
        
            'lokasi_sandar_zona' => $this->input->post('lokasi_sandar_zona', TRUE),
        
            'lokasi_sandar_shipyard' => $this->input->post('lokasi_sandar_shipyard', TRUE),
        
            'keterangan' => $this->input->post('keterangan', TRUE),
        
            'sosialisasi' => $this->input->post('sosialisasi', TRUE),
        
            'lintang_utara' => $this->input->post('lintang_utara', TRUE),
        
            'bujur_timur' => $this->input->post('bujur_timur', TRUE),
        
        );
        
        
        $this->db->insert('kapal', $data);
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
        
                'nama_kapal' => $this->input->post('nama_kapal', TRUE),
        
                'kategori_id' => $this->input->post('kategori_id', TRUE),
        
                'mmsi' => $this->input->post('mmsi', TRUE),
        
                'panjang' => $this->input->post('panjang', TRUE),
        
                'lebar' => $this->input->post('lebar', TRUE),
        
                'draught' => $this->input->post('draught', TRUE),
        
                'bobot' => $this->input->post('bobot', TRUE),
        
                'tujuan' => $this->input->post('tujuan', TRUE),
        
                'waktu_masuk_lintasan' => $this->input->post('waktu_masuk_lintasan', TRUE),
        
                'waktu_keluar_lintasan' => $this->input->post('waktu_keluar_lintasan', TRUE),
        
                'waktu_sandar' => $this->input->post('waktu_sandar', TRUE),
        
                'lokasi_sandar_zona' => $this->input->post('lokasi_sandar_zona', TRUE),
        
                'lokasi_sandar_shipyard' => $this->input->post('lokasi_sandar_shipyard', TRUE),
        
                'keterangan' => $this->input->post('keterangan', TRUE),
        
                'sosialisasi' => $this->input->post('sosialisasi', TRUE),
        
                'lintang_utara' => $this->input->post('lintang_utara', TRUE),
        
                'bujur_timur' => $this->input->post('bujur_timur', TRUE),
        
        );
        
        
        $this->db->where('kapal_id', $id);
        $this->db->update('kapal', $data);
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
        $this->db->where('kapal_id', $id);
        $this->db->delete('kapal');
        
    }

}
