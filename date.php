<?php
include('config/functions.php');
if(my_id()){
    $u_id = my_id();
$user = get_memeber_by_id($u_id);
    if($user != false){
  $user = $user[0];
        $currently = get_cur($u_id);
        $history = get_his($u_id);
    }else{
        die('User not found!');
    }
}else{
    die('Page not found!');
}





// $day ='2017-1-12';
//
// // add 30 days to the date above
// $new_date = date('Y-m-d', strtotime($day . " +30 days"));
// echo $new_date;
foreach($currently as $cur){
$date = strtotime("+30 day", strtotime($cur['cur_due']));
$new_date = date('Y-m-d', $date);
update_date($new_date, $cur['b_id']);
}

header('Location: userControlPanel.php');
?>
