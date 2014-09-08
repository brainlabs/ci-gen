<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8 col-xs-3">                
                <?php
                                  echo anchor(
                                           site_url('radar/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4 col-xs-9">
                                           
                 <?php echo form_open(site_url('radar/search'), 'role="search" class="form"') ;?>       
                           <div class="input-group pull-right">                      
                                 <input type="text" class="form-control input-sm" placeholder="Cari data" name="q" autocomplete="off"> 
                                 <span class="input-group-btn">
                                      <button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i> Cari</button>
                                 </span>
                           </div>
                           
               </form> 
                <?php echo form_close(); ?>
            </div>
        </div>
    </header>
    
    
    <div class="panel-body">
         <?php if ($radars) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Jenis Kapal</th>   
                
                    <th>Nama Kapal</th>   
                
                    <th>Imo</th>   
                
                    <th>Mmsi</th>   
                
                    <th>Panjang</th>   
                
                    <th>Lebar</th>   
                
                    <th>Tanggal</th>   
                
                    <th>Jam</th>   
                
                    <th>Situasi</th>   
                
                    <th>Keterangan</th>   
                
                    <th>Antara Kp</th>   
                
                    <th>Sampai Kp</th>   
                
                    <th>Jenis Objek</th>   
                
                    <th>User</th>   
                
                    <th>Respon</th>   
                
                    <th>Shift</th>   
                
                    <th>Sosialisasi</th>   
                
                    <th>Aktivitas</th>   
                
                    <th>Kode</th>   
                
                <th class="red header" align="right" width="120">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
             
               <?php foreach ($radars as $radar) : ?>
              <tr>
              	<td><?php echo $number++;; ?> </td>
               
               <td><?php echo $radar['jenis_kapal_id']; ?></td>
               
               <td><?php echo $radar['nama_kapal']; ?></td>
               
               <td><?php echo $radar['imo']; ?></td>
               
               <td><?php echo $radar['mmsi']; ?></td>
               
               <td><?php echo $radar['panjang']; ?></td>
               
               <td><?php echo $radar['lebar']; ?></td>
               
               <td><?php echo $radar['tanggal']; ?></td>
               
               <td><?php echo $radar['jam']; ?></td>
               
               <td><?php echo $radar['situasi']; ?></td>
               
               <td><?php echo $radar['keterangan']; ?></td>
               
               <td><?php echo $radar['antara_kp']; ?></td>
               
               <td><?php echo $radar['sampai_kp']; ?></td>
               
               <td><?php echo $radar['jenis_objek']; ?></td>
               
               <td><?php echo $radar['user_id']; ?></td>
               
               <td><?php echo $radar['respon']; ?></td>
               
               <td><?php echo $radar['shift_id']; ?></td>
               
               <td><?php echo $radar['sosialisasi']; ?></td>
               
               <td><?php echo $radar['aktivitas_id']; ?></td>
               
               <td><?php echo $radar['kode']; ?></td>
               
                <td>    
                    
                    <?php
                                  echo anchor(
                                          site_url('radar/show/' . $radar['radar_id']),
                                            '<i class="glyphicon glyphicon-eye-open"></i>',
                                            'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"'
                                          );
                   ?>
                    
                    <?php
                                  echo anchor(
                                          site_url('radar/edit/' . $radar['radar_id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('radar/destroy/' . $radar['radar_id']),
                                            '<i class="glyphicon glyphicon-trash"></i>',
                                            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus"'
                                          );
                   ?>   
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data radar belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               Radar
               <span class="label label-info">
                    <?php echo $total; ?>
               </span>
           </div>  
           <div class="col-md-9">
                 <?php echo $pagination; ?>
           </div>
        </div>
    </div>
</section>