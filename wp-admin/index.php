<?php ob_start();
include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="priya">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin - Result Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">
 
    <div class="container">

      <form class="form-signin" method="post" action="index.php">
        <h2 class="form-signin-heading">Admin Sign In</h2>
         <?php
if(isset($_POST['submit']))
{
	if(isset($_POST['uname']) && isset($_POST['upass']))
	{
		$u_name=$_POST['uname'];
		$u_pass=md5($_POST['upass']);
		
			 $query="select * from rms_admin where username='$u_name' and pass='$u_pass'";
		$result = mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0)
		{
			while($row_login=mysqli_fetch_array($result))
                                    {
			session_start();
			$_SESSION['username'] =$row_login['username'];
			$_SESSION['password']=$row_login['pass'];
			header('location:admin-panel.php');
		}
		}
			else
				{
    				echo '<div class="alert alert-danger">Please Enter Correct Username and Password...!</div>';
				}
	}
}
	?>

        <div class="login-wrap">
            
           
            <input type="text" class="form-control" name="uname" required placeholder="User Name" autofocus>
            <input type="password" class="form-control" name="upass" required placeholder="Password">
            <input class="btn btn-lg btn-login btn-block" type="submit" name="submit" value="Sign in" />
        </div>
      </form>

    </div>



    


  </body>
</html>

<!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php ob_flush(); ?>