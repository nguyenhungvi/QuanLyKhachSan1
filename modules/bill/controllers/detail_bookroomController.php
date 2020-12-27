<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('detail_bookroom');
}

function indexAction() {
    if (isset($_GET['id'])) {
        $list_detail_bookroom = get_list_detail_bookroom_booking_code($_GET['id']);
        $data['list_detail_bookroom'] = $list_detail_bookroom;
    }
    if (isset($_POST['btn-save-update-number-room'])) {
        $id = $_POST['idDetailBookRoom'];
        $data_detail_bookroom = array(
            'number_room' => $_POST['numberDetailBookRoom']
        );
        update_info_detail_bookroom($data_detail_bookroom, $id);
        //sau khi update số phòng chuyển sang update lại cái bookroom
        $bookroom_id = get_bookroom($_GET['id']);
        //===========================
        //tính tổng ngày ở
        $first_date = strtotime($bookroom_id['received_date']);
        $second_date = strtotime($bookroom_id['pay_date']);
        $datediff = abs($first_date - $second_date);
        //Số ngày ở
        $num_day = floor(($datediff / (60 * 60 * 24)) + 1);
        //tổng tiền 1 ngày
        $tong_tien_1_ngay = get_sum_money_one_day($_GET['id']);
        //echo $tong_tien_1_ngay;
        //tổng tiền nhìu ngày
        $sum_money_many_day = $tong_tien_1_ngay['Sum_money'] * $num_day;
        $data_bill = array(
            'total' => $sum_money_many_day,
        );
        update_info_bill($data_bill, $_GET['id']);
        //===========================
        if (isset($_GET['page'])) {
            redirect('?mod=bill&controller=detail_bookroom&id=' . $_GET['id'] . '&' . $_GET['page']);
        } else {
            redirect('?mod=bill&controller=detail_bookroom&id=' . $_GET['id']);
        }
    }
    load_view('detail_bookroom', $data);
}
