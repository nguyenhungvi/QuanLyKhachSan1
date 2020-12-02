<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
    load_model('room');
    load('lib', 'validation');
}

function indexAction(){
    
}
function list_roomAction(){
    load('helper', 'format');
    load('lib', 'pagging');
    //Đêm số dòng trên bảng database
    $num_rows = get_num_row("`room`");
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
    $list_rooms = get_list_room($start, $num_per_page, "room.typeCode=roomtype.id");
    //đường dẫn theo từng pagging
    $get_pagging = get_pagging($num_page, $page, "?mod=room&controller=room&action=list_room");
    //truyền dữ liệu từ controller qua cho view
    $data['list_rooms'] = $list_rooms;
    $data['start'] = $start;
    $data['get_pagging'] = $get_pagging;
    //truyền loại phòng từ database vô controller và đẩy qua view
    $list_room_type=get_list_room_type();
    $data['list_room_type']=$list_room_type;
    load_view('room',$data);
}

function update_roomAction(){
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