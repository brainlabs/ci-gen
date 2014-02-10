

<div class="row">
    <div class="col-sm-6">
        
<div class="panel panel-default">
    <div class="panel-heading">Field <a href="{php_open} echo site_url('{nama_tabel}'); {php_close}" class="btn btn-link pull-right"></a></div>
      <div class="panel-body">
          
                  {fields_tabel1}
               <div class="form-group">
                <label for="{name_field_table}" control-label">{name_field_table}</label>
              
                 <!-- <input type="{name_field_table}" class="form-control" id="{name_field_table}" placeholder="{name_field_table}" data-validation="required">-->
                  
                  
                  {php_open}
                  
                   echo form_input(
                          array(
                              'name'=> '{name_field_table}',
                              'id' => '{name_field_table}',
                              'maxlength'=>'{max_length}',
                              'class' => 'form-control',
                              'placeholder' => '{name_field_table}',
                              'data-validation' => "required",
                              'data-validation-engine' => "validate[required]"
                          )
                          ,
                            set_value('{name_field_table}')
                          ); 
                  
                 
                 
                 
                  {php_close}
                  <p class="help-block ">{php_open} echo form_error('{name_field_table}');{php_close}</p>
                </div>
            
               {/fields_tabel1}
             
              
              <div class="form-group">
                
                  <button type="reset" class="btn btn-default">Reset</button> 
                  <button type="submit" class="btn btn-primary">Build</button>                  
                        
              </div>
      </div>
       
</div><!--/ Panel -->
    </div>
    </div>
</div>
{php_open} echo form_close() {php_close}