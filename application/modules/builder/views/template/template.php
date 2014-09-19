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
    <link href="{php_open} echo base_url(); {php_close}assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{php_open} echo base_url(); {php_close}assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{php_open} echo base_url(); {php_close}assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="{php_open} echo base_url(); {php_close}assets/parsley/parsley.css" rel="stylesheet" type="text/css">
	<link href="{php_open} echo base_url(); {php_close}assets/datepicker/datepicker3.min.css" rel="stylesheet" type="text/css">
	
    <script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/jquery/jquery-2.1.1.min.js"></script>
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
            <a class="navbar-brand" href="{php_open} echo site_url(); {php_close}">Brain Labs</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{php_open} echo site_url('dashboard'); {php_close}"><i class="fa fa-windows"></i> Dahsboard</a></li>
            <li><a href="{php_open} echo site_url('builder'); {php_close}"><i class="fa fa-code"></i> Builder</a></li>
            <!--  <li><a href="{php_open} echo site_url('builder/tools'); {php_close}"><i class="fa fa-wrench"></i> Tools</a></li> -->
			{php_open}
				$menus = menu(APPPATH . 'modules/');
			{php_close}
			
            {php_open}   if($menus) : {php_close}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-signal"></i> Content <b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                 {php_open} 
				 
				 
				 
                foreach ($menus as $key => $val)
                {   
					 if($val['name'] !='dashboard' && $val['name'] !='builder') : 
                {php_close}
                    <li><a href="{php_open}  echo site_url($val['name']);  {php_close}">{php_open} echo $val['label'];  {php_close}</a></li>
                
               {php_open}
               		endif;
                }
               
                {php_close}
                             
              </ul>
            </li>
            
            {php_open}  endif; {php_close}
            
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   
 
   
    <div class="container">
        <div class="row">
            
                {php_open} echo $content; {php_close}
            
        </div>
       
       
    </div><!--/ Content -->
   
     

  




<!--[if lt IE 9]>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}asset/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/js/holder.min.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/js/bootstrap.file-input.min.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/parsley/parsley.min.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/parsley/i18n/id.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/datepicker/locales/bootstrap-datepicker.id.js"></script>

<script type="text/javascript">
    var base_url = "{php_open} echo base_url(); {php_close}";    
</script>

<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/js/app.js"></script>



{php_open} echo $js; {php_close}


</body>
</html>
