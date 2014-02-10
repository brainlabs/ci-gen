{php_open} if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Copyright {YEAR}
 * Controller {nama_tabel}
 * 
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * 
 *
 *
 */


class {nama_tabel} extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('{nama_tabel}s');
    }
    

    /**
    * List all data {nama_tabel}
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('{nama_tabel}/index/'),
            'total_rows'        => $this->{nama_tabel}s->count_all(),
            'per_page'          => $this->settings->per_page(),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = $this->uri->segment(3);
        $data['{nama_tabel}s']  = $this->{nama_tabel}s->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('{nama_tabel}/list',$data);
	      
    }

    

    /**
    * Call Form to Add  New {nama_tabel}
    *
    */
    public function add() 
    {       
        $data['{nama_tabel}'] = $this->{nama_tabel}s->add();
        $data['action']       = '{nama_tabel}/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_{nama_tabel}").validationEngine({
                                    updatePromptsPosition:true
                                });
                        });','embed');
      
        $this->template->render('{nama_tabel}/form',$data);

    }

    

    /**
    * Call Form to Modify {nama_tabel}
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['{nama_tabel}'] = $this->{nama_tabel}s->get_one($id);
            $data['action']       = '{nama_tabel}/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_{nama_tabel}").validationEngine({
                                        updatePromptsPosition:true
                                            });
                                    });','embed');
            
            $this->template->render('{nama_tabel}/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','info'));
            redirect(site_url('{nama_tabel}'));
        }
    }


    
    /**
    * Save & Update data  {nama_tabel}
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  {fields_tabel2}
                    array(
                        'field' => '{name_field_table}',
                        'label' => '{name_field_table}',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    {/fields_tabel2}           
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
                          $this->{nama_tabel}s->save();
                          $this->session->set_flashdata('notif', alert('Data berhasil di simpan','success'));
                          redirect('{nama_tabel}');
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
                        $this->{nama_tabel}s->update($id);
                        $this->session->set_flashdata('notif', alert('Data berhasil di update','success'));
                        redirect('{nama_tabel}');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search {nama_tabel} like ""
    *
    */   
    public function search($keyword='',$offset=0)
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
        }
        
         $config = array(
            'base_url'          => site_url('{nama_tabel}/search/' . $keyword),
            'total_rows'        => $this->{nama_tabel}s->count_all_search($keyword),
            'per_page'          => $this->settings->per_page(),
            'uri_segment'       => 4,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = $this->uri->segment(4);
        $data['pagination']     = $this->pagination->create_links();
        $data['{nama_tabel}s']  = $this->{nama_tabel}s->get_search($config['per_page'], $this->uri->segment(4),$keyword);
       
        $this->template->render('{nama_tabel}/list',$data);
    }
    
    
    /**
    * Delete {nama_tabel} by ID
    *
    */
    public function delete($id) 
    {        
        if ($id) 
        {
            $this->{nama_tabel}s->delete($id);
            {/primary_key_tabel}
             $this->session->set_flashdata('notif', alert('Data berhasil di hapus','success'));
             redirect('{nama_tabel}');
        } 
        else 
        {
            $this->session->set_flashdata('notif', alert('Data tidak ditemukan','warning'));
            redirect('{nama_tabel}');
        }       
    }

}

{php_close}
