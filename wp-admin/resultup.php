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
                          if(isset($_GET['c']))
                          {
                            //$_SESSION['course_id']=$_GET['c'];
                            $query_delete=mysqli_query($connection,"delete from rms_result where id='".$_GET['c']."'");
                            if(mysqli_affected_rows($connection)>0)
                            {
                                echo '<script>
                                alert("Result data Deleted Successfully.");
                              var windowlocation = window.location.href.split("?")[0];
                               window.location.href =windowlocation;
                                </script>';
                            }
                          }
                           ?>
                          <header class="panel-heading">
                          Result Record Update
                          </header>
                          
                       <div class="panel-body">
                       <div class="adv-table">
                       <table class="display table table-bordered table-striped dataTable" id="example" aria-describedby="example_info">
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
                                      <th>Action</th>
                                      </tr>
                                      </thead>
                            <tfoot>
                                      <tr>
                                       <th>Student ID</th>
                                      <th>Student Name</th>
                                      <th>Father Name</th>
                                      <th>Class</th>
                                      <th>Section</th>
                                      <th>Session</th>
                                      <th>Term</th>
                                      <th>Subjects</th>
                                      <th>Marks</th>
                                      <th>Action</th>
                                      </tr>
                                      </tfoot>
                          <tbody role="alert" aria-live="polite" aria-relevant="all">
                          <?php
                          $query=mysqli_query($connection,"select * from rms_result");
                          if(mysqli_num_rows($query)>0)
                          {
                                while($row=mysqli_fetch_array($query))
                                {
                                     ?>
                                    <tr class="gradeX">
                                      <td class=" "><?php echo $row['enrollment_id'];  ?></td>
                                      <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['class']; ?></td>
                                            <td><?php echo $row['section']; ?></td>
											<td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo $row['session']; ?></td>
											 <td><?php echo $row['subjects']; ?></td>
											  <td><?php echo $row['marks']; ?></td>
                                      <td class=" "><a href="editresult.php?i=<?php echo $row['id'];  ?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                                      <a href="resultup.php?c=<?php echo $row['id'];  ?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a>
                                      </td>
                                  </tr>
                          <?php
                                    
                                }
                            
                           
                                
                          } 
                          else
                          {
                            
                          }
                          ?>
                          
                         
                          </tbody>
                    </table>
                       </div>
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