<?php ob_start();
session_start();
$d5=$_SESSION['d5'];
if(isset($_POST["export"])) 
{
    $_POST['export']=$_POST["export"];
    switch($_POST["export"])
    {
        case "Save Data" :
        // Submission from
		$filename = $_POST["export"] .".xls";		 
        header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		ExportFile($d5);
		//$_POST["ExportType"] = '';
        exit();        default :
        die("Unknown action : ".$_POST["action"]);
        break;
    }
}
function ExportFile($records) {
	$heading = false;
		if(!empty($records))
		  foreach($records as $row) {
			if(!$heading) {
			  // display field/column names as a first row
			  //echo implode("\t", array_values($row)) . "\n";
			  $heading = true;
			}
			echo implode("\t", array_values($row)) . "\n";
		  }
		exit;
}


?>