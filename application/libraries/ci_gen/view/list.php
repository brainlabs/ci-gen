<div class="well">          
          <div class="navbar navbar-inverse navbar-collapse">
                <div class="navbar-header">
                        <a class="navbar-brand" href="{php_open} echo site_url('{nama_tabel}'); {php_close}">
                            {nama_tabel} <span class="label label-success">{php_open} echo $total; {php_close}</span>
                        </a> 
                </div>	
                               
                    <ul class="nav navbar-nav">
                      <li>
                        <a class="medium-box" href="{php_open}  echo site_url('{nama_tabel}/add'); {php_close} ">
                        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data {nama_tabel}</a>
                      </li>
                    </ul>                   
                  
                    <form class="navbar-form navbar-right" action="{php_open}  echo site_url('{nama_tabel}/search'); {php_close} " role="search" method="post">
                          <div class="form-group">
                             <input type="text" class="form-control" placeholder="Search" name="q">
                          </div>
                          <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> Cari</button>
                    </form>
                  
            </div>
          
         {php_open} echo $pagination; {php_close}
    
          {php_open} if (${nama_tabel}s) : {php_close}
          <table class="table table-hover table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>                
               {fields_tabel1}
                <th>{name_field_table}</th>
                {/fields_tabel1}
                <th class="red header" align="right" width="160">Aksi</th>
              </tr>
            </thead>
            <tbody>
                {php_open} $counter =1; {php_close} 
                {php_open} foreach (${nama_tabel}s as ${nama_tabel}) : {php_close}
                <tr>
                  <td>{php_open} echo $counter++; {php_close} </td>
                 {fields_tabel2}
                 <td>{php_open} echo ${nama_tabel}['{name_field_table}']; {php_close}</td>
                 {/fields_tabel2}
                  <td>                               
                      <div class="btn-group">
                        <a href="#" class="btn btn-small btn-default">
                            <i class="glyphicon glyphicon-eye-open"></i> Detail
                        </a>
                        <a href="#" data-toggle="dropdown" class="btn btn-small  btn-default dropdown-toggle"><span class="caret"></span></a>

                        <ul class="dropdown-menu">
                           <li>
                               {php_open}
                                  echo anchor(
                                          site_url('{nama_tabel}/edit/' . ${nama_tabel}['{nama_tabel}_id']),
                                            '<i class="glyphicon glyphicon-edit"></i> Edit'
                                          );
                               {php_close}

                           </li>
                           <li>

                               {php_open}
                                  echo anchor(
                                          site_url('{nama_tabel}/delete/' . ${nama_tabel}['{nama_tabel}_id']),
                                            '<i class="glyphicon glyphicon-trash"></i> Edit',
                                            'onclick="return confirm(\'Anda yakin..???\');"'
                                          );
                               {php_close}                             
                           </li>
                        </ul>
                      </div>  
                  </td>
                </tr>     
               {php_open} endforeach; {php_close}
            </tbody>
          </table>
          {php_open} endif; {php_close}
</div> <!-- /well -->