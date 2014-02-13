



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('kategori'),'role="form" class="form-horizontal" id="form_kategori" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="nama_kategori" class="col-sm-2 control-label">Nama Kategori</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_kategori',
                                 'id'           => 'nama_kategori',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama Kategori',
                                 ),
                                 set_value('nama_kategori',$kategori['nama_kategori'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('nama_kategori');?></p>
                </div>
              </div> <!--/ Nama Kategori -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('kategori'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

