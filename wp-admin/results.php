<?php ob_start();
include('includes/header.php');
include('includes/connection.php');
?>
<?php
function excelData($mq,$sq) {
  echo "Select class and Subject";
}
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                        <section class="panel">
                          <header class="panel-heading">
                              Download Sheet
                          </header>
                          
                          <div class="panel-body">
                          <form class="form-inline" method="post" role="form" style="margin:20px 0;width:60%;float:left;">
                                  <div class="form-group">
                                      <label class="sr-only" for="course">Course</label>
                                      <select name="course"  class="form-control" style="text-transform: capitalize;">
                                      <option>Select Class</option>
                                     <?php
                                          $query=mysqli_query($connection,"select distinct name from rms_class");
                                          if(mysqli_num_rows($query)>0)
                                          {
                                            while($row=mysqli_fetch_array($query))
                                            {
                                                ?>
                                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                            }
                                          }
                                          
                                          ?>
                                     
                                      </select>
                                  </div>
		                            <div class="form-group">
                                    <label class="sr-only" for="assignment">Section</label>
                                      <select name="assignment" id="assign" class="form-control">
                                      <option>Select Section</option>
                                       <?php
									   
                                          $query=mysqli_query($connection,"select distinct section from rms_class");
										  
                                          if(mysqli_num_rows($query)>0)
                                          {
                                            while($row=mysqli_fetch_array($query))
                                            {
                                                ?>
                                                <option value="<?php echo $row['section']; ?>"><?php echo $row['section']; ?></option>
                                                <?php
                                            }
                                          }
                                          
                                          ?>
                                      </select>
                                  </div>
		 					
      
                                  <button type="submit" class="btn btn-success" name='ExportType'>Submit</button>
                                
                              </form>
                              <form action="loadresult.php" method="post" id="export-form" style="float: right;margin:20px 0; ">
						<input type="submit" value='Save Data' class="btn btn-warning" name='export'/>
					  </form>
                              <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                  <thead>
                                      <tr>
                                          <th>Enrollment Date</th>
                                          <th>Enrollment ID</th>
                                          <th>Name</th>
                                          <th>Fname</th>
                                          <th>Email ID</th>
                                          <th class="hidden-phone">Mobile</th>
                                          <th class="hidden-phone">Class</th>
                                          <th>Section</th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
									  if(isset($_POST['ExportType']))
{
	$course=$_POST['course'];
    $assign=$_POST['assignment'];
	$mq="select * from rms_student_register where class='$course' and section='$assign'";
	$sq="select * from rms_subject where class='$course'";
	$query=mysqli_query($connection,$mq);
$q1=mysqli_query($connection,$mq);
$q2=mysqli_query($connection,$sq);
while($r2=mysqli_fetch_array($q2))
{
    $a2=$r2['subjects'];
}

$a2=explode(',',$a2);
$d2=array_merge(array("Enrollment Id","Student Name","Father Name","Class","Section","Mobile","Session"),$a2);
//print_r($d2);
while($data1=mysqli_fetch_array($q1))
{
    $d2[]=$data1['regno'];
    $d2[]=$data1['name'];
    $d2[]=$data1['fname'];
    $d2[]=$data1['class'];
    $d2[]=$data1['section'];
    $d2[]=$data1['mob1'];
    $d2[]="";
    for($i=0;$i<sizeof($a2);$i++)
    {
        $d2[]="";
    }
}
$c=7+sizeof($a2);
$d5=(array_chunk($d2,$c));
($_SESSION['d5']=$d5);
}
else
{
									  
									  $mq="select * from rms_student_register order by id desc";
                                      $sq="select * from rms_subject where class='5th'";
	excelData($mq,$sq);
									  $query=mysqli_query($connection,$mq);
}
                                      if(mysqli_num_rows($query)>0)
                                      {
                                           while($row=mysqli_fetch_array($query))
                                           {
                                                ?>
                                              <tr class="gradeX">
                                                  <td><?php echo $row['doad']; ?></td>
                                                  <td><?php echo $row['regno']; ?></td>
                                                  <td><?php echo $row['name']; ?></td>
                                                  <td><?php echo $row['fname']; ?></td>
                                                  <td><?php echo $row['email']; ?></td>
                                                  <td class="center hidden-phone"><?php echo $row['mob1']; ?></td>
                                                  <td class="center hidden-phone"><?php echo $row['class']; ?></td>
                                                  <td><?php echo $row['section']; ?></td>
                                               
                                              </tr>
                                                
                                                <?php
                                           }   
                                      } 
                                      ?>
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>Enrollment Date</th>
                                          <th>Enrollment ID</th>
                                          <th>Name</th>
                                          <th>Fname</th>
                                          <th>Email ID</th>
                                          <th class="hidden-phone">Mobile</th>
                                          <th class="hidden-phone">Class</th>
                                          <th>Section</th>
                                          
                                      </tr>
                                      </tfoot>
                              </table>
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
          </section>
      </section>

<?php include('includes/footer.php'); ?>