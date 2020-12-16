<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
    load_model('customer');
    load('lib', 'validation');
}

function indexAction() {
    
}

function list_customerAction() {
    load('helper', 'format');
    load('lib', 'pagging');
    //Đêm số dòng trên bảng database
    $num_rows = get_num_row("`customer`");
    //Số lượng bảng ghi trên bảng
    $num_per_page = 3;
    //Tổng số bảng ghi
    $total_row = $num_rows;
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    //Tính chỉ số xuất của bản ghi cho từng page
    $page = isset($_GET['page']) ? (int) ($_GET['page']) : 1;
    //Chỉ số bắt đầu chạy
    $start = ($page - 1) * $num_per_page;
    $list_customer = get_list_room($start, $num_per_page, "");
    //đường dẫn theo từng pagging
    $get_pagging = get_pagging($num_page, $page, "?mod=customer&controller=customer&action=list_customer");
    //truyền dữ liệu từ controller qua cho view
    $data['list_customer'] = $list_customer;
    $data['start'] = $start;
    $data['get_pagging'] = $get_pagging;
    
    //update_room khi tồn tại nut lưu
    if(isset($_POST['save-update-customer-id'])){
        update_customerAction();
    }
    //delete_room_id khi có tồn tại nút yes
//    if(isset($_POST['btn-delete-room'])){
//        delete_roomAction();
//    }
    //add_room khi tồn tại nút lưu của thêm phòng
//    if(isset($_POST['save-add-room-id'])){
//        add_roomAction();
//    }
    load_view('customer', $data);
}

function update_customerAction() {
    if(isset($_POST['save-update-customer-id'])){
        $room_id=$_POST['roomId'];
        $data=array(
            'roomNumber'=>$_POST['roomNumber'],
            'typeCode'=>$_POST['roomType'],
            'state'=>$_POST['roomState']
        );
        update_info_room_id($data,$room_id);
        redirect("?mod=room&controller=room&action=list_room");
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $room_id = get_room_id($id);
        $result = array(
            'id' => $room_id['id'],
            'roomNuber' => $room_id['roomNumber'],
            'typeCode' => $room_id['typeCode'],
            'state' => $room_id['state']
        );
        echo json_encode($result);
    }
}

function delete_roomAction(){
    if(isset($_POST['btn-delete-room'])){
        $id=$_POST['roomId'];
        delete_room_id($id);
        redirect("?mod=room&controller=room&action=list_room");
    }
}

function add_roomAction(){
    if(isset($_POST['save-add-room-id'])){
        $data=array(
            'roomNumber'=>$_POST['roomNumber'],
            'typeCode'=>$_POST['roomType'],
            'state'=>$_POST['roomState']
        );
        add_room($data);
        redirect("?mod=room&controller=room&action=list_room");
    }
}
