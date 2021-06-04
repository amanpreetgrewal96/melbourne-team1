<?php ob_start();
include('include/header1.php');
include('include/connection.php');
 ?>
<div class="contact">
	<div class="container" style="background: #fbfafa;
    padding: 15px;">
		<h3 class="tittle">Profile Update</h3>
		<div class="contact-grids">
			<div class="col-md-3 contact-grid wow fadeInUp animated" data-wow-delay=".5s">
				<div id="accordion">
				<h4 class="ui-accordion-header ui-state-default ui-corner-all ui-accordion-icons">Notifications</h4>
				    <div class="faculty-list">
						<ul class="newsticker latest-news" style="height: 300px; overflow: hidden;">
                        <?php
                        $query=mysqli_query($connection,"select * from rms_notification order by id desc");
                        if(mysqli_num_rows($query)>0)
                        {
                            while($row=mysqli_fetch_array($query))
                            {
                                //print_r($row);
                                ?>
                                <li><a href="">
                           <?php echo $row['note']; ?></a><span class="date"><?php echo $row['date']; ?></span></li>
                                <?php
                                        
                            }
                        }
                        else
                        {
                        ?>
							<li><a href="">
                            No Notification Avialable Now.</a><span class="date"><?php echo date('Y-m-d'); ?></span></li>
                            <?php } ?>
						</ul>
				    </div>
				
				
				</div>
			
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-9 contact-grid wow fadeInUp animated" data-wow-delay=".5s">
           <?php
                              if(isset($_POST['submit']))
                              {
                                   $old_pass=$_POST['old_pass'];
                                   $pass=$_POST['pass'];
                                   $repass=$_POST['repass'];
                                   if(!empty($old_pass) && !empty($pass) && !empty($repass))
                                   {
                                        $query=mysqli_query($connection,"select * from rms_student_register where regno='".$_SESSION['s_regno']."'");
                                        if(mysqli_num_rows($query)>0)
                                        {
                                            $row=mysqli_fetch_row($query);
											echo $row['13'];
                                            if($old_pass==$row['13'])
                                            {
                                                if($pass==$repass)
                                                {
                                                    $query1=mysqli_query($connection,"update rms_student_register set password='$pass' where regno='".$_SESSION['s_regno']."'");
                                                    if(mysqli_affected_rows($connection)>0)
                                                    {
                                                        echo '<script>
                                                        alert("Password Update Successfully.");
                                                        window.location.href="index.php";
                                                        </script>';
                                                       
                                                    }
                                                    else
                                                    {
                                                        echo '<div class="alert alert-danger">Error Occured.</div>';
                                                    }
                                                }
                                                else
                                                {
                                                    echo '<div class="alert alert-danger">Password and ReType password mis-match.</div>';
                                                }
                                            }
                                            else
                                            {
                                                echo'<div class="alert alert-danger">Old Password is in-correct.</div>';
                                            }
                                        }
                                   }
                                   else
                                   {
                                    echo '<div class="alert alert-danger">All Field reqiured.</div>';
                                   } 
                              }
                              
                               ?>
				<form method="post" >
					<input type="password" required="" name="old_pass" placeholder="Old Password"/>
					<input type="password" required="" name="pass" placeholder="New Password" />
					<input type="password" required="" name="repass" placeholder="ReType Password" />
					<input type="submit" value="Submit" name="submit" >
				</form>
			</div>
			
			<div class="clearfix"> </div>
		
		</div>
	</div>
</div>

    <?php 
include('include/footer.php');

 ?>