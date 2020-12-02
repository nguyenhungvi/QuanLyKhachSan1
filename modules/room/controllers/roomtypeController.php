<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
    load_model('roomtype');
    load('lib', 'validation');
}

function indexAction() {
    
}

function list_room_typeAction() {
    load('helper', 'format');
    load('lib', 'pagging');
    //Đêm số dòng trên bảng database
    $num_rows = get_num_row("`roomtype`");
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
    $list_rooms_type = get_list_roomtype($start, $num_per_page);
    //đường dẫn theo từng pagging
    $get_pagging = get_pagging($num_page, $page, "?mod=room&controller=roomtype&action=list_room_type");
    //truyền dữ liệu từ controller qua cho view
    $data['list_rooms_type'] = $list_rooms_type;
    $data['start'] = $start;
    $data['get_pagging'] = $get_pagging;
    
    //update_room khi tồn tại nut lưu
    if(isset($_POST['save-update-room-id'])){
        update_room_typeAction();
    }
    //delete_room_id khi có tồn tại nút yes
    if(isset($_POST['btn-delete-room'])){
        delete_room_typeAction();
    }
    //add_room khi tồn tại nút lưu của thêm phòng
    if(isset($_POST['save-add-room-id'])){
        add_room_typeAction();
    }
    load_view('roomtype', $data);
}

function update_room_typeAction() {
//    if(isset($_POST['save-update-room-id'])){
//        $room_id=$_POST['roomId'];
//        $data=array(
//            'roomNumber'=>$_POST['roomNumber'],
//            'typeCode'=>$_POST['roomType'],
//            'state'=>$_POST['roomState']
//        );
//        update_info_room_id($data,$room_id);
//        redirect("?mod=room&controller=room&action=list_room");
//    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $room_type_id = get_room_type_id($id);
        $result = array(
            'id' => $room_type_id['id'],
            'name' => $room_type_id['name'],
            'price' => $room_type_id['price'],
            'image'=>$room_type_id['image']
        );
        echo json_encode($result);
    }
}

function delete_room_typeAction(){
    if(isset($_POST['btn-delete-room'])){
        $id=$_POST['roomId'];
        delete_room_id($id);
        redirect("?mod=room&controller=room&action=list_room");
    }
}

function add_room_typeAction(){
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
