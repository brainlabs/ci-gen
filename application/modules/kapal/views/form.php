



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('kapal'),'role="form" class="form-horizontal" id="form_kapal"'); ?>
                
         
                       
               <div class="form-group">
                   <label for="nama_kapal" class="col-sm-2 control-label">Nama Kapal</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_kapal',
                                 'id'           => 'nama_kapal',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama Kapal',
                                 ),
                                 set_value('nama_kapal',$table['nama_kapal'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('nama_kapal');?></p>
                </div>
              </div> <!--/ Nama Kapal -->
                          
               <div class="form-group">
                   <label for="kategori_id" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'kategori_id',
                           $,  
                           set_value('kategori_id',''),
                           'class="input-sm  required"  id="kategori_id"'
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('kategori_id');?></p>
                </div>
              </div> <!--/ Kategori -->
                          
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
                                 ),
                                 set_value('mmsi',$table['mmsi'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('mmsi');?></p>
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
                                 ),
                                 set_value('panjang',$table['panjang'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('panjang');?></p>
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
                                 ),
                                 set_value('lebar',$table['lebar'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('lebar');?></p>
                </div>
              </div> <!--/ Lebar -->
                          
               <div class="form-group">
                   <label for="draught" class="col-sm-2 control-label">Draught</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'draught',
                                 'id'           => 'draught',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Draught',
                                 ),
                                 set_value('draught',$table['draught'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('draught');?></p>
                </div>
              </div> <!--/ Draught -->
                          
               <div class="form-group">
                   <label for="bobot" class="col-sm-2 control-label">Bobot</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'bobot',
                                 'id'           => 'bobot',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Bobot',
                                 ),
                                 set_value('bobot',$table['bobot'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('bobot');?></p>
                </div>
              </div> <!--/ Bobot -->
                          
               <div class="form-group">
                   <label for="tujuan" class="col-sm-2 control-label">Tujuan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tujuan',
                                 'id'           => 'tujuan',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Tujuan',
                                 ),
                                 set_value('tujuan',$table['tujuan'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('tujuan');?></p>
                </div>
              </div> <!--/ Tujuan -->
                          
               <div class="form-group">
                   <label for="waktu_masuk_lintasan" class="col-sm-2 control-label">Waktu Masuk Lintasan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'waktu_masuk_lintasan',
                                 'id'           => 'waktu_masuk_lintasan',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Waktu Masuk Lintasan',
                                 ),
                                 set_value('waktu_masuk_lintasan',$table['waktu_masuk_lintasan'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('waktu_masuk_lintasan');?></p>
                </div>
              </div> <!--/ Waktu Masuk Lintasan -->
                          
               <div class="form-group">
                   <label for="waktu_keluar_lintasan" class="col-sm-2 control-label">Waktu Keluar Lintasan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'waktu_keluar_lintasan',
                                 'id'           => 'waktu_keluar_lintasan',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Waktu Keluar Lintasan',
                                 ),
                                 set_value('waktu_keluar_lintasan',$table['waktu_keluar_lintasan'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('waktu_keluar_lintasan');?></p>
                </div>
              </div> <!--/ Waktu Keluar Lintasan -->
                          
               <div class="form-group">
                   <label for="waktu_sandar" class="col-sm-2 control-label">Waktu Sandar</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'waktu_sandar',
                                 'id'           => 'waktu_sandar',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Waktu Sandar',
                                 ),
                                 set_value('waktu_sandar',$table['waktu_sandar'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('waktu_sandar');?></p>
                </div>
              </div> <!--/ Waktu Sandar -->
                          
               <div class="form-group">
                   <label for="lokasi_sandar_zona" class="col-sm-2 control-label">Lokasi Sandar Zona</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'lokasi_sandar_zona',
                                 'id'           => 'lokasi_sandar_zona',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Lokasi Sandar Zona',
                                 ),
                                 set_value('lokasi_sandar_zona',$table['lokasi_sandar_zona'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('lokasi_sandar_zona');?></p>
                </div>
              </div> <!--/ Lokasi Sandar Zona -->
                          
               <div class="form-group">
                   <label for="lokasi_sandar_shipyard" class="col-sm-2 control-label">Lokasi Sandar Shipyard</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'lokasi_sandar_shipyard',
                                 'id'           => 'lokasi_sandar_shipyard',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Lokasi Sandar Shipyard',
                                 ),
                                 set_value('lokasi_sandar_shipyard',$table['lokasi_sandar_shipyard'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('lokasi_sandar_shipyard');?></p>
                </div>
              </div> <!--/ Lokasi Sandar Shipyard -->
                          
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
                                 ),
                                 set_value('keterangan',$table['keterangan'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('keterangan');?></p>
                </div>
              </div> <!--/ Keterangan -->
                          
               <div class="form-group">
                   <label for="sosialisasi" class="col-sm-2 control-label">Sosialisasi</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => sosialisasi,
                                 'id'    => sosialisasi,                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                  <p class="help-block "><?php echo form_error('sosialisasi');?></p>
                </div>
              </div> <!--/ Sosialisasi -->
                          
               <div class="form-group">
                   <label for="lintang_utara" class="col-sm-2 control-label">Lintang Utara</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'lintang_utara',
                                 'id'           => 'lintang_utara',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Lintang Utara',
                                 ),
                                 set_value('lintang_utara',$table['lintang_utara'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('lintang_utara');?></p>
                </div>
              </div> <!--/ Lintang Utara -->
                          
               <div class="form-group">
                   <label for="bujur_timur" class="col-sm-2 control-label">Bujur Timur</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'bujur_timur',
                                 'id'           => 'bujur_timur',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Bujur Timur',
                                 ),
                                 set_value('bujur_timur',$table['bujur_timur'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('bujur_timur');?></p>
                </div>
              </div> <!--/ Bujur Timur -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('kapal'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

