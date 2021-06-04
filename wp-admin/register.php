<?php ob_start();
include('includes/header.php');
include('includes/connection.php');
 ?>
<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css">
      
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
							 $class=trim($_POST['class']);
                           $section=$_POST['section'];
                           $email=trim($_POST['email']);
                           $pass=$_POST['pass'];
                           $repass=$_POST['repass'];
                          
                           $notes=$_POST['notes'];
                        
						   $_SESSION['adnum']=$adno;
						   $_SESSION['clus']=$class;
						    $_SESSION['ss']=$section;
						
                           if(!empty($name) && !empty($pass) && !empty($repass) && !empty($class))
                           {
                                if($pass == $repass)
                                {
                                    $query_check=mysqli_query($connection,"select email from rms_student_register where email='$email'");
                                    if(mysqli_num_rows($query_check)<=0)
                                    {
                                        $query_insert=mysqli_query($connection,"INSERT INTO `result_system`.`rms_student_register` (`doad` ,`regno` ,`name` ,`fname` ,`mname` ,`dob` ,`mob1` ,`mob2` ,`address` ,`class` ,`section` ,`email` ,`password` ,`notes`) values('$doad','$adno','$name','$fname','$mname','$dob','$mob1','$mob2','$address','$class','$section','$email','$pass','$notes')");
                                        if(mysqli_affected_rows($connection)>0)
                                        {
                                            echo '<div class="alert alert-success">Student Information has been added successfully.</div>';   											
                                        }
                                        else
                                        {
                                            echo '<div class="alert alert-danger">Error Occured.</div>';
                                        }                                                                                                                                                              
                                    }
                                    else
                                    {
                                        $query_insert=mysqli_query($connection,"INSERT INTO `result_system`.`rms_student_register` (`doad` ,`regno` ,`name` ,`fname` ,`mname` ,`dob` ,`mob1` ,`mob2` ,`address` ,`class` ,`section` ,`password` ,`notes`) values('$doad','$adno','$name','$fname','$mname','$dob','$mob1','$mob2','$address','$class','$section','$pass','$notes')");
                                         if(mysqli_affected_rows($connection)>0)
                                        {
                                            echo '<div class="alert alert-success">Student Information has been added successfully.</div>';   											
                                        }
                                        else
                                        {
                                            echo '<div class="alert alert-danger">Error Occured.</div>';
                                        }
                                    }
                                }
                                else
                                {
                                    echo '<div class="alert alert-warning">Password and Retype Password Mismatch.</div>';
                                } 
                           }
                           else
                           {
                                echo '<div class="alert alert-danger">All Fields Required.</div>';
                           }  
                      }
                      ?>
                       <header class="panel-heading">
                          Student Registration
                          </header>
                         <div class="panel-body">
                              <form class="form-horizontal" role="form" method="post">
                                 
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Enrollment Date</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="doad" class="form-control default-date-picker" placeholder="Date">
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Enrollment ID</label>
									  <?php

$Reg_Result = mysqli_query($connection,"select * from rms_student_register ORDER BY id desc");
$Reg_Row = @mysqli_fetch_array($Reg_Result,MYSQLI_ASSOC);

?>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="adno" class="form-control" value="ERD00<?php echo $Reg_Row['id']+1; ?>" placeholder="Enrollment ID" readonly>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Student Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="name" class="form-control" placeholder="Student Name">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Father Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="fname" class="form-control" placeholder="Father Name">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Mother Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="mname" class="form-control" placeholder="Mother Name">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Date of Birth</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" id="date" name="dob" class="form-control default-date-picker" placeholder="Date of Birth">
                                      </div>
                                  </div>
                                  
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Mobile Number</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="mob1" class="form-control" placeholder="Mobile Number" required>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Alternate Mobile Number</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="mob2" class="form-control" placeholder="Alternate Mobile Number">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Address</label>
                                      <div class="col-lg-10">
                                          <textarea required="required" name="address" class="form-control" placeholder="Address">
                                          </textarea>
                                      </div>
                                  </div>
                                     <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Class</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" required="required" name="class" style="text-transform: capitalize;">
                                          <?php
                                          $query=mysqli_query($connection,"select distinct name from rms_class");
                                          if(mysqli_num_rows($query)>0)
                                          {
                                            while($row=mysqli_fetch_array($query))
                                            {
                                                ?>
                                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
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
                                          $query=mysqli_query($connection,"select distinct section from rms_class");
                                          if(mysqli_num_rows($query)>0)
                                          {
                                            while($row=mysqli_fetch_array($query))
                                            {
                                                ?>
                                                <option value="<?php echo $row['section']; ?>"><?php echo $row['section']; ?></option>
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
                                          <input type="email" name="email" class="form-control" placeholder="Email">
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Password</label>
                                      <div class="col-lg-10">
                                          <input type="password" required="required" name="pass" class="form-control" placeholder="Password">
                                      </div>
                                  </div>      
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Retype-Password</label>
                                      <div class="col-lg-10">
                                          <input type="password" required="required" name="repass" class="form-control" placeholder="Retype-Password">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Remarks</label>
                                      <div class="col-lg-10">
                                          <textarea name="notes" class="form-control">
                                          </textarea>
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