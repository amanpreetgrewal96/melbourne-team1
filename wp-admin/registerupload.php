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
                           if(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)== 'csv')
                           {
                           $handle = fopen($_FILES['file']['tmp_name'], "r");
	                       while(($data = fgetcsv($handle, ",")) !== FALSE) 
                           {
                                 $query_check1=mysql_query("select max(id) as p from register");
                                 //echo mysql_num_rows($query_check1);
                                 if(mysql_num_rows($query_check1))
                                 {
                                    while($r=mysql_fetch_array($query_check1))
                                    {
                                         $id=$r['p'];
                                    }
                                   
                                    IF($id=='')
                                    {
                                         $id=0;
                                    }
                                    $id=$id+1;
                                    $id='RN'.$id;
                                 }
                                $query=mysql_query("select email from register where email='".$data[13]."'");
                               // echo "select email from register where email='".$data[13]."'";
                                //echo mysql_num_rows($query);
                                if($query)
                                {
                                    //$dob1=new DateTime($data[5]);
                                    $dob=date('Y-m-d',strtotime($data[5]));
                                    //$dob=date_format($dob1,"Y-m-d");
                                   // $doab1=new DateTime($data[0]);
                                    //$doab=date_format($doab1,"Y-m-d");
                                    $doab=date('Y-m-d',strtotime($data[0]));
                                    if($data[2]!='Student Name' and $data[2]!= 'student name')
                                    {
                                        $pass=md5($data[14]);
                                        $import="INSERT into register(regno,name,email,password,class,section,ori_pass,fname,mname,dob,caste,aadhar,mob1,mob2,address,notes,doad,adno) 
                                        values('$id','$data[2]','$data[13]','$pass','$data[8]','$data[9]','$data[14]','$data[3]','$data[4]','$dob','$data[6]','$data[7]','$data[11]','$data[12]','$data[10]','$data[15]','$doab','$data[1]')";
                                        //echo $import;
                                        $pa=md5("parent");
                                        $import1="INSERT into parents(name,sname,password,ori_pass,email,class,section,mobile,adno) 
                                        values('$data[3]','$data[2]','$pa','parent','$data[16]','$data[8]','$data[9]','$data[11]','$data[1]')";
                                        mysql_query($import);
                                         mysql_query($import1)or die(mysql_error());
                                    }
                                }
                           }
                           fclose($handle);
                           if(mysql_affected_rows()>0)
                           {
                                if (is_uploaded_file($_FILES['file']['tmp_name'])) 
                                {
                                echo '<div class="alert alert-success">File is Uploaded Successfully.</div>';
                                }
                           }
                           //print "Import done";
                           } 
                           else
                           {
                            echo '<div class="alert alert-danger">Please Upload CSV File.</div>';
                           }
                      }
                      ?>
                       <header class="panel-heading">
                          Student Registration
                          </header>
                          <div class="col-md-12" style="padding-bottom: 30px;">
                              <a href="includes/student_data_example.csv" class="btn btn-success" style="float: right;">Student Demo Data File</a>
                             </div>
                         <div class="panel-body">
                             
                             <div class="col-md-12">
                              <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Name</label>
                                      <div class="col-lg-10">
                                          <input type="file" required="required" name="file" class="form-control">
                                          <span>Please Upload only Csv file(.csv).</span>
                                      </div>
                                  </div>                             
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <input type="submit" name="submit" class="btn btn-danger" value="Submit" />
                                      </div>
                                  </div>
                              </form></div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
<?php include('includes/footer.php'); ?>