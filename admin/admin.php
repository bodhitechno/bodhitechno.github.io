<?php

session_start();

$msg="";
if(!isset($_SESSION['admin']))
{

?>
<script type="text/javascript">
	window.location.href='<?php echo 'login.php'; ?>'
</script>
<?php
	die();
}

if(isset($_POST['submit'])){

	$sms=$_POST['sms'];
	$type=$_FILES['csvfile']['type'];
	$filename=$_FILES['csvfile']['name'];
	$tmpname=$_FILES['csvfile']['tmp_name'];

	if($type!='text/csv'){
		$msg="Only CSV file is accepted!";
	}
	else{

		$array=array();
         $upload=move_uploaded_file($tmpname,"csvfiles/".$filename);

         if($upload){

         	 if ( ($open = fopen("csvfiles/".$filename, "r")) !== FALSE) 
			 {
			  
				    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
				    {        
				      array_push($array,$data); 
				    }
			  
			    	fclose($open);
			  }

			  print_r($array);

         }

		 


	}


}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/bootstrap.min.css">

 
    <style type="text/css">
    	@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');
    	*{
 		   font-family: 'Nunito', sans-serif;
	    }
    </style>
	
</head>

<body>

	<div class="container mt-5">
		

		<h2>Send SMS</h2>
		<hr/>
		<?php 
		if(strlen($msg)>0){
			?>
			<div class="alert alert-danger" role="alert">
				<?php echo $msg; ?>
	  		</div>

			<?php
		}
		?>

			<h5>Upload CSV file of Phone Numbers</h5>

		<form method="post" enctype="multipart/form-data">
		<!-- <div class="form-group mb-2 mt-2 w-50">
			<input type="text" class="form-control" name="phone" placeholder="Phone number">
		</div> -->

		<div class="form-group mb-2 mt-2 w-50">
			<input type="text" class="form-control" name="sms" placeholder="Message" required>
		</div>

		  <div class="form-group mb-2 mt-2">
		    <input type="file" name="csvfile" class="form-control-file" required>
		  </div>

		  <input type="submit" class="btn btn-primary btn-sm" value="Send SMS" name="submit" />

		</form>

	</div>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="asset/bootstrap.min.js"></script>

</body>

</html>