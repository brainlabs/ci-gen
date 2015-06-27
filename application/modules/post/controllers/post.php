<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller post
 * @created on : Saturday, 27-Jun-2015 11:41:28
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class post extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('posts');
    }
    

    /**
    * List all data post
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('post/index/'),
            'total_rows'        => $this->posts->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['posts']       = $this->posts->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('post/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New post
    *
    */
    public function add() 
    {       
        $data['post'] = $this->posts->add();
        $data['action']  = 'post/save';
     
       $data['category'] = $this->posts->get_category();
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_post").parsley();
                        });','embed');
      
        $this->template->render('post/form',$data);

    }

    

    /**
    * Call Form to Modify post
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['post']      = $this->posts->get_one($id);
            $data['action']       = 'post/save/' . $id;           
      
           $data['category'] = $this->posts->get_category();
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_post").parsley();
                                    });','embed');
            
            $this->template->render('post/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('post'));
        }
    }


    
    /**
    * Save & Update data  post
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'category_id',
                        'label' => 'Category',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'body',
                        'label' => 'Body',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'images',
                        'label' => 'Images',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'user_id',
                        'label' => 'User',
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
                          
                          $this->posts->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('post');
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
                        $this->posts->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('post');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail post
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['post'] = $this->posts->get_one($id);            
            $this->template->render('post/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('post'));
        }
    }
    
    
    /**
    * Search post like ""
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
            'base_url'          => site_url('post/search/'),
            'total_rows'        => $this->posts->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['posts']       = $this->posts->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('post/view',$data);
    }
    
    
    /**
    * Delete post by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->posts->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('post');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('post');
        }       
    }

}

?>
