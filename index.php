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

	<div class="modal fade" style="margin-top:35px;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
		  <div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login">
						<div class="login-right">
       <div class="login-right">
                        <?php 
                        if(isset($_POST['submit']))
                        {
                            $choice=$_POST['choice'];
                            $choice1=$_POST['choice1'];
                            $email_login=$_POST['email'];
                            $pass_login=$_POST['pass'];
                           
                            $query_login=("select * from rms_student_register where $choice='$email_login' and password='$pass_login'");    
                           $query_login=mysqli_query($connection,$query_login);
                            if(mysqli_num_rows($query_login)>0)
                            {
								$row2=mysqli_fetch_array($query_login);
                               $_SESSION['s_regno']=$row2['regno'];
							    $_SESSION['s_name']=$row2['name'];
                                echo '<script>
                                alert("Login Successfully");
                                window.location.href="student-panel.php";
                                </script>';                                 
                                
                               
                            }
                            else
                            {
                                echo '<script>
                                alert("Username and Password Mismatch.");
                                </script>';
                            }   
                           
                        }
                        ?> 
							<form method="post" action="index.php" id="ref">
								<h3>Signin with your account </h3>
								<h4>If you do not have your Username passwod please contact the Admin.</h4>
                                <h5>Select Your choice For login First</h5>
                                <select name="choice1">
                                <option value="Student">Student</option>
                                </select>
                                <select name="choice">
								 <option value="regno">By Enrollment ID</option>
                                <option value="email">By Email</option>
                               
                                </select>
                                <input type="text" style="color: #333;" name="email" placeholder="Enrollment ID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User';}" required="">	
								<input type="password" placeholder="password" name="pass" style="color: #333;" required="">
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