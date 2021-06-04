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
                        <?php
                          if($_GET['stuid'])
                          {
                            //$_SESSION['course_id']=$_GET['c'];
                            $query_delete=mysql_query("delete from register where id='".$_GET['stuid']."'");
                            if(mysql_affected_rows()>0)
                            {
                                echo '<script>
                                alert("Student Record Deleted Successfully.");
                              var windowlocation = window.location.href.split("?")[0];
                               window.location.href =windowlocation;
                                </script>';
                            }
                          }
                          ?>
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
                                          <th class="hidden-phone">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      $query=mysql_query("select * from register order by id desc");
                                      if(mysql_num_rows($query)>0)
                                      {
                                           while($row=mysql_fetch_array($query))
                                           {
                                                ?>
                                              <tr class="gradeX">
                                                  <td><?php echo $row['id']; ?></td>
                                                  <td><?php echo $row['adno']; ?></td>
                                                  <td><?php echo $row['name']; ?></td>
                                                  <td><?php echo $row['fname']; ?></td>
                                                  <td><?php echo $row['email']; ?></td>
                                                  <td class="center hidden-phone"><?php echo $row['ori_pass']; ?></td>
                                                  <td class="center hidden-phone"><?php echo $row['class']; ?></td>
                                                  <td><?php echo $row['section']; ?></td>
                                                  <td class=" "><a href="editstu.php?stuid=<?php echo $row['id'] ?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                                      <a href="updatestu.php?stuid=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a>
                                      </td>
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
                                          <th class="hidden-phone">Action</th>
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