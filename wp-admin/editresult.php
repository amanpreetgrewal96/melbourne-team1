<?php ob_start();
include('includes/header.php');

include('includes/connection.php');
if($_GET['i'])
{
    $_SESSION['i']=$_GET['i'];
    header('Location:editresult.php');
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
                           $name=trim($_POST['name']);
                           $email=trim($_POST['email']);
                           $id=$_SESSION['i'];
                           if(!empty($name) && !empty($email))
                           {
                                    if($name)
                                    {
                                        $query_insert=mysqli_query($connection,"update rms_result set subjects='$name',marks='$email' where id='$id'");
                                        if(mysqli_affected_rows($connection)>0)
                                        {
                                            echo '<script>
                                            alert("Record Updated Successfully.");
                                            window.location.href ="resultup.php";
                                            </script>';                                           
                                        }
                                        else
                                        {
                                            echo '<div class="alert alert-danger">Error Occured.</div>';
                                        }                                                                                                                                                              
                                    }
                                }
                           else
                           {
                                echo '<div class="alert alert-danger">All Fields Required.</div>';
                           }  
                      }
                      ?>
                       <header class="panel-heading">
                          Record Update
                          </header>
                          <?php
                                  if($_SESSION['i'])
                                  {
                                    $stuid=$_SESSION['i'];
                                    $query1=mysqli_query($connection,"select * from rms_result where id='$stuid'");
                                    if(mysqli_num_rows($query1)>0)
                                    {
                                        $row1=mysqli_fetch_array($query1);
                                        $subjects1=$row1['subjects'];
                                        $marks1=$row1['marks'];
                                    }
                                  }
                                  
                                   ?>
                         <div class="panel-body">
                              <form class="form-horizontal" role="form" method="post">
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Subjects</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $subjects1; ?>" readonly="" required="required" name="name" class="form-control" placeholder="Name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Marks</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" value="<?php echo $marks1; ?>" name="email" class="form-control" placeholder="Email">
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