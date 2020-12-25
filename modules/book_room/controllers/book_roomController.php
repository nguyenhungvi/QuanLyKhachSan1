<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('book_room');
}

function indexAction() {
    //Lấy thông tin trong giỏ hàng
    $get_info_cart = get_info_cart();
    $data['get_info_cart'] = $get_info_cart;
//    if (isset($_POST['btn-book-room'])) {
//        $data_book_room = array(
//            'cus_code' => 1,
//            'received_date' => $_POST['receiveddate_BookRoom'],
//            'pay_date' => $_POST['paydate_BookRoom'],
//            'total' => 1,
//            'number_adults' => $_POST['adults_BookRoom'],
//            'number_children' => $_POST['children_BookRoom']
//        );
//        $id_bookroom = add_book_room($data_book_room);
//        echo $id_bookroom;
//    }
    if (isset($_POST['btn-book-room'])) {
        //tính tổng tiền
        $first_date = strtotime($_POST['receiveddate_BookRoom']);
        $second_date = strtotime($_POST['paydate_BookRoom']);
        $datediff = abs($first_date - $second_date);
        //Số ngày ở
        $num_day = floor(($datediff / (60 * 60 * 24)) + 1);
        //Lấy tổng tiền của các phòng trong 1 ngày
        $sum_money_one_day = 0;
        foreach ($get_info_cart as $info_cart) {
            $sum_money_one_day = $sum_money_one_day + $info_cart['total_sum'];
        }
        //tổng tiền cho many day
        $sum_money_many_day = $sum_money_one_day * $num_day;

        if (empty($_POST['receiveddate_BookRoom'] || $_POST['paydate_BookRoom'])) {
            echo '<script language="javascript">';
            echo "alert('Ngày đặt phòng và Ngày trả phòng không được để trống')";  //not showing an alert box.
            echo '</script>';
        } else {
            if (get_num_row("`customer`", $_POST['cmnd_BookRoom']) == 0) {
                // thêm khách hàng
                $data_customer = array(
                    'name' => $_POST['name_BookRoom'],
                    'phone' => $_POST['phone_BookRoom'],
                    'address' => $_POST['address_BookRoom'],
                    'cmnd' => $_POST['cmnd_BookRoom'],
                    'email' => $_POST['email_BookRoom'],
                );
                //lấy id customer truyền vô database book room
                $id_customer = add_customer($data_customer);

                //Thêm book_room
                $data_book_room = array(
                    'cus_code' => $id_customer,
                    'received_date' => $_POST['receiveddate_BookRoom'],
                    'pay_date' => $_POST['paydate_BookRoom'],
                    'total' => $sum_money_many_day,
                    'number_adults' => $_POST['adults_BookRoom'],
                    'number_children' => $_POST['children_BookRoom']
                );
                //lấy id book room truyền vô database bảng detail book room
                $id_bookroom = add_book_room($data_book_room);

                //thêm detail book room
                //chạy vòng lap for để thêm từng loại phòng vô trong ảng có cùng book room
                foreach ($get_info_cart as $info_cart) {
                    $data_detail_book_room = array(
                        'booking_code' => $id_bookroom,
                        'room_code' => $info_cart['id_roomtype'],
                        'price' => $info_cart['price'],
                        'number_room' => $info_cart['number_room'],
                        'date_set' => date("Y-m-d"),
                    );
                    add_detail_book_room($data_detail_book_room);
                }

                detete_all_cart('cart');
                redirect("?mod=book_room");
            } else {
                //lấy id customer truyền vô database book room
                $id_customer = get_id_customer($_POST['cmnd_BookRoom']);

                //Thêm book_room
                $data_book_room = array(
                    'cus_code' => $id_customer['cus_code'],
                    'received_date' => $_POST['receiveddate_BookRoom'],
                    'pay_date' => $_POST['paydate_BookRoom'],
                    'total' => $sum_money_many_day,
                    'number_adults' => $_POST['adults_BookRoom'],
                    'number_children' => $_POST['children_BookRoom']
                );
                //lấy id book room truyền vô database bảng detail book room
                $id_bookroom = add_book_room($data_book_room);

                //thêm detail book room
                //chạy vòng lap for để thêm từng loại phòng vô trong ảng có cùng book room
                foreach ($get_info_cart as $info_cart) {
                    $data_detail_book_room = array(
                        'booking_code' => $id_bookroom,
                        'room_code' => $info_cart['id_roomtype'],
                        'price' => $info_cart['price'],
                        'number_room' => $info_cart['number_room'],
                        'date_set' => date("Y-m-d"),
                    );
                    add_detail_book_room($data_detail_book_room);
                }

                detete_all_cart('cart');
                redirect("?mod=book_room");
            }
        }
    }

    load_view('book_room', $data);
}
