

<div class="page-header">
    <h3>{table}</h3>
</div>
{php_open} 
    if(${tables}s :
{php_close} 

<table id="detail" class="table table-condensed">
    
    {php_open}     
        foreach(${table}s as $table => $value) :    
    {php_close}
    <tr>
        <td>{php_open}$table{php_close}</td>
        <td>{php_open}$value{php_close}</td>
    </tr>
     {php_open} 
        endforeach;
     {php_close}
</table>

{php_open} 
    endif;
{php_close}