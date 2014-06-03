<div class="col-md-3">
    
    <?php 
    echo form_open("#", 'class="form" id="generator"')
    
    ?>
    <div class="form-group">
        <label class="control-label">Pilih Tabel</label>
        <?php 
        
            echo form_dropdown(
                    'table',
                    $table,
                    set_value('table'),
                    'class="form-control input-sm" id="table"');
        ?>
    </div>
    
    <button class="btn btn-primary" type="submit" id="submit">Generate</button>
    
    <?php echo form_close(); ?>
</div>

<div class="col-md-9" id="proses">
  
</div>

