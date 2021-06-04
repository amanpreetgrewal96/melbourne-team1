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
                            $name=$_POST['name'];
                            $section=$_POST['section'];
                            if(!empty($name) && !empty($section))
                            {
                                $query_check=mysqli_query($connection,"select * from rms_class where name='$name' and section='$section'");
                                if(mysqli_num_rows($query_check)<=0)
                                {
                                    $query=mysqli_query($connection,"insert into rms_class(name,section) values('$name','$section')");
                                    if(mysqli_affected_rows($connection))
                                    {
                                        echo '<div class="alert alert-success">Class is added Successfully.</div>';
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger">Error Occured.</div>';
                                    }
                                }
                                else
                                {
                                    echo '<div class="alert alert-warning">Class Name and Section already Exist.</div>';
                                }
                            }
                            else
                            {
                                echo '<div class="alert alert-danger">All Fields Required.</div>';
                            }
                        }
                      ?>
                          <header class="panel-heading">
                          Class Details
                          </header>
                         <div class="panel-body">
                              <form class="form-horizontal" role="form" method="post">
                                  <div class="form-group">
                                      <label for="class" class="col-lg-2 col-sm-2 control-label">Class Name</label>
                                      <div class="col-lg-10">
                                          <input required="required" type="text" class="form-control" name="name" id="course" placeholder="Class Name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="Duration" class="col-lg-2 col-sm-2 control-label">Class Section</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" class="form-control" name="section" id="Duration" placeholder="Class Section">
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