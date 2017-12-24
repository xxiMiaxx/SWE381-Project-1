<?php
include('config/functions.php');
if(is_admin()){
    if(isset($_GET['u_id']) && intval($_GET['u_id']) != 0 &&
       isset($_GET['b_id']) && intval($_GET['b_id']) != 0){
        send_noti($_GET['u_id'], $_GET['b_id']);
        echo json_encode(['status' => true, 'msg' => 'sent!']);
    }else{
        echo json_encode(['status' => false, 'msg' => 'Unable to send notification!']);
    }
}else{
    echo json_encode(['status' => false, 'msg' => 'No permissions!']);
}
?>