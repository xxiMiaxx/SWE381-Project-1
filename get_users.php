<?php
include('config/functions.php');
$users_per_page = 10;
if(isset($_GET['b_page']) && trim($_GET['b_page']) != '')
    $p = intval($_GET['b_page']);
else
    $p = 0;
$users_count = count(get_all_members(0, 99999999));
$users = get_all_members($p, $users_per_page);
$x = ['users' => $users, 'count' => $users_count];
echo json_encode($x);
?>