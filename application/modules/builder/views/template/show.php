

<h2>{table_name}</h2>

{php_open} 
    echo $this->session->flashdata('notify');
{php_close}

<!-- <div class="row">
    <div class="col-lg-12 col-md-12">       
        {php_open} 
            echo create_breadcrumb();       
            echo $this->session->flashdata('notify');
        {php_close}
    </div>
</div> -->


{php_open} 
    if(${table}) :
{php_close} 

<div class="table-responsive">
    <table id="detail" class="table table-striped table-condensed">
        <tbody>
        {php_open}     
            foreach(${table} as $table => $value) :    
        {php_close}
        <tr>
            <td width="20%" align="right"><strong>{php_open} echo ucwords(str_replace("_"," ","$table")); {php_close}</strong></td>
            <td>{php_open} echo $value {php_close}</td>
        </tr>
         {php_open} 
            endforeach;
         {php_close}
         </tbody>
    </table>
</div>


	{php_open} 
	
		echo anchor(site_url('{table}'), '<span class="fa fa-chevron-left"></span> Kembali', 'class="btn btn-sm btn-default"');
	
	{php_close}


<br /><br />

{php_open} 
    endif;
{php_close}

