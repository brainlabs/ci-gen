<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller operator
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class operator extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('operators');
    }
    

    /**
    * List all data operator
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('operator/index/'),
            'total_rows'        => $this->operators->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = $this->uri->segment(3);
        $data['operators']       = $this->operators->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('operator/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New operator
    *
    */
    public function add() 
    {       
        $data['operator'] = $this->operators->add();
        $data['action']  = 'operator/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_operator").parsley();
                        });','embed');
      
        $this->template->render('operator/form',$data);

    }

    

    /**
    * Call Form to Modify operator
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['operator'] = $this->operators->get_one($id);
            $data['action']       = 'operator/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_operator").parsley();
                                    });','embed');
            
            $this->template->render('operator/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','info'));
            redirect(site_url('operator'));
        }
    }


    
    /**
    * Save & Update data  operator
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'nama',
                        'label' => 'Nama',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'jabatan_id',
                        'label' => 'Jabatan',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'no_telepon',
                        'label' => 'No Telepon',
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
                          
                          $this->operators->save();
                          $this->session->set_flashdata('notif', alert('Data berhasil di simpan','success'));
                          redirect('operator');
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
                        $this->operators->update($id);
                        $this->session->set_flashdata('notif', alert('Data berhasil di update','success'));
                        redirect('operator');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search operator like "$keyword"
    *
    */   
    public function search($keyword='',$offset=0)
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
        }
        
         $config = array(
            'base_url'          => site_url('operator/search/' . $keyword),
            'total_rows'        => $this->operators->count_all_search($keyword),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 4,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = $this->uri->segment(4);
        $data['pagination']     = $this->pagination->create_links();
        $data['operators']       = $this->operators->get_search($config['per_page'], $this->uri->segment(4),$keyword);
       
        $this->template->render('operator/view',$data);
    }
    
    
    /**
    * Delete operator by ID
    *
    */
    public function delete($id) 
    {        
        if ($id) 
        {
            $this->operators->delete($id);           
             $this->session->set_flashdata('notif', alert('Data berhasil di hapus','success'));
             redirect('operator');
        } 
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','warning'));
            redirect('operator');
        }       
    }

}

?>
