<?php ob_start();
include('includes/header.php');
include('includes/connection.php');
if($_GET['stuid'])
{
    $_SESSION['stuid']=$_GET['stuid'];
    header('Location:editstu.php');
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
                           $adno=$_POST['adno'];
					    $doad=new DateTime($_POST['doad']);
                           $doad=date_format($doad,"Y-m-d");
                           $name=trim($_POST['name']);
						   $fname=trim($_POST['fname']);
                           $mname=trim($_POST['mname']);
                           $duedate=new DateTime($_POST['dob']);
                           $dob=date_format($duedate,"Y-m-d");
						     $mob1=$_POST['mob1'];
                           $mob2=$_POST['mob2'];
						     $address=$_POST['address'];
							 $class=trim($_POST['course']);
                           $section=$_POST['section'];
                           $email=trim($_POST['email']);
                           $pass=$_POST['pass'];
                          
                        $stuid=$_SESSION['stuid'];   
						  
							
                         
                           if($name)
                           {
                                if($pass)
                                {
                                   
                                    $query_check=mysqli_query($connection,"select email from rms_student_register  where email='$email'");
									
                                    if(mysqli_num_rows($query_check))
                                    {
                                     
                                        if(mysqli_query($connection,"update rms_student_register  set name='$name',email='$email',password='$pass',class='$class',section='$section',fname='$fname',mname='$mname',dob='$dob',mob1='$mob1',mob2='$mob2',address='$address',doad='$doad' 
                                        where id='$stuid'"))
                                        {
                                            echo '<div class="alert alert-success">Student detail Updated Successfully.</div>';                                           
                                        }
                                        else
                                        {
                                            echo '<div class="alert alert-danger">Error Occured.</div>';
										
                                        }                                                                                                                                                              
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger">Email ID is already registered.</div>';
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
                          Update Student Registration Detail
                          </header>
                          <?php
                                  if($_SESSION['stuid'])
                                  {
                                    $stuid=$_SESSION['stuid'];
                                    $query1=mysqli_query($connection,"select * from rms_student_register  where id='$stuid'");
                                    if(mysqli_num_rows($query1)>0)
                                    {
                                        $row1=mysqli_fetch_array($query1);
                                        $doad1=$row1['doad'];
                                        $name1=$row1['name'];
                                        $email1=$row1['email'];
                                        $pass1=$row1['password'];
                                        $course1=$row1['class'];
                                        $section1=$row1['section'];
                                        $adno1=$row1['regno'];
                                        $fname1=$row1['fname'];
                                        $mname1=$row1['mname'];
                                        $dob1=$row1['dob'];  
                                     
                                        $mob11=$row1['mob1'];
                                        $mob21=$row1['mob2'];                                 }
                                        $address1=$row1['address'];
                                   
                                  }
                                  
                                   ?>
                         <div class="panel-body">
                              <form class="form-horizontal" role="form" method="post">
                                 <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Enrollment Date</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $doad1; ?>" required="required" name="doad" class="form-control default-date-picker" placeholder="Date">
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Enrollment ID</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $adno1; ?>" required="required" name="adno" class="form-control" placeholder="Admission No." readonly>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Student Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $name1; ?>" required="required" name="name" class="form-control" placeholder="Student Name">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Father Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $fname1; ?>" required="required" name="fname" class="form-control" placeholder="Father Name">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Mother Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $mname1; ?>" required="required" name="mname" class="form-control" placeholder="Mother Name">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Date of Birth</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $dob1; ?>" required="required" id="date" name="dob" class="form-control default-date-picker" placeholder="Date of Birth">
                                      </div>
                                  </div>
                                  
                                    <div class="form-group">
                                      <label class="col-lg -2 col-sm-2 control-label">Mobile Number</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" value="<?php echo $mob11; ?>" name="mob1" class="form-control" placeholder="Mobile Number 1">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Alternate Mobile Number</label>
                                      <div class="col-lg-10">
                                          <input type="text"  name="mob2" value="<?php echo $mob21; ?>" class="form-control" placeholder="Mobile Number 2">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Address</label>
                                      <div class="col-lg-10">
                                          <textarea required="required" value="<?php echo $address1; ?>" name="address" class="form-control" placeholder="Address"><?php echo $address1; ?>
                                          </textarea>
                                      </div>
                                  </div>
                                     <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Class</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" value="<?php echo $course1; ?>" required="required" name="course" style="text-transform: capitalize;">
                                  <?php
                                  $query= mysqli_query($connection,"select distinct(name) from rms_class");
                                  if(mysqli_num_rows($query)>0)
                                  {
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        ?>
                                        <option value="<?php echo $row['name'];?>" <?php if(strtolower($row['name']) == strtolower($course1)) { echo ' selected="selected"';} ?>><?php echo $row['name']; ?></option>
                                        <?php
                                    }
                                  }
                                  
                                  ?>
                                  </select>
                                      </div>
                                  </div>       
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Section</label>
                                      <div class="col-lg-10">
                                        <select class="form-control" required="required" name="section" style="text-transform: capitalize;">
                                  <?php
                                  $query= mysqli_query($connection,"select distinct(section) from rms_class");
                                  if(mysqli_num_rows($query)>0)
                                  {
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        ?>
                                        <option value="<?php echo $row['section'];?>" <?php if(strtolower($row['section']) == strtolower($row1['section'])) { echo ' selected="selected"';} ?>><?php echo $row['section']; ?></option>
                                        <?php
                                    }
                                  }
                                  
                                  ?>
                                  </select>  
                                      </div>
                                  </div>   
                                       
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Email</label>
                                      <div class="col-lg-10">
                                          <input type="email" value="<?php echo $email1;?>"   name="email" class="form-control" placeholder="Email">
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Password</label>
                                      <div class="col-lg-10">
                                          <input type="text" value="<?php echo $pass1;?>" required="required" name="pass" class="form-control" placeholder="Password">
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

 <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
 <script src="js/advanced-form-components.js"></script>