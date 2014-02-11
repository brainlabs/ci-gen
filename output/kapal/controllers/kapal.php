<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller kapal
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class kapal extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('kapals');
    }
    

    /**
    * List all data kapal
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('kapal/index/'),
            'total_rows'        => $this->kapals->count_all(),
            'per_page'          => $this->settings->per_page(),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = $this->uri->segment(3);
        $data['kapals']       = $this->kapals->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('kapal/list',$data);
	      
    }

    

    /**
    * Call Form to Add  New kapal
    *
    */
    public function add() 
    {       
        $data['kapal'] = $this->kapals->add();
        $data['action']       = 'kapal/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_kapal").parsley("validate");
                        });','embed');
      
        $this->template->render('kapal/form',$data);

    }

    

    /**
    * Call Form to Modify kapal
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['kapal'] = $this->kapals->get_one($id);
            $data['action']       = 'kapal/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_kapal").parsley("validate");
                                    });','embed');
            
            $this->template->render('kapal/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','info'));
            redirect(site_url('kapal'));
        }
    }


    
    /**
    * Save & Update data  kapal
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'nama_kapal',
                        'label' => 'Nama Kapal',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'kategori_id',
                        'label' => 'Kategori',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'mmsi',
                        'label' => 'Mmsi',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'panjang',
                        'label' => 'Panjang',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'lebar',
                        'label' => 'Lebar',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'draught',
                        'label' => 'Draught',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'bobot',
                        'label' => 'Bobot',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'tujuan',
                        'label' => 'Tujuan',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'waktu_masuk_lintasan',
                        'label' => 'Waktu Masuk Lintasan',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'waktu_keluar_lintasan',
                        'label' => 'Waktu Keluar Lintasan',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'waktu_sandar',
                        'label' => 'Waktu Sandar',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'lokasi_sandar_zona',
                        'label' => 'Lokasi Sandar Zona',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'lokasi_sandar_shipyard',
                        'label' => 'Lokasi Sandar Shipyard',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'keterangan',
                        'label' => 'Keterangan',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'sosialisasi',
                        'label' => 'Sosialisasi',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'lintang_utara',
                        'label' => 'Lintang Utara',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'bujur_timur',
                        'label' => 'Bujur Timur',
                        'rules' => 'trim|required|xss_clean'
                        ),
                               
                  );
            
        // if id NULL then add new data
        if(!$id)
        {    
                  $this->form_validation->set_rules($config);

                  if ($this->form_validation->run() == TRUE) 
                  {
                      if ($this->input->post()) 
                      {
                          {primary_key_tabel}
                          $this->kapals->save();
                          $this->session->set_flashdata('notif', alert('Data berhasil di simpan','success'));
                          redirect('kapal');
                      }
                  } 
                  else // If validation incorrect 
                  {
                      $this->add();
                  }
         }
         else // Update data if Form Edit send Post and ID available
         {               
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == TRUE) 
                {
                    if ($this->input->post()) 
                    {
                        $this->kapals->update($id);
                        $this->session->set_flashdata('notif', alert('Data berhasil di update','success'));
                        redirect('kapal');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search kapal like ""
    *
    */   
    public function search($keyword='',$offset=0)
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
        }
        
         $config = array(
            'base_url'          => site_url('kapal/search/' . $keyword),
            'total_rows'        => $this->kapals->count_all_search($keyword),
            'per_page'          => $this->settings->per_page(),
            'uri_segment'       => 4,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = $this->uri->segment(4);
        $data['pagination']     = $this->pagination->create_links();
        $data['kapals']       = $this->kapals->get_search($config['per_page'], $this->uri->segment(4),$keyword);
       
        $this->template->render('kapal/list',$data);
    }
    
    
    /**
    * Delete kapal by ID
    *
    */
    public function delete($id) 
    {        
        if ($id) 
        {
            $this->kapals->delete($id);           
             $this->session->set_flashdata('notif', alert('Data berhasil di hapus','success'));
             redirect('kapal');
        } 
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','warning'));
            redirect('kapal');
        }       
    }

}

?>
