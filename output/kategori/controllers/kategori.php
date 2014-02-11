<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller kategori
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class kategori extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('kategoris');
    }
    

    /**
    * List all data kategori
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('kategori/index/'),
            'total_rows'        => $this->kategoris->count_all(),
            'per_page'          => $this->settings->per_page(),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = $this->uri->segment(3);
        $data['kategoris']       = $this->kategoris->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('kategori/list',$data);
	      
    }

    

    /**
    * Call Form to Add  New kategori
    *
    */
    public function add() 
    {       
        $data['kategori'] = $this->kategoris->add();
        $data['action']       = 'kategori/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_kategori").parsley("validate");
                        });','embed');
      
        $this->template->render('kategori/form',$data);

    }

    

    /**
    * Call Form to Modify kategori
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['kategori'] = $this->kategoris->get_one($id);
            $data['action']       = 'kategori/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_kategori").parsley("validate");
                                    });','embed');
            
            $this->template->render('kategori/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','info'));
            redirect(site_url('kategori'));
        }
    }


    
    /**
    * Save & Update data  kategori
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'nama_kategori',
                        'label' => 'Nama Kategori',
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
                          $this->kategoris->save();
                          $this->session->set_flashdata('notif', alert('Data berhasil di simpan','success'));
                          redirect('kategori');
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
                        $this->kategoris->update($id);
                        $this->session->set_flashdata('notif', alert('Data berhasil di update','success'));
                        redirect('kategori');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search kategori like ""
    *
    */   
    public function search($keyword='',$offset=0)
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
        }
        
         $config = array(
            'base_url'          => site_url('kategori/search/' . $keyword),
            'total_rows'        => $this->kategoris->count_all_search($keyword),
            'per_page'          => $this->settings->per_page(),
            'uri_segment'       => 4,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = $this->uri->segment(4);
        $data['pagination']     = $this->pagination->create_links();
        $data['kategoris']       = $this->kategoris->get_search($config['per_page'], $this->uri->segment(4),$keyword);
       
        $this->template->render('kategori/list',$data);
    }
    
    
    /**
    * Delete kategori by ID
    *
    */
    public function delete($id) 
    {        
        if ($id) 
        {
            $this->kategoris->delete($id);           
             $this->session->set_flashdata('notif', alert('Data berhasil di hapus','success'));
             redirect('kategori');
        } 
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','warning'));
            redirect('kategori');
        }       
    }

}

?>
