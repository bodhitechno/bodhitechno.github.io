<?php

session_start();

function redirect($link){
?>
<script type="text/javascript">
	
	window.location.href='<?php echo $link; ?>'
</script>
<?php
	die();
}

function getSafeVal($str){
	global $con;
	$str=strip_tags($str);
	return $str;
}
// ------------------------------------------------------------------------------

if(isset($_SESSION['admin']))
{
  redirect("admin.php");
}


$msg="";
if (isset($_POST['submit'])) {
	$username=getSafeVal( $_POST['username'] );
	$password=getSafeVal( $_POST['password'] );

	// $sql="select * from admin where name='$email' and password='$password' ";
	// $res=mysqli_query($con,$sql);

	// if(mysqli_num_rows($res)>0){

	// 	$row=mysqli_fetch_assoc($res);
	// 	$_SESSION['adminLogin']=$row['name'];
	// 	redirect(SITE_PATH.'admin/dashboard');

	// }
	// else{
	// 	$msg="Please enter valid login details";
	// }

	
	if($username=="alok22" and $password=="alok@Transport"){

		$_SESSION['admin']="alokTransport";
		redirect('admin.php');

	}
	else{
		$msg="Please enter valid login details";
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

 	<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 
    <style type="text/css">
    	@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');
    	*{
 		   font-family: 'Nunito', sans-serif;
	    }
    </style>
	
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome Admin</h1>
							<p class="lead fs-6">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post">
										<span class="text-danger"><?php echo $msg; ?></span>
										<div class="mb-3 ">
											<label class="form-label fs-6">Username</label>
											<input class="form-control form-control-sm" type="text" name="username" placeholder="Username" required autocomplete="off" />
										</div>
										<label class="form-label fs-6">Password</label>
										<div class="mb-3" style="position: relative;display: flex;align-items: center;">
											
											<input class="form-control form-control-sm" type="password" id="adminPassword" name="password" placeholder="Password" required autocomplete="off" />

        								   <i class="fas fa-eye " style="position: absolute;right: 25px; cursor: pointer;" onclick="toggleEye('adminPassword')"></i>  
											<!-- <small>
									            <a href="index.html">Forgot password?</a>
									        </small> -->
										</div>
										

										<div class="text-center mt-3">

											<input type="submit" class="btn  btn-success" value="Log In" name="submit" />
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="asset/bootstrap.min.js"></script>

	<script type="text/javascript">
		

		//show / hide password field
		function toggleEye(id){
		    const selector="#"+id;
		    const password = document.querySelector(selector);
		    // toggle the type attribute
		    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		    password.setAttribute('type', type);
		    // toggle the eye / eye slash icon
		    $(".fa-eye").toggleClass('fa-eye-slash');
		}


	</script>

</body>

</html>