<?php ob_start();
include('include/header.php');
include('include/connection.php');
 ?>
 <style>
 select[name="choice"], select[name="choice1"]
 {
    width: 100%;
    padding: 10px;
    font-weight: normal;
    background: none;
    border: 1px solid #E6E4E4;
    color: #333;
    outline: none;
    font-size: 14px;
    margin-top: 20px;
    font-family: 'Nunito', sans-serif;
 }
 </style>
<!-- Modal -->

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
		  <div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login">
						<div class="login-right">
                        <?php 
                        if($_POST['submit'])
                        {if(!$_SESSION['stu_id']){
                            $choice=$_POST['choice'];
                            $choice1=$_POST['choice1'];
                            $email_login=$_POST['email'];
                            $pass_login=md5($_POST['pass']);
                            if($choice1=='parents')
                            {
                                $query_login=mysql_Query("select * from parents where $choice='$email_login' and ori_pass='".$_POST['pass']."'");
                                if(mysql_num_rows($query_login)>0)
                                {
                                    $n=mysql_result($query_login,0,'adno');
                                    $query_login=("select * from register where adno='$n'");
                                }
                            }
                            else
                            {
                                $query_login=("select * from register where $choice='$email_login' and password='$pass_login'");    
                            }
                            //echo $query_login;
                            $query_login=mysql_Query($query_login);
                            if(mysql_num_rows($query_login)>0)
                            {
                                $_SESSION['stu_id']=@mysql_result($query_login,0,'id');
                                $_SESSION['name']=@mysql_result($query_login,0,'name');
                                $_SESSION['reg']=@mysql_result($query_login,0,'regno');
                                $_SESSION['stu_course']=@mysql_result($query_login,0,'class');
                                $_SESSION['section']=@mysql_result($query_login,0,'section');
                                $_SESSION['choice_s']=$choice1;    
                                if($_SESSION['stu_id'])
                                {
                                $reg=$_SESSION['reg'];
                              //  ECHO "select * from fee where regno='$reg'";
                                $qu=mysql_query("select * from fee where regno='$reg'");
                                if(mysql_num_rows($qu)>=0)
                                {
                                    while($r=mysql_fetch_array($qu))
                                    {
                                        $_SESSION['te']= "your Fee is pending of month ".$r['month'];
                                    }
                                }
                                  }
                                echo '<script>
                                alert("Login Successfully");
                                window.location.href="assignment.php";
                                </script>';                                 
                                $url=$_SERVER['REQUEST_URI'];
                                //header("refresh:1;Location: index.php"); 
                            }
                            else
                            {
                                echo '<script>
                                alert("Username and Password Mismatch.");
                                </script>';
                            }   }
                            else{ $url=$_SERVER['REQUEST_URI'];
                                header("refresh:1;Location: $url"); }
                        }
                        ?> 
							<form method="post" action="" id="ref">
								<h3>Signin with your account </h3>
								<h4>If you do not have your Username passwod please contact the Admin.</h4>
                                <h5>Select Your choice For login First</h5>
                                <select name="choice1">
                                <option value="parents">Parent</option>
                                <option value="register">Student</option>
                                </select>
                                <select name="choice">
                                <option value="email">By Email</option>
                                <option value="adno">By Admission Number</option>
                                </select>
                                <input type="text" style="color: #333;" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User';}" required="">	
								<input type="password" name="pass" style="color: #333;" required="">
								<input type="submit" value="SIGNIN" name="submit"/>
							</form>
						</div>
						<div class="clearfix"></div>								
					</div>
					<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
				</div>
		  </div>

		</div>
	  </div>
	</div>

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<style>
#accordion h4 {
    display: block;
    cursor: pointer;
    position: relative;
    margin: 2px 0 0 0;
    padding: .9em .9em;
    min-height: 0;
    font-size: 1.1em;
    outline: none;
    background: #666;
    color: #fff;
    text-transform: capitalize;
}</style>
 <script src="js/jquery.ticker.js" type="text/javascript"></script>
 <script type="text/javascript">
$(document).ready(function(){
$("#myModal").addClass("in");
$('ul.newsticker').newsTicker({
    row_height: 150,
    max_rows: 2,
    speed: 400,
    direction: 'up',
    duration: 2500,
    autostart: 1,
    pauseOnHover: 1
});
});
$(".close").click(function()
{
    $("#myModal").css("display","none");
})
 </script>
</body>
</html>
<?php ob_flush(); ?>