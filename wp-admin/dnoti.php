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
                          if(isset($_GET['a']))
                          {
                            //$_SESSION['course_id']=$_GET['c'];
                            $query_delete=mysqli_query($connection,"delete from rms_notification where id='".$_GET['a']."'");
                            if(mysqli_affected_rows($connection)>0)
                            {
                                echo '<script>
                                alert("Notification is deleted Successfully.");
                              var windowlocation = window.location.href.split("?")[0];
                               window.location.href =windowlocation;
                                </script>';
                            }
                          }
                          ?>
                          <header class="panel-heading">
                              Notification Record
                          </header>
                           
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>Notification ID</th>
                                          <th>Text</th>
                                          <th>Date</th>
                                          <th class="hidden-phone">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      
                                               <?php
                                      $query=mysqli_query($connection,"select * from rms_notification order by id desc");
                                      if(mysqli_num_rows($query)>0)
                                      {
                                           while($row=mysqli_fetch_array($query))
                                           {
                                                ?>
                                              <tr class="gradeX">
                                                  <td><?php echo $row['id']; ?></td>
                                                  <td><?php echo $row['note']; ?></td>
                                                  <td><?php echo $row['date']; ?></td>
                                                  <td class="center hidden-phone"><a href="dnoti.php?a=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
                                              </tr>
                                                
                                                <?php
                                           }   
                                      }
                                      ?>
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                       <th>Notification ID</th>
                                          <th>Name</th>
                                          <th>Date</th>
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