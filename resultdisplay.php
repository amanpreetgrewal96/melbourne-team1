<?php
ob_end_clean();
ini_set('display_errors', 0);
while (ob_get_level())
ob_end_clean();
//header("Content-Encoding: None", true);

?>
<?php 
ob_start();
session_start();
//echo "test";
require("fpdf/fpdf.php");
include('include/connection.php');
		
$query="select * from rms_result where enrollment_id='".$_SESSION['s_regno']."'";
$d1=mysqli_query($connection,$query);
$pdf = new FPDF();	
if(mysqli_num_rows($d1)>0)
 {
 while($data=mysqli_fetch_array($d1))
 {

	
$pdf->AddPage();
$pdf->Image('img/result.jpg',0,0,211);
$pdf->SetFont('Times','',12);
//Basic Detail creation
$pdf->Cell(60,50,'',0,1);
$pdf->Cell(60,10,'Class & Sec.',0,0);
$pdf->Cell(60,10,' : '.$data['class'].' / '.$data['section'],0,1);
$pdf->Cell(60,10,'Enrollment_ID',0,0);
$pdf->Cell(60,10,' : '.$data['enrollment_id'],0,1);
$pdf->Cell(60,10,'Name',0,0);
$pdf->Cell(60,10,' : '.$data['name'],0,1);
$pdf->Cell(60,10,'Father Name',0,0);
$pdf->Cell(60,10,' : '.$data['fname'],0,1);
$pdf->Cell(60,10,'Session',0,0);
$pdf->Cell(60,10,' : '.$data['session'],0,1);

$pdf->Cell(60,10,'',0,1);
//Table creation
$sub=explode(",",$data['subjects']);
$mrk=explode(",",$data['marks']);
//Cell 1

$pdf->SetFont('Times','',10);
$pdf->Cell(30,10,'Sr.No. ',1,0, C);
$pdf->Cell(70,10,'Subjects ',1,0, C);
$pdf->Cell(70,10,'Marks Obtained',1,0, C);

$pdf->Cell(15,10,'',0,1);
for($i=0;$i<count($sub);$i++)
{
//Cell 2

$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,($i+1),1,0, C);
$pdf->Cell(70,10,$sub[$i],1,0, C);
$pdf->Cell(70,10,$mrk[$i],1,0, C);
$pdf->Cell(15,10,'',0,1);
}
 }
 }
 else
 {   
$pdf->AddPage();
$pdf->SetFont('Times','',20);
$pdf->Cell(69,10,'No DATA Available ',1,0, C);
 }
 
$pdf->Output();
ob_end_flush();
?>