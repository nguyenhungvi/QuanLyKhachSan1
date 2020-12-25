<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action().'Action';

call_function(array('construct', $action_name));


//Kiểm tra login và 
if(!is_login()&& get_action()!='login'){
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    unset($_SESSION['time_login']);
    unset($_SESSION['role']);
    redirect("?mod=admin&controller=login&action=login");
}