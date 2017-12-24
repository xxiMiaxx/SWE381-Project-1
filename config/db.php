<?php
define("DB_HOST","localhost");
define("DB_USER",'root');
define("DB_PASS",''); 
define("DB_NAME",'h2');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
    die("Error with connection: " . mysqli_connect_error());
}

// execute sql or insert for example or delete table ... and so on
function executeSql($sql){
    global $con;
   mysqli_query($con,$sql);
}


function selectSql($sql){

    global $con;
    $results = mysqli_query($con,$sql);  
    // echo var_dump($results);
      if(mysqli_num_rows($results) > 0){
        for ($set = array (); $row = mysqli_fetch_assoc($results); $set[] = $row);
        return $set;
    }
    else
        return false;
}



executeSql('SET foreign_key_checks = 0');
?>