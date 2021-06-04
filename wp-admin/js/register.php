<?php ob_start();
include('includes/header.php');

include('includes/connection.php');
include('session_verification.php'); 
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
                           $query_check1=mysql_query("select max(id) from register");
                           if(mysql_num_rows($query_check1)>0)
                           {
                                $id=mysql_result($query_check1,'id',0);
                                IF($id=='')
                                {
                                    $id=0;
                                }
                                $id=$id+1;
                                $id='RN'.$id;
                           }
                           $name=trim($_POST['name']);
                           $email=trim($_POST['email']);
                           $pass=md5($_POST['pass']);
                           $repass=md5($_POST['repass']);
                           $class=trim($_POST['class']);
                           $section=$_POST['section'];
                           $fname=trim($_POST['fname']);
                           $mname=trim($_POST['mname']);
                           $duedate=new DateTime($_POST['dob']);
                           $dob=date_format($duedate,"Y-m-d");
                           $doad=new DateTime($_POST['doad']);
                           $doad=date_format($doad,"Y-m-d");
                           $adno=$_POST['adno'];
                           $aadar=$_POST['aadhar'];
                           $mob1=$_POST['mob1'];
                           $mob2=$_POST['mob2'];
                           $address=$_POST['address'];
                           $notes=$_POST['notes'];
                           $category=$_POST['category'];
                           if(!empty($name) && !empty($pass) && !empty($repass) && !empty($class))
                           {
                                if($pass == $repass)
                                {
                                    $query_check=mysql_query("select email from register where email='$email'");
                                    if(mysql_num_rows($query_check)<=0)
                                    {
                                        $query_insert=mysql_query("insert into register(regno,name,email,password,class,section,ori_pass,fname,mname,dob,caste,aadhar,mob1,mob2,address,notes,doad,adno) 
                                        values('$id','$name','$email','$pass','$class','$section','".$_POST['pass']."','$fname','$mname','$dob','$category','$aadar','$mob1','$mob2','$address','$notes','$doad','$adno')");
                                        if(mysql_affected_rows()>0)
                                        {
                                            echo '<div class="alert alert-success">Student Register Successfully.</div>';                                           
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
                                      <label class="col-lg-2 col-sm-2 control-label">Admission Date</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="doad" class="form-control default-date-picker" placeholder="Date">
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Admission No.</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="adno" class="form-control" placeholder="Admission No.">
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
                                      <label class="col-lg-2 col-sm-2 control-label">Aadhar Card Number</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="aadhar" class="form-control" placeholder="Aadhar Card Number">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Mobile Number 1</label>
                                      <div class="col-lg-10">
                                          <input type="text" required="required" name="mob1" class="form-control" placeholder="Mobile Number 1">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Mobile Number 2</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="mob2" class="form-control" placeholder="Mobile Number 2">
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
                                          $query=mysql_Query("select distinct name from class");
                                          if(mysql_num_rows($query)>0)
                                          {
                                            while($row=mysql_fetch_array($query))
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
                                          $query=mysql_Query("select distinct section from class");
                                          if(mysql_num_rows($query)>0)
                                          {
                                            while($row=mysql_fetch_array($query))
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
                                      <label class="col-lg-2 col-sm-2 control-label">Category</label>
                                      <div class="col-lg-10">
                                          <select class="form-control" required="required" name="category" style="text-transform: capitalize;">
                                         <option value="">Select Please</option>
                                         <option value="general">General</option>
                                         <option value="sc">SC</option>
                                         <option value="bc">BC</option>
                                         <option value="obc">OBC</option>
                                         <option value="st">ST</option>
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
                                      <label class="col-lg-2 col-sm-2 control-label">Other Notes</label>
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