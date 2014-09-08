<?php

error_reporting(0); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.

$db_config_path = '../application/config/database.php';

// Only load the classes in case the user submitted the form
if($_POST) {

	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post($_POST) == true)
	{

		// First create the database, then create tables, then write config file
		if($database->create_database($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		} else if ($database->create_tables($_POST) == false) {
			$message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
		} else if ($core->write_config($_POST) == false) {
			$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
		}

		// If no errors, redirect to registration page
		if(!isset($message)) {
		  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://".$_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $redir = str_replace('install/','',$redir); 
			header( 'Location: ' . $redir . 'dashboard' ) ;
		}

	}
	else {
		$message = $core->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Install | Your App</title>

		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div class="container">
		<div class="row">
			<div class="col col-md-8 col-md-offset-2">
					<div class="page-header"><h1>Install</h1></div>
					<?php if(is_writable($db_config_path)){?>

		  <?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>

		  <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form">
        <fieldset>
          <legend>Database settings</legend>
          <div class="form-group">
          	<label for="hostname">Hostname</label>
          	<input type="text" id="hostname" value="localhost" class="form-control inpu-sm" name="hostname" />
          </div>
          <div class="form-group">
          	<label for="username">Username</label>
          	<input type="text" id="username" class="form-control inpu-sm" name="username" />
          	</div>
          
          <div class="form-group">	
          <label for="password">Password</label>
          <input type="password" id="password" class="form-control inpu-sm" name="password" />
          </div>
          <div class="form-group">
          <label for="database">Database Name</label>
          <input type="text" id="database" class="form-control inpu-sm" name="database" />
          </div>
          <input type="submit" value="Install" id="submit" class="btn btn-primary" />
        </fieldset>
		  </form>

	  <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
	  <?php } ?>
			</div>
		
		</div>
	</div>
   
    

	</body>
</html>
