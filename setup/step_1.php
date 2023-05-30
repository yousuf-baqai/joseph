

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to AHS CMS | Step 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>
<body>
<?php
	$array = explode('/', $_SERVER['REQUEST_URI']);
	$project_folder_name = $array[1].'/';
	
	$db_sql = file_get_contents('db.sql');
		
	$database_connection_error = '';
	
	if(!empty($_POST)){

		
		error_reporting(0);
		$servername = $_POST['database_hostname'];
		$username = $_POST['database_username'];
		$password = $_POST['database_password'];
		$dbname = $_POST['database_name'];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			$database_connection_error ="Connection failed: " . $conn->connect_error;
		}else{
			$query = $conn->multi_query($db_sql);

			$constants_file_content = file_get_contents('../application/config/constants.php');
			$constants_file_content = str_replace('PROJECT_DIR_HERE/', $_POST['project_folder_name'], $constants_file_content);
			$constants_file_content = str_replace("'STEPS', 0", "'STEPS', 1", $constants_file_content);
		    $file = fopen('../application/config/constants.php','w');           
		    fwrite($file, $constants_file_content);
		    fclose($file);		

			$database_file_content = file_get_contents('../application/config/database.php');

			$database_file_content = str_replace("'hostname' => '',//LocalHost", "'hostname' => '".$_POST['database_hostname']."',", $database_file_content);
			$database_file_content = str_replace("'username' => '',//LocalHost", "'username' => '".$_POST['database_username']."',", $database_file_content);
			$database_file_content = str_replace("'password' => '',//LocalHost", "'password' => '".$_POST['database_password']."',", $database_file_content);
			$database_file_content = str_replace("'database' => '',//LocalHost", "'database' => '".$_POST['database_name']."',", $database_file_content);


		    $file = fopen('../application/config/database.php','w');           
		    fwrite($file, $database_file_content);
		    fclose($file);

		    $redirect_url = $_SERVER['HTTP_HOST'].'/'.$project_folder_name .'admin/login';
		    header('Location: http://'.$redirect_url);		

		}

	}

	

?>

<div class="container">
  <div class="row"><div class="col-sm-6 col-sm-offset-3">

  <div class="jumbotron">
    <h2>Welcome to AHS CMS</h2>
    <p>Please provide the following details in order to complete the steps</p>
      <h3 class="text-danger"><b><?php echo $database_connection_error;?></b></h3>
  </div>
  <form action="step_1.php" method="POST">
    <div class="form-group">
      <label for="database_hostname">Database Host Name:</label>
      <input type="text" class="form-control" id="database_hostname" placeholder="Enter Database Host Name" name="database_hostname" value="localhost" required>
    </div>
    <div class="form-group">
      <label for="database_username">Database User Name:</label>
      <input type="text" class="form-control" id="database_username" placeholder="Enter Database User Name" name="database_username" value="root" required>
    </div>
    <div class="form-group">
      <label for="database_password">Database Password:</label>
      <input type="text" class="form-control" id="database_password" placeholder="Enter Database User Password" name="database_password" value="">
    </div>    
    <div class="form-group">
      <label for="database_name">Database Name:</label>
      <input type="text" class="form-control" id="database_name" placeholder="Enter Database User Name" name="database_name" value="" required>
    </div>  
    <div class="form-group">
      <label for="project_folder_name">Project Folder Name:</label>
      <input type="text" class="form-control" id="project_folder_name" placeholder="Enter Project Folder Name" name="project_folder_name" value="<?php echo $project_folder_name;?>" required>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
  </div></div>
</div>

</body>
</html>
