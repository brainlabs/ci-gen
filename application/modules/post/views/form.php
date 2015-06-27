<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('post/' . $action),'role="form" class="form-horizontal" id="form_post" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="category_id" class="col-sm-2 control-label">Category <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'category_id',
                           $category,  
                           set_value('category_id',$post['category_id']),
                           'class="form-control input-sm  required"  id="category_id"'
                           );             
                  ?>
                 <?php echo form_error('category_id');?>
                </div>
              </div> <!--/ Category -->
                          
               <div class="form-group">
                   <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'title',
                                 'id'           => 'title',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Title',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('title',$post['title'])
                           );             
                  ?>
                 <?php echo form_error('title');?>
                </div>
              </div> <!--/ Title -->
                          
               <div class="form-group">
                   <label for="body" class="col-sm-2 control-label">Body</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'body',
                                 'id'           => 'body',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Body',
                                 
                                 ),
                                 set_value('body',$post['body'])
                           );             
                  ?>
                 <?php echo form_error('body');?>
                </div>
              </div> <!--/ Body -->
                          
               <div class="form-group">
                   <label for="images" class="col-sm-2 control-label">Images</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'images',
                                 'id'           => 'images',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Images',
                                 'maxlength'=>'50'
                                 ),
                                 set_value('images',$post['images'])
                           );             
                  ?>
                 <?php echo form_error('images');?>
                </div>
              </div> <!--/ Images -->
                          
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
                                 set_value('user_id',$post['user_id'])
                           );             
                  ?>
                 <?php echo form_error('user_id');?>
                </div>
              </div> <!--/ User -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('post'); ?>" class="btn btn-default">
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