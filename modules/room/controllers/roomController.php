<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
    load_model('room');
    load('lib', 'validation');
    load('lib', 'email');
}

function indexAction() {
    echo "Không tìm thấy trang bạn tìm. Vui lòng click <a href='?'>Vào đây</a> để quay lại trang chủ";
}

function list_roomAction() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    load('helper', 'format');
    load('lib', 'pagging');
    //Đêm số dòng trên bảng database
    $num_rows = get_num_row("`room`");
    //Số lượng bảng ghi trên bảng
    $num_per_page = 6;
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
    $list_room_type = get_list_room_type();
    $data['list_room_type'] = $list_room_type;


    //update_room khi tồn tại nut lưu
    if (isset($_POST['save-update-room-id'])) {
        update_roomAction();
    }
    //delete_room_id khi có tồn tại nút yes
    if (isset($_POST['btn-delete-room'])) {
        delete_roomAction();
    }
    //add_room khi tồn tại nút lưu của thêm phòng
    if (isset($_POST['save-add-room-id'])) {
        add_roomAction();
    }

    if (isset($_POST['load_state'])) {
        // Kiểm tra các phòng nào đã đặt, đang ở
        // check_in <=ngày hiện tại, ngày hiện tại <=check out
        // để trang thái phòng đã đặt = 1
        $data_room_dang_o=get_list_room_dang_o_today();
        foreach($data_room_dang_o as $room){
            $data_room = array(
                'state' => 1
            );
            update_state_room($data_room,$room['room_id']);
        }

        // xét 12h đến 2h nếu khách hàng đã trả phòng và thanh toán
        // Lấy tát cả các phòng có ngày check_out== ngày hôm nay và trạng thái đá thanh toán
        $data_room_check_out=get_list_room_check_out_today();
        // Xét 11:59 < h hiện tại && h hiện tại < 13:59
        // Chuyển trạng thái phòng = 3

        $dated=date('H:i:s');
        if("11:59:59"<=date('H:i:s')&&date('H:i:s')<=("13:59:59")){
        foreach($data_room_check_out as $room){
                $data_room = array(
                    'state' => 2
                );
                update_state_room($data_room,$room['room_id']);
        }
        }else if("14:00:00"<=date('H:i:s')){
            foreach($data_room_check_out as $room){
                $data_room = array(
                    'state' => 0
                );
                update_state_room($data_room,$room['room_id']);
        }
        }
        if (isset($_GET['page'])) {
            redirect("?mod=room&controller=room&action=list_room&page={$_GET['page']}");
        } else {
            redirect("?mod=room&controller=room&action=list_room");
        }
    }
    load_view('room', $data);
}

function update_roomAction() {
    if (isset($_POST['save-update-room-id'])) {
        $room_id = $_POST['roomId'];
        $data = array(
            'roomNumber' => $_POST['roomNumber'],
            'typeCode' => $_POST['roomType'],
            'state' => $_POST['roomState']
        );
        update_info_room_id($data, $room_id);
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

function delete_roomAction() {
    if (isset($_POST['btn-delete-room'])) {
        $id = $_POST['roomId'];
        delete_room_id($id);
        redirect("?mod=room&controller=room&action=list_room");
    }
}

function add_roomAction() {
    if (isset($_POST['save-add-room-id'])) {
        $data = array(
            'roomNumber' => $_POST['roomNumber'],
            'typeCode' => $_POST['roomType'],
            'state' => $_POST['roomState']
        );
        add_room($data);
        redirect("?mod=room&controller=room&action=list_room");
    }
}

function list_room_checkoutAction(){
    
    if (isset($_POST['id'])) {
        // Kiểm tra xem có bao nhiêu phòng hôm nay trả phòng
        $count_room_checkout=get_list_room_checkout();
        $result = array(
            'number_room' => $count_room_checkout['number_room'],
        );
        echo json_encode($result);
    }

    if(isset($_POST['id_book_room'])){
        $list_room=get_list_room_check_out($_POST['id_book_room']);
        $result = array(
            'number_room' => $list_room
        );
        
        echo json_encode($result);
    }

    if(isset($_POST['address_email'])){
        $content = "<p>Chào quý khách</p>
                    <p>Quý khách sắp đến giờ trả phòng</p>
                    <p>Quý khách vui lòng thông báo với lễ tân nếu muốn ở thêm</p>
                    <p>Khách sạn ROXANDREA chúc quý khách sức khỏe</p>";
        send_mail($_POST['address_email'], $_POST['fullname_email'], "THÔNG BÁO SẮP HẾT THỜI GIAN Ở KHÁCH SẠN ROXANDREA", $content);
        $result = array(
            'alert' => "Gửi mail thành công"
        );
        
        echo json_encode($result);
    }
}

function room_checkoutAction(){
    // lấy ra tên khách hàng, tên phòng, gmail
    //id bookroom, tên khách hàng, sdt email, số phòng 
    $list_customer_today_checkout=get_list_customer_today_checkout();
    $data['list_customer_today_checkout'] = $list_customer_today_checkout;
    load_view('room_checkout',$data);
}

function room_testAction(){
    
    $content = "<p>Chào bạn</p>
                            <p>Bạn vui lòng click vào đường link này để kích hoạt tài khoản:</p>
                            <p>Nguyễn Hùng Vĩ chúc bạn một ngày vui vẻ.</p>";
    send_mail("minhthuu32@gmail.com", "Minh Thư", "Kích Hoạt Tài Khoản VIP", $content);
}
