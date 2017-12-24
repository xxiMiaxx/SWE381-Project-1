<?php
include('config/functions.php');

$time_to_exp = time() + (24 * 60 * 60 * 3);

if(isset($_POST['username']) && trim($_POST['username']) != '' && isset($_POST['password']) && trim($_POST['password']) != ''){

    $logged_in = login($_POST['username'], $_POST['password']);
    if($logged_in !== false){

        if($logged_in[0]['type'] == '0'){
            $panel = './adminDashboard2.php';
            $type = 'admin';
        }

        else{
            $panel = './userControlPanel.php';
            $type = 'user';
        }
        
        if(isset($_POST['remember']) && $_POST['remember'] == '1'){
            setcookie('id', $logged_in[0]['ID'], $time_to_exp, '/');
            setcookie('username', $_POST['username'], $time_to_exp, '/');
            setcookie('password', md5($_POST['password']), $time_to_exp, '/');
            setcookie('panel', $panel, $time_to_exp, '/');
            setcookie('type', $type, $time_to_exp, '/');

        }else{
            
            session_start();
            $_SESSION['id'] = $logged_in[0]['ID'];
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = md5($_POST['password']);
            $_SESSION['panel'] = $panel;
            $_SESSION['type'] = $type;
        }

        $status = ['logged_in' => true, 'panel' => $panel];
    }else{
        $status = ['logged_in' => false, 'msg' => 'Password or email or username not correct'];
    }
}else{
    $status = ['logged_in' => false, 'msg' => 'Please fill all field!'];
}
echo json_encode($status);
?>