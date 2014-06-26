<div class="row">
	<div class="col-lg-12 col-md-12">		
		{php_open} 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                {php_close}
	</div>
</div><!-- /.row -->

{php_open} echo form_open(site_url('{table}/' . $action),'role="form" class="form-horizontal" id="form_{table}" parsley-validate'); {php_close}               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
            {forms}           
               <div class="form-group">
                   <label for="{field}" class="col-sm-2 control-label">{label}</label>
                <div class="col-sm-6">                                   
                  {php_open}                  
                   echo {input}             
                  {php_close}
                 {php_open} echo form_error('{field}');{php_close}
                </div>
              </div> <!--/ {label_comment} -->
               {/forms}
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="{php_open} echo site_url('{table}'); {php_close}" class="btn btn-default">
                       <i class="glyphicon glyphicon-chevron-left"></i> Kembali
                   </a> 
                    <button type="submit" class="btn btn-primary" name="post">
                        <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
                    </button>                  
              </div>
          </div>
    </div><!--/ Panel Footer -->       
</div><!--/ Panel -->
{php_open} echo form_close(); {php_close}  