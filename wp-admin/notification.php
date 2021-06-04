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
					  <?php 
                      if(isset($_POST['submit']))
                      {
                           $date=date('Y-m-d');
                           for($i=1;$i<=5;$i++)
                           {
                                $n=trim($_POST['not'.$i]);
                                if(!empty($n))
                                {
									
                                 $query=mysqli_query($connection,"insert into rms_notification(note,date) values('$n','$date')");
                                }
                           }
                           if(mysqli_affected_rows($connection))
                           {
                                echo '<div class="alert alert-success">Notification is added Successfully.</div>';
                           }
                           else
                           {
                                echo '<div class="alert alert-danger">Error Occured.</div>';
                           }
                      }
                      ?>
                   
                       <header class="panel-heading">
                          Notification
                          </header>
                         <div class="panel-body">
                              <form class="form-horizontal" role="form" method="post">
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Notification 1</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="not1" class="form-control" />
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Notification 2</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="not2" class="form-control"/>
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Notification 3</label>
                                      <div class="col-lg-10">
                                          <input type="text"name="not3" class="form-control"/>
                                      </div>
                                  </div>   
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Notification 4</label>
                                      <div class="col-lg-10">
                                          <input type="text"name="not4" class="form-control"/>
                                      </div>
                                  </div>  
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Notification 5</label>
                                      <div class="col-lg-10">
                                          <input type="text"name="not5" class="form-control"/>
                                      </div>
                                  </div>                                                  
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <input type="submit" name="submit" class="btn btn-danger" value="Submit" />
                                      </div>
                                  </div>
                              </form>
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