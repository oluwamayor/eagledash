<?php
//include database configuration file
include 'config.php';

//get records from database
$query = $con->query("SELECT * FROM appointment ORDER BY id DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "appointments_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ID', 'Firstname','Lastname', 'Email', 'Phone', 'Branch', 'Message');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $lineData = array($row['id'], $row['fname'],$row['lname'], $row['email'], $row['phone'], $row['branch'], $row['msg']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>