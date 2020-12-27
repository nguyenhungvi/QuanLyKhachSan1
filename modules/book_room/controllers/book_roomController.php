<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('book_room');
}

function indexAction() {
    //Lấy thông tin trong giỏ hàng
    $get_info_cart = get_info_cart();
    $data['get_info_cart'] = $get_info_cart;
    if (isset($_POST['btn-book-room'])) {
        //tổng tiền cho many day
        $sum_money_many_day = 0;
        foreach ($get_info_cart as $info_cart) {
            $sum_money_many_day = $sum_money_many_day + $info_cart['total_sum'];
        }
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
                'total' => $sum_money_many_day,
                'state' => 0
            );
            //lấy id book room truyền vô database bảng detail book room
            $id_bookroom = add_book_room($data_book_room);

            //thêm detail book room
            //chạy vòng lap for để thêm từng loại phòng vô trong ảng có cùng book room
            foreach ($get_info_cart as $info_cart) {
                $data_detail_book_room = array(
                    'booking_code' => $id_bookroom,
                    'room_type_id' => $info_cart['id_roomtype'],
                    'price' => $info_cart['price'],
                    'number_room' => $info_cart['number_room'],
                    'date_set' => date("Y-m-d"),
                    'check_in' => $info_cart['check_in'],
                    'check_out' => $info_cart['check_out'],
                    'number_adults' => $info_cart['number_adults'],
                    'number_childrens' => $info_cart['number_childrens'],
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
                'total' => $sum_money_many_day,
                'state' => 0
            );
            //lấy id book room truyền vô database bảng detail book room
            $id_bookroom = add_book_room($data_book_room);
            //thêm detail book room
            //chạy vòng lap for để thêm từng loại phòng vô trong ảng có cùng book room
            foreach ($get_info_cart as $info_cart) {
                $data_detail_book_room = array(
                    'booking_code' => $id_bookroom,
                    'room_type_id' => $info_cart['id_roomtype'],
                    'price' => $info_cart['price'],
                    'number_room' => $info_cart['number_room'],
                    'date_set' => date("Y-m-d"),
                    'check_in' => $info_cart['check_in'],
                    'check_out' => $info_cart['check_out'],
                    'number_adults' => $info_cart['number_adults'],
                    'number_childrens' => $info_cart['number_childrens'],
                );
                add_detail_book_room($data_detail_book_room);
            }

            detete_all_cart('cart');
            redirect("?mod=book_room");
        }
    }
    load_view('book_room', $data);
}
