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
                              Student Queries Record
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Enrollment ID</th>
                              
                                          <th >Student Name</th>
                                          <th >Email</th>
										  <th>Query</th>
										  <th>Response</th>
										  <th>Action</th>
										
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      $query=mysqli_query($connection,"select * from rms_query");
                                      if(mysqli_num_rows($query)>0)
                                      {
                                           while($row=mysqli_fetch_array($query))
                                           {
                                                ?>
                                              <tr class="gradeX">
                                                  <td><?php echo $row['id']; ?></td>
                                                  <td><?php echo $row['enrollment_id']; ?></td>
                                                  <td><?php echo $row['sname']; ?></td>
                                                 
                                                  <td><?php echo $row['email']; ?></td>
                                                  <td><?php echo $row['query']; ?></td>
												  <td><?php echo $row['response']; ?></td>
                                                  <td><a href="rquery.php?stuid=<?php echo $row['id'] ?>" class="btn btn-primary btn-xs">Response Query</a></td>
                                                 
                                              </tr>
                                                
                                                <?php
                                           }   
                                      } 
                                      ?>
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>ID</th>
                                          <th>Enrollment ID</th>
                              
                                          <th >Student Name</th>
                                          <th >Email</th>
										  <th>Query</th>
										  <th>Response</th>
										  <th>Action</th>
                                      </tr>
                                      </tfoot>
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