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
                        if(isset($_POST['submit']))
                        {
                            $name=$_POST['name'];
                           $id=$_POST['id'];
                            if(!empty($name))
                            {
                               
                                    $query=mysqli_query($connection,"update rms_query set response='$name' where id='$id'");
                                    if(mysqli_affected_rows($connection))
                               {
							 echo '<script>
                                 alert("Response Submitted");
                                window.location.href="squery.php";
                                </script>';                                 
                                //$url=$_SERVER['REQUEST_URI'];
                                header("refresh:1;Location: squery.php"); 
										}
										
else
{	
                               
                                echo '<script>
                                 alert("Error Occur");
                                window.location.href="squery.php";
                                </script>';                                 
                                //$url=$_SERVER['REQUEST_URI'];
                                header("refresh:1;Location: squery.php"); 
}
							}
						}
                      ?>
                          <header class="panel-heading">
                          Student Queries Response
                          </header>
                         <div class="panel-body">
						 
						 <?php
                            
if(isset($_GET['stuid']))
                          {
                            $id=$_GET['stuid'];
							$query=mysqli_query($connection,"select * from rms_query where id='$id'");
                                      if(mysqli_num_rows($query)>0)
                                      {
                                           while($row=mysqli_fetch_array($query))
                                           {
                                                ?>
                              <form class="form-horizontal" role="form" method="post" action="rquery.php">
							  <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
 <div class="form-group">
                                      <label for="class" class="col-lg-2 col-sm-2 control-label">Query</label>
                                      <div class="col-lg-10">
                                          <input required="required" type="text" class="form-control" value="<?php echo $row['query']; ?> " name="query" disabled/>
                                      </div>
                                  </div>                                
								<div class="form-group">
                                      <label for="class" class="col-lg-2 col-sm-2 control-label">Response</label>
                                      <div class="col-lg-10">
                                          <input required="required" type="text" class="form-control" name="name"  placeholder="Response">
                                      </div>
                                  </div>
                               <?php
                                           }   
                                      }
						  }									  
                                      ?>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <input type="submit" name="submit" class="btn btn-danger" value="Submit" />
                                      </div>
                                  </div>
                              </form>
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