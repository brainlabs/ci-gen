<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('siswa/' . $action),'role="form" class="form-horizontal" id="form_siswa" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="nama_siswa" class="col-sm-2 control-label">Nama Siswa <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_siswa',
                                 'id'           => 'nama_siswa',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama Siswa',
                                 'maxlength'=>'256'
                                 ),
                                 set_value('nama_siswa',$siswa['nama_siswa'])
                           );             
                  ?>
                 <?php echo form_error('nama_siswa');?>
                </div>
              </div> <!--/ Nama Siswa -->
                          
               <div class="form-group">
                   <label for="kelamin" class="col-sm-2 control-label">Kelamin <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'kelamin',
                                 'id'           => 'kelamin',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Kelamin',
                                 'maxlength'=>'1'
                                 ),
                                 set_value('kelamin',$siswa['kelamin'])
                           );             
                  ?>
                 <?php echo form_error('kelamin');?>
                </div>
              </div> <!--/ Kelamin -->
                          
               <div class="form-group">
                   <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tanggal_lahir',
                                 'id'           => 'tanggal_lahir',                       
                                 'class'        => 'form-control input-sm tanggal  required',
                                 'placeholder'  => 'Tanggal Lahir',
                                 
                                 ),
                                 set_value('tanggal_lahir',$siswa['tanggal_lahir'])
                           );             
                  ?>
                 <?php echo form_error('tanggal_lahir');?>
                </div>
              </div> <!--/ Tanggal Lahir -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('siswa'); ?>" class="btn btn-default">
                       <i class="glyphicon glyphicon-chevron-left"></i> Kembali
                   </a> 
                    <button type="submit" class="btn btn-primary" name="post">
                        <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
                    </button>                  
              </div>
          </div>
    </div><!--/ Panel Footer -->       
</div><!--/ Panel -->
<?php echo form_close(); ?>  