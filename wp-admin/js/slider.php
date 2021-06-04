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
                      if(isset($_POST['submit']))
                      {
                        $name=strtolower($_FILES['file']['name']);
            	        $ext=pathinfo($name,PATHINFO_EXTENSION);
                        $tmp_name=$_FILES['file']['tmp_name'];
            		    $compare=array('tif','tiff','gif','jpeg','jpg','jif','jfif','jp2','jpx','j2k', 'j2c','fpx','pcd','png');
                        $name=str_replace(' ','_',$name);
                        if(isset($name))
            			{
            				if(!empty($name) and in_array($ext,$compare))
            				{
            				    $location='upload_notes/';
        						if(file_exists($location.$name))
        						{
        							$l=3;
        							$c='abcdefghijklmnopqrstuvwxyz';
        							$name='';
        							for($i=0;$i<=$l;$i++)
        							{
        								$name.=$c[rand(0,strlen($c))];
        								}
        								$name=$name.'.'.$ext;
        						}
        						if(move_uploaded_file($tmp_name,$location.$name))
        						{
        							$loc_file=$location.$name;
        							$query="insert into slider(path) values('$loc_file')";
        							mysql_query($query);
                                    if(mysql_affected_rows())
                                    {
                                        echo '<div class="alert alert-success">File Uploaded Successfully.</div>';
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger">Some Error Occur During upload.</div>';
                                    }
                                }
                            }
                          }
                           else
                           {
                                  echo '<div class="alert alert-danger">Please upload png file.</div>';
                           }
                      } 
                      ?>
                       <header class="panel-heading">
                          Slider Image Upload
                          </header>
                         <div class="panel-body">
                              <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                                   
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">File Upload</label>
                                      <div class="col-lg-10">
                                          <input type="file" required="required" name="file" class="form-control">
                                      </div>
                                  </div>                                               
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