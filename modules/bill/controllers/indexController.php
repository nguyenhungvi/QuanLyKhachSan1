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
    $list_bookroom = get_list_bookroom($start, $num_per_page, "bookroom.cus_code=customer.cus_code");
    //đường dẫn theo từng pagging
    $get_pagging = get_pagging($num_page, $page, "?mod=bill");
    //truyền dữ liệu từ controller qua cho view
    $data['list_bookroom'] = $list_bookroom;
    $data['start'] = $start;
    $data['get_pagging'] = $get_pagging;

    //update_bill khi tồn tại nut lưu
    if (isset($_POST['save-update-bill-id'])) {
        updateAction();
    }
    load_view('index', $data);
}

function updateAction() {
    if (isset($_POST['save-update-bill-id'])) {
        $id = $_POST['billId'];
        $data_bill = array(
            'state' => $_POST['billState'],
        );
        update_info_bill($data_bill, $id);
        redirect('?mod=bill');
    }
    if (isset($_POST['id'])) {
        //echo $_POST['id'];
        $bookroom_id = get_bookroom_id($_POST['id']);
        $result = array(
            'id' => $bookroom_id['id'],
            'name' => $bookroom_id['name'],
            'total' => $bookroom_id['total'],
            'state' => $bookroom_id['state'],
        );
        echo json_encode($result);
    }
}
