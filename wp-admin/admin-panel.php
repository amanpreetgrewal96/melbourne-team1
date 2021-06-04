<?php ob_start();
include('includes/header.php');
include('includes/connection.php');
 ?>

      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             
                          </header>
                          <div class="panel-body">
                                                
	
<div class="col-md-3">
          <div class="box2">
            <i class="icon-info alert-info"></i>
            <div class="info">
              <h3 class="red-ico">Overall</h3> <span></span>
              <p>Quick Info</p>
            </div>
          </div>
        </div>
	  <div class="col-md-3">
          <div class="box2">
            <i class="icon-user btn-success"></i>
            <div class="info">
              <h3 class="blue-ico">
			 <?php 
                          $query = "SELECT COUNT(*) FROM rms_student_register";
                          $result = mysqli_query($connection,$query);
						   while($row=mysqli_fetch_array($result))
{
                              echo "$row[0]";
                            }
                          ?>
			  </h3> <span></span>
              <p>Student(s)</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box2">
            <i class="icon-user btn-warning"></i>
            <div class="info">
              <h3 class="red-ico">
			   <?php 
                          $query = "SELECT COUNT(*) FROM rms_class";
                          $result = mysqli_query($connection,$query);
						   while($row=mysqli_fetch_array($result))
{
                              echo "$row[0]";
                            }
                          ?>
						  </h3> <span></span>
              <p>Class(s)</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box2">
            <i class="icon-pencil btn-danger"></i>
            <div class="info">
			
              <h3 class="blue-ico">
			     <?php 
                          $query = "SELECT COUNT(*) FROM rms_notification";
                          $result = mysqli_query($connection,$query);
						   while($row=mysqli_fetch_array($result))
{
                              echo "$row[0]";
                            }
                          ?>
			  
			  </h3> <span></span>
              <p>Notification(s)</p>
            </div>
          </div>
        </div>
      </div>
 
	    </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
<?php include('includes/footer.php');
?>