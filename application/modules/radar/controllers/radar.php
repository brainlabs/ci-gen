<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller radar
 * @created on : Monday, 08-Sep-2014 16:55:14
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class radar extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('radars');
    }
    

    /**
    * List all data radar
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('radar/index/'),
            'total_rows'        => $this->radars->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['radars']       = $this->radars->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('radar/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New radar
    *
    */
    public function add() 
    {       
        $data['radar'] = $this->radars->add();
        $data['action']  = 'radar/save';
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_radar").parsley();
                        });','embed');
      
        $this->template->render('radar/form',$data);

    }

    

    /**
    * Call Form to Modify radar
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['radar']      = $this->radars->get_one($id);
            $data['action']       = 'radar/save/' . $id;           
      
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_radar").parsley();
                                    });','embed');
            
            $this->template->render('radar/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('radar'));
        }
    }


    
    /**
    * Save & Update data  radar
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'jenis_kapal_id',
                        'label' => 'Jenis Kapal',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'nama_kapal',
                        'label' => 'Nama Kapal',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'imo',
                        'label' => 'Imo',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'mmsi',
                        'label' => 'Mmsi',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'panjang',
                        'label' => 'Panjang',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'lebar',
                        'label' => 'Lebar',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'tanggal',
                        'label' => 'Tanggal',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'jam',
                        'label' => 'Jam',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'situasi',
                        'label' => 'Situasi',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'keterangan',
                        'label' => 'Keterangan',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'antara_kp',
                        'label' => 'Antara Kp',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'sampai_kp',
                        'label' => 'Sampai Kp',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'jenis_objek',
                        'label' => 'Jenis Objek',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'user_id',
                        'label' => 'User',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'respon',
                        'label' => 'Respon',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'shift_id',
                        'label' => 'Shift',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'sosialisasi',
                        'label' => 'Sosialisasi',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'aktivitas_id',
                        'label' => 'Aktivitas',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'kode',
                        'label' => 'Kode',
                        'rules' => 'trim|xss_clean'
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
                          
                          $this->radars->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('radar');
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
                        $this->radars->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('radar');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail radar
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['radar'] = $this->radars->get_one($id);            
            $this->template->render('radar/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('radar'));
        }
    }
    
    
    /**
    * Search radar like ""
    *
    */   
    public function search()
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
            
            $this->session->set_userdata(
                        array('keyword' => $this->input->post('q',TRUE))
                    );
        }
        
         $config = array(
            'base_url'          => site_url('radar/search/'),
            'total_rows'        => $this->radars->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['radars']       = $this->radars->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('radar/view',$data);
    }
    
    
    /**
    * Delete radar by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->radars->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('radar');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('radar');
        }       
    }

}

?>
