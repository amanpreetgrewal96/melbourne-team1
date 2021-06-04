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
                              Add Subject
                          </header>
                          
                          <div class="panel-body">
                          <?php
                          if(isset($_POST['submit']))
{
    $class=$_POST['course'];
    $sub=$_POST['sub'];
    
    $q=mysqli_query($connection,"select class from rms_subject where class='$class'");
    if(mysqli_num_rows($q)>0)
    {
        
         $query1=mysqli_query($connection,"update rms_subject set class='$class',subjects='$sub' where class='$class'");     
    }
    else
    {
         $query1=mysqli_query($connection,"insert into rms_subject(class,subjects) values('$class','$sub')");
    }
   
   if(mysqli_affected_rows($connection))
   {
       echo '<div class="alert alert-success">Subjects added Successfully.</div>';                                           
   }
   else
   {
        echo '<div class="alert alert-danger">Error Occured.</div>';
   }  
}
                           ?>
                          <form class="" method="post" role="form">
                                  <div class="form-group">
                                      <label  for="course">Class</label>
                                      <select name="course"  class="form-control" style="text-transform: capitalize;">
                                      <option>Select Class</option>
                                      <?php
                                      $q1=mysqli_query($connection,"select distinct(name) from rms_class");
                                      if(mysqli_num_rows($q1)>0)
                                      {
                                           while($r1=mysqli_fetch_array($q1))
                                           {
                                                echo '<option>'.$r1['name'].'</option>';
                                           }  
                                      }
                                      ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                  <label for="course">Subject</label><br />
                                  <span style="color: red;">Please Add Subject Like(sub1,sub2,sub3,.....).</span><br />
                                      <textarea name="sub" class="form-control"></textarea>
                                  </div>
                                  <input type="submit" value="Submit" class="btn btn-success" name="submit"/>
                               
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
          </section>
      </section>

<?php include('includes/footer.php'); ?>