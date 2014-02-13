



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('jurnals'),'role="form" class="form-horizontal" id="form_jurnals" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="operator_id" class="col-sm-2 control-label">Operator</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'operator_id',
                           $operator,  
                           set_value('operator_id',$jurnals['operator_id']),
                           'class="input-sm "  id="operator_id"'
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('operator_id');?></p>
                </div>
              </div> <!--/ Operator -->
                          
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
                                 set_value('tanggal',$jurnals['tanggal'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('tanggal');?></p>
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
                                 set_value('jam',$jurnals['jam'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('jam');?></p>
                </div>
              </div> <!--/ Jam -->
                          
               <div class="form-group">
                   <label for="uraian" class="col-sm-2 control-label">Uraian</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'uraian',
                                 'id'           => 'uraian',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Uraian',
                                 ),
                                 set_value('uraian',$jurnals['uraian'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('uraian');?></p>
                </div>
              </div> <!--/ Uraian -->
                          
               <div class="form-group">
                   <label for="shift" class="col-sm-2 control-label">Shift</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'shift',
                                 'id'           => 'shift',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Shift',
                                 ),
                                 set_value('shift',$jurnals['shift'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('shift');?></p>
                </div>
              </div> <!--/ Shift -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('jurnals'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

