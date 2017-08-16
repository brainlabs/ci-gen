<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller siswa
 * @created on : Wednesday, 16-Aug-2017 14:06:09
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2017
 *
 *
 */


class siswa extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('siswas');
    }
    

    /**
    * List all data siswa
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('siswa/index/'),
            'total_rows'        => $this->siswas->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['siswas']       = $this->siswas->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('siswa/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New siswa
    *
    */
    public function add() 
    {       
        $data['siswa'] = $this->siswas->add();
        $data['action']  = 'siswa/save';
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_siswa").parsley();
                        });','embed');
      
        $this->template->render('siswa/form',$data);

    }

    

    /**
    * Call Form to Modify siswa
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['siswa']      = $this->siswas->get_one($id);
            $data['action']       = 'siswa/save/' . $id;           
      
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_siswa").parsley();
                                    });','embed');
            
            $this->template->render('siswa/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('siswa'));
        }
    }


    
    /**
    * Save & Update data  siswa
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'nama_siswa',
                        'label' => 'Nama Siswa',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'kelamin',
                        'label' => 'Kelamin',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'tanggal_lahir',
                        'label' => 'Tanggal Lahir',
                        'rules' => 'trim|xss_clean|required'
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
                          
                          $this->siswas->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('siswa');
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
                        $this->siswas->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('siswa');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail siswa
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['siswa'] = $this->siswas->get_one($id);            
            $this->template->render('siswa/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('siswa'));
        }
    }
    
    
    /**
    * Search siswa like ""
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
            'base_url'          => site_url('siswa/search/'),
            'total_rows'        => $this->siswas->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['siswas']       = $this->siswas->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('siswa/view',$data);
    }
    
    
    /**
    * Delete siswa by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->siswas->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('siswa');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('siswa');
        }       
    }

}

?>
