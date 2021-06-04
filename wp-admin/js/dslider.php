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
                              Slider Record
                          </header>
                           
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>Image ID</th>
                                          <th>path</th>
                                          <th>Preview</th>
                                          <th class="hidden-phone">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      $query=mysql_query("select * from slider order by id desc");
                                      if(mysql_num_rows($query)>0)
                                      {
                                           while($row=mysql_fetch_array($query))
                                           {
                                                ?>
                                              <tr class="gradeX">
                                                  <td><?php echo $row['id']; ?></td>
                                                  <td><?php echo $row['path']; ?></td>
                                                  <td><img src="<?php echo $row['path']; ?>" width="100px;" height="100px;"/></td>
                                                  <td class="center hidden-phone"><a href="dslider.php?a=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
                                              </tr>
                                                
                                                <?php
                                           }   
                                      }
                                      ?>
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                       <th>Image ID</th>
                                          <th>path</th>
                                          <th>Preview</th>
                                          <th class="hidden-phone">Action</th>
                                      </tr>
                                      </tfoot>
                          </table>
                                </div>
                          </div>
                      </section>
                       <?php
                      
                          if($_GET['a'])
                          {
                            $query_delete=mysql_query("delete from slider where id='".$_GET['a']."'");
                            if(mysql_affected_rows()>0)
                            {
                                $row1=mysql_fetch_row($query_delete);
                                echo '<script>
                                alert("Slider Deleted Successfully.");
                                var windowlocation = window.location.href.split("?")[0];
                                window.location.href =windowlocation;
                                </script>';
                            }
                          }
                           ?>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
<?php include('includes/footer.php');
?>