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

                      $header1=false;

                      $t='';

                      if(isset($_POST['submit']))

                      {


                           if(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)== 'csv')

                           {

                           $handle = fopen($_FILES['file']['tmp_name'], "r");

	                       while (($data = fgetcsv($handle, ",")) !== FALSE) 

                           {

                                $size=sizeof($data);

                     

                                if($data)

                                {

                                    $m='';

                                    for($i1=7;$i1<$size;$i1++)

                                    {

                                        if($header1==false)

                                        {

                                             $t.=$data[$i1];

                                            if($i1<$size-1 && $data[$i1]!='')

                                            {

                                                $t.=',';

                                            }

                                        }

                                        else

                                        {

                                            $header1=true;                                            

                                            $m.=$data[$i1];

                                            if($i1<$size-1 && $data[$i1]!='')                                        

                                            {

                                                $m.=',';

                                            }

                                        }

                                    }

                                    $header1=true;

                                    if($data[0]!='Enrollment Id' and $data[0]!= 'Enrollment Id')

                                    {

                                        $header1=true;

                                        $import="INSERT into rms_result(enrollment_id,name,fname,class,section,mobile,session,subjects,marks) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$t','$m')";

                                        
                                        mysqli_query($connection,$import);

    
                                    }

                                }

                           }

                           if(mysqli_affected_rows($connection)>0)

                           {

                                if (is_uploaded_file($_FILES['file']['tmp_name'])) 

                                {
                                echo '<div class="alert alert-success">File is Uploaded Successfully.</div>';

                                }

                           }
              } 

                           else

                           {

                            echo '<div class="alert alert-danger">Please Upload CSV File.</div>';

                           }

                      }

                      ?>

                       <header class="panel-heading">

                          Upload Remark Sheet

                          </header>

                         <div class="panel-body">

                              <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">

                                  <div class="form-group">

                                      <label class="col-lg-2 col-sm-2 control-label">Name</label>

                                      <div class="col-lg-10">

                                          <input type="file" required="required" name="file" class="form-control">

                                      </div>

                                  </div>                             

                                  <div class="form-group">

                                      <div class="col-lg-offset-2 col-lg-10">

                                          <input type="submit" name="submit" class="btn btn-danger" value="Submit" />

                                      </div>

                                  </div>

                              </form>

                              <?php

                                  if($header1!=false)

                                  {

                                    ?>

                               <section id="unseen">

                                <table class="table table-bordered table-striped table-condensed">

                                  <thead>

                                  <tr>

                                      <th>Enrollment ID</th>

                                      <th>Student Name</th>

                                      <th>Father Name</th>

                                      <th>Class</th>

                                      <th>Section</th>

                                      <th>Mobile</th>

                                      <th>Session</th>

                                      <th>Subjects</th>

                                      <th>Marks</th>

                                  </tr>

                                  </thead>

                                  <tbody>

                                 <?php

                                    $query1=mysqli_query($connection,"select * from rms_result");

                                    if(mysqli_num_rows($query1)>0)

                                    {

                                        while($row2=mysqli_fetch_array($query1))

                                        {

                                            ?>

                                            <tr><td><?php echo $row2['enrollment_id']; ?></td>

                                            <td><?php echo $row2['name']; ?></td>

                                            <td><?php echo $row2['fname']; ?></td>

                                            <td><?php echo $row2['class']; ?></td>

                                            <td><?php echo $row2['section']; ?></td>

                                            <td><?php echo $row2['mobile']; ?></td>

                                            <td><?php echo $row2['session']; ?></td>

                                            <td><?php echo $row2['subjects']; ?></td>                                       

                                            <td><?php echo $row2['marks']; ?></td>

                                            </tr>

                                            <?php

                                        }

                                    }

                                    ?>

                                     </tbody>

                                  </table>

                                  </section>

                                  <?php

                                  }  

                                                                       

                                  ?>

                                  

                                 

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