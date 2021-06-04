<?php
include('../../includes/connection.php');
if( isset( $_POST['submit'] ) ){
    $qry_main = stripcslashes( $_POST['qry'] );
    $table    = $_POST['table'];
    
    if( $_POST['qry'] != '' ){
        $qry = mysql_query( $qry_main ) or die( mysql_error() ); 
    }
   
    $qry2 = mysql_query( "SELECT * FROM $table LIMIT 0, 300" ) or die( mysql_error() );
    while( $qry_rs = mysql_fetch_assoc( $qry2 ) ){
        $records[] = $qry_rs;
    }
        
    if( count( $records ) > 0 ){
        $cnt = 0;
        foreach( $records as $val ){
           $cnt++;
           $data .= '<tr>';
           foreach( $val as $key1 => $val1 ){
              if( $cnt == 1 ){ $header_th .= '<td style="background=#eee">'.$key1.'</td>'; }    
              $data .= '<td>'.$val1.'</td>'; 
           }
           $data .= '</tr>'; 
        }
        $header_data = '<tr>'.$header_th.'</tr>';
        $display_data .= '<table border="1" cellpadding="4">'.$header_data.$data.'</table>';
        
        echo $display_data;
    }
         
}

?>
<br /><hr /><br />
<form method="post">
    Table - <select name="table">
        <option value="">Tables List</option>    
        <?php
		$db=Db_Name;
        $sql = "SHOW TABLES FROM $db";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_row($result)) {
             $selected = '';
             if( $_POST['table'] == $row[0] ) $selected = 'selected="selected"';
             echo '<option '.$selected.' value="'.$row[0].'">'.$row[0].'</option>';       
        }
        ?>
    </select><br /><br />
    <textarea name="qry"><?php echo stripcslashes( $_POST['qry'] ); ?></textarea><br /><br />
    <input type="submit" name="submit"/>
</form>