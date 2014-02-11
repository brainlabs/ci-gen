



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('operator'),'role="form" class="form-horizontal" id="form_operator"'); ?>
                
         
                       
               <div class="form-group">
                   <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama',
                                 'id'           => 'nama',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama',
                                 ),
                                 set_value('nama',$operator['nama'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('nama');?></p>
                </div>
              </div> <!--/ Nama -->
                          
               <div class="form-group">
                   <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'username',
                                 'id'           => 'username',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Username',
                                 ),
                                 set_value('username',$operator['username'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('username');?></p>
                </div>
              </div> <!--/ Username -->
                          
               <div class="form-group">
                   <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'password',
                                 'id'           => 'password',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Password',
                                 ),
                                 set_value('password',$operator['password'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('password');?></p>
                </div>
              </div> <!--/ Password -->
                          
               <div class="form-group">
                   <label for="jabaatan_id" class="col-sm-2 control-label">Jabaatan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'jabaatan_id',
                           $jabaatan,  
                           set_value('jabaatan_id',$operator['jabaatan_id']),
                           'class="input-sm  required"  id="jabaatan_id"'
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('jabaatan_id');?></p>
                </div>
              </div> <!--/ Jabaatan -->
                          
               <div class="form-group">
                   <label for="no_telepon" class="col-sm-2 control-label">No Telepon</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'no_telepon',
                                 'id'           => 'no_telepon',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'No Telepon',
                                 ),
                                 set_value('no_telepon',$operator['no_telepon'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('no_telepon');?></p>
                </div>
              </div> <!--/ No Telepon -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('operator'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

