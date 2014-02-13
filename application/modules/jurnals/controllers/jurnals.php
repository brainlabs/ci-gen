<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller jurnals
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class jurnals extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('jurnalss');
    }
    

    /**
    * List all data jurnals
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('jurnals/index/'),
            'total_rows'        => $this->jurnalss->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = $this->uri->segment(3);
        $data['jurnalss']       = $this->jurnalss->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('jurnals/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New jurnals
    *
    */
    public function add() 
    {       
        $data['jurnals'] = $this->jurnalss->add();
        $data['action']  = 'jurnals/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_jurnals").parsley();
                        });','embed');
      
        $this->template->render('jurnals/form',$data);

    }

    

    /**
    * Call Form to Modify jurnals
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['jurnals'] = $this->jurnalss->get_one($id);
            $data['action']       = 'jurnals/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_jurnals").parsley();
                                    });','embed');
            
            $this->template->render('jurnals/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','info'));
            redirect(site_url('jurnals'));
        }
    }


    
    /**
    * Save & Update data  jurnals
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'operator_id',
                        'label' => 'Operator',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'tanggal',
                        'label' => 'Tanggal',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'jam',
                        'label' => 'Jam',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'uraian',
                        'label' => 'Uraian',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'shift',
                        'label' => 'Shift',
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
                          
                          $this->jurnalss->save();
                          $this->session->set_flashdata('notif', alert('Data berhasil di simpan','success'));
                          redirect('jurnals');
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
                        $this->jurnalss->update($id);
                        $this->session->set_flashdata('notif', alert('Data berhasil di update','success'));
                        redirect('jurnals');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search jurnals like ""
    *
    */   
    public function search($keyword='',$offset=0)
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
        }
        
         $config = array(
            'base_url'          => site_url('jurnals/search/' . $keyword),
            'total_rows'        => $this->jurnalss->count_all_search($keyword),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 4,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = $this->uri->segment(4);
        $data['pagination']     = $this->pagination->create_links();
        $data['jurnalss']       = $this->jurnalss->get_search($config['per_page'], $this->uri->segment(4),$keyword);
       
        $this->template->render('jurnals/view',$data);
    }
    
    
    /**
    * Delete jurnals by ID
    *
    */
    public function delete($id) 
    {        
        if ($id) 
        {
            $this->jurnalss->delete($id);           
             $this->session->set_flashdata('notif', alert('Data berhasil di hapus','success'));
             redirect('jurnals');
        } 
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','warning'));
            redirect('jurnals');
        }       
    }

}

?>
