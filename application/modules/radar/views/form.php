<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('radar/' . $action),'role="form" class="form-horizontal" id="form_radar" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="jenis_kapal_id" class="col-sm-2 control-label">Jenis Kapal</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jenis_kapal_id',
                                 'id'           => 'jenis_kapal_id',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Jenis Kapal',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('jenis_kapal_id',$radar['jenis_kapal_id'])
                           );             
                  ?>
                 <?php echo form_error('jenis_kapal_id');?>
                </div>
              </div> <!--/ Jenis Kapal -->
                          
               <div class="form-group">
                   <label for="nama_kapal" class="col-sm-2 control-label">Nama Kapal</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_kapal',
                                 'id'           => 'nama_kapal',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Nama Kapal',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('nama_kapal',$radar['nama_kapal'])
                           );             
                  ?>
                 <?php echo form_error('nama_kapal');?>
                </div>
              </div> <!--/ Nama Kapal -->
                          
               <div class="form-group">
                   <label for="imo" class="col-sm-2 control-label">Imo</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'imo',
                                 'id'           => 'imo',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Imo',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('imo',$radar['imo'])
                           );             
                  ?>
                 <?php echo form_error('imo');?>
                </div>
              </div> <!--/ Imo -->
                          
               <div class="form-group">
                   <label for="mmsi" class="col-sm-2 control-label">Mmsi</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'mmsi',
                                 'id'           => 'mmsi',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Mmsi',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('mmsi',$radar['mmsi'])
                           );             
                  ?>
                 <?php echo form_error('mmsi');?>
                </div>
              </div> <!--/ Mmsi -->
                          
               <div class="form-group">
                   <label for="panjang" class="col-sm-2 control-label">Panjang</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'panjang',
                                 'id'           => 'panjang',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Panjang',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('panjang',$radar['panjang'])
                           );             
                  ?>
                 <?php echo form_error('panjang');?>
                </div>
              </div> <!--/ Panjang -->
                          
               <div class="form-group">
                   <label for="lebar" class="col-sm-2 control-label">Lebar</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'lebar',
                                 'id'           => 'lebar',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Lebar',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('lebar',$radar['lebar'])
                           );             
                  ?>
                 <?php echo form_error('lebar');?>
                </div>
              </div> <!--/ Lebar -->
                          
               <div class="form-group">
                   <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tanggal',
                                 'id'           => 'tanggal',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Tanggal',
                                 
                                 ),
                                 set_value('tanggal',$radar['tanggal'])
                           );             
                  ?>
                 <?php echo form_error('tanggal');?>
                </div>
              </div> <!--/ Tanggal -->
                          
               <div class="form-group">
                   <label for="jam" class="col-sm-2 control-label">Jam</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jam',
                                 'id'           => 'jam',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Jam',
                                 
                                 ),
                                 set_value('jam',$radar['jam'])
                           );             
                  ?>
                 <?php echo form_error('jam');?>
                </div>
              </div> <!--/ Jam -->
                          
               <div class="form-group">
                   <label for="situasi" class="col-sm-2 control-label">Situasi</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'situasi',
                                 'id'           => 'situasi',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Situasi',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('situasi',$radar['situasi'])
                           );             
                  ?>
                 <?php echo form_error('situasi');?>
                </div>
              </div> <!--/ Situasi -->
                          
               <div class="form-group">
                   <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'keterangan',
                                 'id'           => 'keterangan',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Keterangan',
                                 'maxlength'=>'500'
                                 ),
                                 set_value('keterangan',$radar['keterangan'])
                           );             
                  ?>
                 <?php echo form_error('keterangan');?>
                </div>
              </div> <!--/ Keterangan -->
                          
               <div class="form-group">
                   <label for="antara_kp" class="col-sm-2 control-label">Antara Kp</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'antara_kp',
                                 'id'           => 'antara_kp',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Antara Kp',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('antara_kp',$radar['antara_kp'])
                           );             
                  ?>
                 <?php echo form_error('antara_kp');?>
                </div>
              </div> <!--/ Antara Kp -->
                          
               <div class="form-group">
                   <label for="sampai_kp" class="col-sm-2 control-label">Sampai Kp</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'sampai_kp',
                                 'id'           => 'sampai_kp',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Sampai Kp',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('sampai_kp',$radar['sampai_kp'])
                           );             
                  ?>
                 <?php echo form_error('sampai_kp');?>
                </div>
              </div> <!--/ Sampai Kp -->
                          
               <div class="form-group">
                   <label for="jenis_objek" class="col-sm-2 control-label">Jenis Objek</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jenis_objek',
                                 'id'           => 'jenis_objek',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Jenis Objek',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('jenis_objek',$radar['jenis_objek'])
                           );             
                  ?>
                 <?php echo form_error('jenis_objek');?>
                </div>
              </div> <!--/ Jenis Objek -->
                          
               <div class="form-group">
                   <label for="user_id" class="col-sm-2 control-label">User</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'user_id',
                                 'id'           => 'user_id',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'User',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('user_id',$radar['user_id'])
                           );             
                  ?>
                 <?php echo form_error('user_id');?>
                </div>
              </div> <!--/ User -->
                          
               <div class="form-group">
                   <label for="respon" class="col-sm-2 control-label">Respon</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'respon',
                                 'id'           => 'respon',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Respon',
                                 'maxlength'=>'1'
                                 ),
                                 set_value('respon',$radar['respon'])
                           );             
                  ?>
                 <?php echo form_error('respon');?>
                </div>
              </div> <!--/ Respon -->
                          
               <div class="form-group">
                   <label for="shift_id" class="col-sm-2 control-label">Shift</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'shift_id',
                                 'id'           => 'shift_id',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Shift',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('shift_id',$radar['shift_id'])
                           );             
                  ?>
                 <?php echo form_error('shift_id');?>
                </div>
              </div> <!--/ Shift -->
                          
               <div class="form-group">
                   <label for="sosialisasi" class="col-sm-2 control-label">Sosialisasi</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'sosialisasi',
                                 'id'           => 'sosialisasi',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Sosialisasi',
                                 'maxlength'=>'1'
                                 ),
                                 set_value('sosialisasi',$radar['sosialisasi'])
                           );             
                  ?>
                 <?php echo form_error('sosialisasi');?>
                </div>
              </div> <!--/ Sosialisasi -->
                          
               <div class="form-group">
                   <label for="aktivitas_id" class="col-sm-2 control-label">Aktivitas</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'aktivitas_id',
                                 'id'           => 'aktivitas_id',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Aktivitas',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('aktivitas_id',$radar['aktivitas_id'])
                           );             
                  ?>
                 <?php echo form_error('aktivitas_id');?>
                </div>
              </div> <!--/ Aktivitas -->
                          
               <div class="form-group">
                   <label for="kode" class="col-sm-2 control-label">Kode</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'kode',
                                 'id'           => 'kode',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Kode',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('kode',$radar['kode'])
                           );             
                  ?>
                 <?php echo form_error('kode');?>
                </div>
              </div> <!--/ Kode -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('radar'); ?>" class="btn btn-default">
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