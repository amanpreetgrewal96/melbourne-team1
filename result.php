<?php ob_start();
include('include/header1.php');
include('include/connection.php');
 ?>
    <div class="courses_box1">
	   <div class="container" style="background: #fbfafa;
    padding: 15px;">
		<h3 class="tittle">View Result</h3>
	   	  
			  
		<div class="col-md-9 wow fadeInUp animated" data-wow-delay=".5s">
			<div class="course_list">
                <div class="table-header clearfix">
         
                
                    <div class="id_col">Enrollment ID </div>  
<div class="date_col">Student Name </div> 	
	<div class="duration_col">Status </div>			
                    <div class="duration1_col">Action</div>
    			</div>
				<?php
		$query=mysqli_query($connection,"select  * from rms_result where enrollment_id='".$_SESSION['s_regno']."'");
		
				           if(mysqli_num_rows($query)>0)
							{
								while($myrow=mysqli_fetch_array($query))
								{
							
		
				?>
				<ul class="table-list">
                
                    <li class="clearfix">
             	<div class="id_col"><?php echo $_SESSION['s_regno']; ?></div>

        				<div class="date_col"><?php echo $_SESSION['s_name']; ?></div>
						
					 <?php if($myrow['status']==0 || $myrow['status']=="" )
									  {
										  ?>
										  <div class="duration_col" ><span class="btn btn-danger btn-xs">Result Not Declared</span></div>
										   <div class="duration1_col"  ><span class="btn btn-danger btn-xs">-</span></div> 
									  <?php 
									  }
									  else{
										  ?>
										  <div class="duration_col" class="btn btn-success btn-xs"><span class="btn btn-success btn-xs">Result Declared</span></div>
										<div class="duration1_col">  <a href="resultdisplay.php" target="_blank" class="btn btn-success btn-xs">View/download</a></div>
										  <?php
									  }
									  ?>
						</li>

    			
    			</ul>
               
	
		
		<?php
		
				
								}
					
							}
			
				
		?>
		</div>
		</div>
			<div class="col-md-3">
			<div class="courses_box1-left wow fadeInLeft animated" data-wow-delay=".5s">
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
	       </div>	     
		</div>	
		<div class="clearfix"> </div>
	   </div>
	</div>
    
    <?php 
include('include/footer.php');

 ?>