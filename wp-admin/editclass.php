<?php ob_start();
 include('includes/header.php');    

    include('includes/connection.php');
  if($_GET['c'])
{
    $_SESSION['courseid']=$_GET['c'];
    header('Location:editclass.php');
}
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
                            $duration=$_POST['duration'];
                            if(!empty($name) && !empty($duration))
                            {
                                $query_check=mysqli_query($connection,"select * from rms_class where name='$name' && id!='".$_SESSION['courseid']."'");
                                if(mysqli_num_rows($query_check)<=0)
                                {
                                   $query=mysqli_query($connection,"update rms_class set name='$name',section='$duration' where id='".$_SESSION['courseid']."'");
                                    if(mysqli_affected_rows($connection))
                                    {
                                        echo '<div class="alert alert-success">Class is Updated Successfully.</div>';
                                   header('Refresh: 2;url=classup.php');
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger">Error Occured.</div>';
                                    }
                                }
                                else
                                {
                                    echo '<div class="alert alert-warning">Class Name already Exist.</div>';
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
                                  <?php
                                  if($_SESSION['courseid'])
                                  {
                                    $courseid=$_SESSION['courseid'];
                                    $query1=mysqli_query($connection,"select * from rms_class where id='$courseid'");
                                    if(mysqli_num_rows($query1)>0)
                                    {
                                        $row1=mysqli_fetch_array($query1);
                                        $name1=$row1['name'];
                                        $duration1=$row1['section'];
                                    }
                                  }
                                  
                                   ?>
                                  <div class="form-group">
                                      <label for="course" class="col-lg-2 col-sm-2 control-label">Class Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" class="form-control" name="name" id="course" value="<?php echo $name1; ?>" placeholder="Course Name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="Duration" class="col-lg-2 col-sm-2 control-label">Class Section</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" class="form-control" name="duration" id="Duration" value="<?php echo $duration1; ?>" placeholder="Course Duration">
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