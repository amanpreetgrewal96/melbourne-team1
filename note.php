<?php ob_start();
include('include/header1.php');
include('include/connection.php');
 ?>
    <div class="courses_box1">
	   <div class="container">
		<h3 class="tittle">Notifications</h3>
	   	  
		<div class="col-md-9 wow fadeInUp animated" data-wow-delay=".5s">
			<div class="course_list">
                <div class="table-header clearfix">
                	<div class="id_col">ID</div>
                    <div class="date_col">Date of Upload</div>    
                    <div class="duration_col">Notification</div>
    			</div>
                <ul class="table-list">
                <?php
                $query_select=mysqli_query($connection,"select * from rms_notification");
                if(mysqli_num_rows($query_select)>0)
                {
                    while($row1=mysqli_fetch_array($query_select))
                    {
                        
                    
                   ?>
                    <li class="clearfix">
    					<div class="id_col"><?php echo $row1['id']; ?></div>
                        <div class="date_col"><?php echo $row1['date']; ?></div>
        				<div class="duration_col"><?php echo $row1['note'] ; ?></div>
        				
						

    				</li>
                   <?php
                   } 
                }
                else
                {
                    echo '<li class="clearfix">No Data Available Now.</li>';
                }
                ?>
                   
    			</ul>
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