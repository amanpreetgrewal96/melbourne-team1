<?php ob_start();
include('include/header1.php');
include('include/connection.php');
 ?>
<div class="contact">
	<div class="container" style="background: #fbfafa;
    padding: 15px;">
	
		<h3 class="tittle" >Ask Query</h3>
		<div class="contact-grids">

			<div class="col-md-12 contact-grid wow fadeInUp animated" data-wow-delay=".5s">
            <?php
            if(isset($_POST['submit']))
            {
                $sid=$_SESSION['s_regno'];
			
				$name=$_POST['name'];
                $email=$_POST['email'];
                $msg=$_POST['msg'];
                
                if(!empty($name) && !empty($email) && !empty($msg))
                { 
			$query=mysqli_query($connection,"insert into rms_query(enrollment_id,sname,email,query) values('$sid','$name','$email','$msg')");
                                    if(mysqli_affected_rows($connection))
                                    {
                                        echo '<div class="alert alert-success">Query Submitted Successfully.</div>';
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger">Error Occured.</div>';
                                    }
                }
            } 
            ?>
				<form method="post" >
				<input type="text" value="<?php echo $_SESSION['s_regno'];?>" name="sid"  required="required" readonly/>
					<input type="text" value="<?php echo $_SESSION['s_name'];?>" name="name"  required="required" />
					
					<input type="email" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="required">
					<textarea type="text"  required="required" onfocus="this.value = '';" name="msg" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Type your Query</textarea>
					<input type="submit" value="Submit " name="submit" >
				</form>
			</div>
			
			<div class="clearfix"> </div>
		
		</div>
	</div>
</div>

    <?php 
include('include/footer.php');

 ?>