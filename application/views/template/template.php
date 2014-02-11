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
    <link href="{php_open} echo base_url(); {php_close}assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="{php_open} echo base_url(); {php_close}assets/parsley/validation.css" rel="stylesheet" type="text/css">
    
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
            <li><a href="{php_open} echo site_url('operator'); {php_close}">Operator</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   
 
   
    <div class="container">
        <div class="row">
            
                {php_open} echo $content; {php_close}
            
        </div>
       
       
    </div><!--/ Content -->
   
     

  

<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/js/jquery-2.0.3.min.js"></script>


<!--[if lt IE 9]>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}asset/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/js/holder.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/parsley/messages.id.js"></script>
<script type="text/javascript" src="{php_open} echo base_url(); {php_close}assets/parsley/parsley.min.js"></script>
<script type="text/javascript">
    var base_url = "{php_open} echo base_url(); {php_close}";
    
</script>


{php_open} echo $js; {php_close}


</body>
</html>
