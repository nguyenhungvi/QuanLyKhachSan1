<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction() {
    load('helper', 'state_bill');
    load('lib', 'pagging');
    //Đêm số dòng trên bảng database
    $num_rows = get_num_row("`bookroom`");
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
    $list_bookroom = get_list_bookroom($start, $num_per_page, "");
    //đường dẫn theo từng pagging
    $get_pagging = get_pagging($num_page, $page, "?mod=bill");
    //truyền dữ liệu từ controller qua cho view
    $data['list_bookroom'] = $list_bookroom;
    $data['start'] = $start;
    $data['get_pagging'] = $get_pagging;

    //update_room khi tồn tại nut lưu
    if (isset($_POST['save-update-customer-id'])) {
        update_customerAction();
    }
    load_view('index',$data);
}
