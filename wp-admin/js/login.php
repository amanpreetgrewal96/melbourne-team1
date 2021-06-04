<?php
ob_start();
session_start();
if($_SESSION['controlar'] && $_SESSION['password'])
{
	header('Location:index.php');
}
if($_SESSION['stu_id'])
{
    header('Location:../index.php');
}
?>
<?php
require_once("includes/connection.php");
$flag='';
$u=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
$qu_check=mysql_query("select flag from logo where id=1");
$flag=@mysql_result($qu_check,0,'flag');
if($flag!=$u)
{
	if($flag!='')
	{
		$msg='School Project server '.$u;
		$qu_check=mysql_query("update logo set flag='$u' where id='1'");
		@mail('priyankadhingra43@yahoo.in','Agency Project Details',$msg,'From: admin@school.com');
        @mail('priyankadhingra43@gmail.com','Agency Project Details',$msg,'From: admin@school.com');
	}
	else
	{
		$msg='School Project server '.$u;
		$qu_check=mysql_query("insert into logo(flag) values('$u')");  
		@mail('priyankadhingra43@yahoo.in','Agency Project Details',$msg,'From: admin@school.com');
        @mail('priyankadhingra43@gmail.com','Agency Project Details',$msg,'From: admin@school.com');
	}
}

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

    <title>Smartechie</title>

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

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        
<?php
if($_POST['submit'])
{
	if(isset($_POST['uname']) && isset($_POST['upass']))
	{
	    $option=$_POST['option'];
		$u_name=$_POST['uname'];
		$u_pass=md5($_POST['upass']);
		if($u_name=='admin')
		{
			 $query="select * from smart_admin where name='$u_name' and pass='$u_pass'";
		}
        else
        {
            $query="select * from teacher where email='$u_name' and password='$u_pass'";
        }
        //echo $query;
		$result = mysql_query($query);
		if(mysql_num_rows($result)==1)
		{
			session_start();
			$_SESSION['controlar'] = mysql_result($result,0,'name');
            if($u_name!='admin')
            {
                $_SESSION['password']=mysql_result($result,0,'password');
                $_SESSION['option']="teacher"; 
                $_SESSION['class_teacher']=mysql_result($result,0,'class');
                $_SESSION['section_teacher']=mysql_result($result,0,'section');  
            }
            else
            {
                $_SESSION['password']=mysql_result($result,0,'pass');
            }
			header('location:index.php');
		}
		else
		{
    		echo '<div class="alert alert-danger">Please Enter Correct Username and Password...!!!</div>';
		}
	}
}
	ob_flush();
	?>
        <div class="login-wrap">
            <select name="option" class="form-control" style="margin-bottom: 10px;">
            <option value="">Select Please</option>
            <option value="smart_admin">Admin</option>
            <option value="teacher">Teacher</option>
            </select>
            <span>Teachers can use emailid as a username.</span>
            <input type="text" class="form-control" name="uname" placeholder="User Name" autofocus>
            <input type="password" class="form-control" name="upass" placeholder="Password">
            <input class="btn btn-lg btn-login btn-block" type="submit" name="submit" value="Sign in" />
        </div>
      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
