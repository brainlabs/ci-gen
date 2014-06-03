



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         {php_open} echo form_open(site_url('{table}/' . $action),'role="form" class="form-horizontal" id="form_{table}" parsley-validate'); {php_close}
                
         
            {forms}           
               <div class="form-group">
                   <label for="{field}" class="col-sm-2 control-label">{label}</label>
                <div class="col-sm-6">                                   
                  {php_open}                  
                   echo {input}             
                  {php_close}
                  <p class="help-block ">{php_open} echo form_error('{field}');{php_close}</p>
                </div>
              </div> <!--/ {label} -->
               {/forms}
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="{php_open} echo site_url('{table}'); {php_close}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         {php_open} echo form_close(); {php_close}    
      </div>       
</div><!--/ Panel -->

