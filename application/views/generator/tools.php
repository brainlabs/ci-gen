<div class="col-md-4">
	<h3>Membuat Menu</h3>
	<hr/>
	<?php if($menus) :?>
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
				<th>Controller</th>
				<th>Tampilkan 
					|  <?php 
						echo form_checkbox(array('name'=>'all','id'=>'menu'), '1');
					?> <small><i>Semua</i></small>
				</th>				
			</tr>
		</thead>
		<tbody>			
			<?php foreach ($menus as $key ) : ?>
                        <?php if($key['name'] !='dashboard' && $key['name'] !='builder') : ?>
			<tr>
				<td><?php echo $key['label']; ?></td>
				<td>
					<?php 
						echo form_checkbox(
							array(
								'name'=> 'fields['.$key['name'] .']',
								'class'=>'menu'
								),$key['label']);
					?>
				</td>
			</tr>
                        <?php endif; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>

	<div class="form-group">
		<?php 
			echo form_button(
							array(
							    'name'  	=> 'button',
							    'id' 		=> 'create-menu',
							    'value' 	=> 'true',
							    'type'  	=> 'button',
							    'content' 	=> 'Create Menu',
							    'class'	=> 'btn btn-sm btn-primary'
							    )
							);
		?>
	</div>
</div>

<div class="col-md-8" id="content-ajax">
    
</div>