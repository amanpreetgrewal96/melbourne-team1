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
                            $query_delete=mysqli_query($connection,"update rms_result set status='".$_GET['s']."' where class='".$_GET['c']."'");
                            if(mysqli_affected_rows($connection)>0)
                            {
                                echo '<script>
                                alert("Result status updated Successfully.");
                              var windowlocation = window.location.href.split("?")[0];
                               window.location.href =windowlocation;
                                </script>';
                            }
                          }
                           ?>
                          <header class="panel-heading">
                         Generate Result
                          </header>
                          
                       <div class="panel-body">
                       <div class="adv-table">
                       <table class="display table table-bordered table-striped dataTable" id="example" aria-describedby="example_info">
                            <thead>
                                      <tr>
                                     
                                      <th>Class</th>
                                      <th>Section</th>
									  <th>Action</th>
                                      </tr>
                                      </thead>
                            <tfoot>
                                      <tr>
                                       <th>Class</th>
									    <th>Section</th>
                                      <th>Action</th>
                                     
                                      </tr>
                                      </tfoot>
                          <tbody role="alert" aria-live="polite" aria-relevant="all">
                          <?php
                          $query=mysqli_query($connection,"select distinct(class),section,status from rms_result");
                          if(mysqli_num_rows($query)>0)
                          {
                                while($row=mysqli_fetch_array($query))
                                {
                                     ?>
                                    <tr class="gradeX">
                                      <td class=" "><?php echo $row['class'];  ?></td>
                                       <td class=" "><?php echo $row['section'];  ?></td>
                                      <td class=" ">
									  <?php if($row['status']==1)
									  {
										  ?>
                                      <a href="resultgenerate.php?c=<?php echo $row['class'];  ?>&s=0" class="btn btn-danger btn-xs">undisplay</a>
									  <?php 
									  }
									  else{
										  ?>
										  <a href="resultgenerate.php?c=<?php echo $row['class'];  ?>&s=1" class="btn btn-success btn-xs">display</a>
										  <?php
									  }
									  ?>
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