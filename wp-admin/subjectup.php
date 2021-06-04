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
                    
                            $query_delete=mysqli_query($connection,"delete from rms_subject where id='".$_GET['c']."'");
                            if(mysqli_affected_rows($connection)>0)
                            {
                                echo '<script>
                                alert("Subject record is deleted Successfully.");
                              var windowlocation = window.location.href.split("?")[0];
                               window.location.href =windowlocation;
                                </script>';
                            }
                          }
                           ?>
                          <header class="panel-heading">
                          Subjects Update
                          </header>
                          
                       <div class="panel-body">
                       <div class="adv-table">
                       <table class="display table table-bordered table-striped dataTable" id="example" aria-describedby="example_info">
                           <thead>
                               <tr role="row">
                               <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Class Name</th>
                               <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Subjects</th> 
                               <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Action</th>                             
                               </tr>
                           </thead>
                           <tfoot>
                              <tr role="row">
                               <th rowspan="1" colspan="1">Class Name</th>
                               <th rowspan="1" colspan="1">Subjects</th> 
                               <th rowspan="1" colspan="1">Action</th>                             
                               </tr>
                           </tfoot>
                          <tbody role="alert" aria-live="polite" aria-relevant="all">
                          <?php
                          $query=mysqli_query($connection,"select * from rms_subject");
                          if(mysqli_num_rows($query)>0)
                          {
                                while($row=mysqli_fetch_array($query))
                                {
                                     ?>
                                    <tr class="gradeX">
                                      <td class=" "><?php echo $row['class'];  ?></td>
                                      <td class=" "><?php echo $row['subjects'];  ?></td>
                                      <td class=" "><a href="editsubject.php?c=<?php echo $row['id'];  ?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                                      <a href="subjectup.php?c=<?php echo $row['id'];  ?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a>
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