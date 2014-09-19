<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--/ No cache -->
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
   
    <title>Home</title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/parsley/parsley.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.min.css" rel="stylesheet" type="text/css">
	
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-2.1.1.min.js"></script>
</head>

<body>
  
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>">Brain Labs</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">              
              <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-windows"></i> Dashboard</a></li>  
            <li><a href="<?php echo site_url('builder'); ?>"><i class="fa fa-code"></i> Builder</a></li> 
            <!-- <li><a href="<?php echo site_url('builder/tools'); ?>"><i class="fa fa-wrench"></i> Tools</a></li> -->
            <?php
				$menus = menu(APPPATH . 'modules/');
			?>
                <?php   if($menus) : ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-signal"></i> Content <b class="caret"></b></a>
              
              <ul class="dropdown-menu">
            
                
            	<?php   
                
                foreach ($menus as $key => $val)
                {   
					 if($val['name'] !='dashboard' && $val['name'] !='builder') : 
                ?>
                    <li><a href="<?php  echo site_url($val['name']);  ?>"><?php echo $val['label'];  ?></a></li>
                
               <?php
               		endif;
                }
               
                ?>
                             
              </ul>
            </li>
            <?php  endif; ?>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><img src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>" id="loader" style="display:none;"/></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   
 
   
    <div class="container">
        <div class="row">
     
            	<?php echo $content; ?>
            	
        </div>
  </div><!--/ container -->
   
     

  




<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/holder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/i18n/id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/locales/bootstrap-datepicker.id.js"></script>


<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>


<?php echo $js; ?>


</body>
</html>
