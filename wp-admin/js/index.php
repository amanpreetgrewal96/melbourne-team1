<?php ob_start();
include('includes/header.php');

include('includes/connection.php');
include('session_verification.php');
 ?>

      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Student Record
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          
                                          <th>Student ID</th>
                                          <th>Admission No.</th>
                                          <th>Name</th>
                                          <th>Fname</th>
                                          <th>Email ID</th>
                                          <th class="hidden-phone">Password</th>
                                          <th class="hidden-phone">Class</th>
                                          <th>Section</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      if($_SESSION['option']=="teacher")
                                      {
                                        $class_teacher=$_SESSION['class_teacher'];
                                        $section_teacher=$_SESSION['section_teacher'];
                                        $query=mysql_query("select * from register where class='$class_teacher' and section='$section_teacher' order by id desc");  
                                      }
                                      else
                                      {
                                           $query=mysql_query("select * from register order by id desc"); 
                                      }
                                      
                                      if(mysql_num_rows($query)>0)
                                      {
                                           while($row=mysql_fetch_array($query))
                                           {
                                            //PRINT_R($row);
                                                ?>
                                              <tr class="gradeX">
                                                 <td><?php echo $row['id']; ?></td>
                                                  <td><?php echo $row['adno']; ?></td>
                                                  <td><?php echo $row['name']; ?></td>
                                                  <td><?php echo $row['fname']; ?></td>
                                                  <td><?php echo $row['email']; ?></td>
                                                  <td><?php echo $row['ori_pass']; ?></td>
                                                  <td><?php echo $row['class']; ?></td>
                                                  <td><?php echo $row['section']; ?></td>
                                              </tr>
                                                
                                                <?php
                                           }   
                                      } 
                                      ?>
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                         
                                          <th>Student ID</th>
                                          <th>Admission No.</th>
                                          <th>Name</th>
                                          <th>Fname</th>
                                          <th>Email ID</th>
                                          <th class="hidden-phone">Password</th>
                                          <th class="hidden-phone">Class</th>
                                          <th>Section</th>
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