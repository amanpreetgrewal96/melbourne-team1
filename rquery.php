<?php ob_start();
include('include/header1.php');
include('include/connection.php');
 ?>
 <!--Starting of Content-->
<div class="contact">
	<div class="container"style="background: #fbfafa;
    padding: 15px;" >
	
		<h3 class="tittle">Query Response</h3>

			<div class="col-md-12 contact-grid wow fadeInUp animated" data-wow-delay=".5s">
			

		<div class="course_list">
                <div class="table-header clearfix">
			
                	<div class="id_col">Enrollment ID</div>
                	<div class="id_col">Student Name</div>
				
					<div class="id_col">Email</div>
					<div class="id_col">Query</div>
                  <div class="id_col">Response</div>
    			</div>
		<?php
		$query=mysqli_query($connection,"select  * from rms_query where enrollment_id='".$_SESSION['s_regno']."'");
		
				           if(mysqli_num_rows($query)>0)
							{
								while($myrow=mysqli_fetch_array($query))
								{
							
		
				?>
			
                <ul class="table-list">
                
                    <li class="clearfix">
    					<div class="id_col"><?php echo $myrow['enrollment_id']; ?></div>

        				<div ><?php echo $myrow['sname']; ?></div>
						
					
						<div class="id_col" ><?php echo $myrow['email']; ?></div>
						<div class="id_col" ><?php echo $myrow['query']; ?></div>

        				<div class="id_col"><?php echo $myrow['response'];  ?></div>
						</li>

    			
    			</ul>
               
	
		
		<?php
		
				
								}
					
							}
			
				
		?>
		</div>
		
			<div class="clearfix"> </div>
		
		</div>
	</div>
</div>

    <?php 
include('include/footer.php');

 ?>