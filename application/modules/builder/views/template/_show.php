

<div class="page-header">
    <h3>{table_name}</h3>
</div>
{php_open} 
    if(${table}) :
{php_close} 

<table id="detail" class="table table-striped table-condensed">
    <tbody>
    {php_open}     
        foreach(${table} as $table => $value) :    
    {php_close}
    <tr>
        <td width="20%" align="right"><strong>{php_open} echo $table {php_close}</strong></td>
        <td>{php_open} echo $value {php_close}</td>
    </tr>
     {php_open} 
        endforeach;
     {php_close}
     </tbody>
</table>


	{php_open} 
	
		echo anchor(site_url('{table}'), '<span class="fa fa-chevron-left"></span> Kembali', 'class="btn btn-sm btn-default"');
	
	{php_close}


<br /><br />

{php_open} 
    endif;
{php_close}

