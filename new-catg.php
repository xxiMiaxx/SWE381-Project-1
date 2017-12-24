<?php
include('config/functions.php');

    if(isset($_POST['CategoryName']) && trim($_POST['CategoryName']) != ''){

        $CategoryName = addslashes($_POST['CategoryName']);
      
        if(check_catg($CategoryName) == false){
            die('category already exist');
        }
       

        new_catg($CategoryName);
        header('Location: catgs2.php');

    }else{
        die('Please fill all Fields');
    }

?>