<?php
include('config/functions.php');
if(my_id()){
    if(isset($_GET['id'])){
    $b_id = $_GET['id'];
    }else{
        die(' no such book!');
        echo "no1";
    }
}else{
    die('you are logged out!');
    echo "no";
}



return_Book($b_id, my_id());
header('Location: userControlPanel.php')

?>
