<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction() {
    //Lấy danh sách loại phòng mà số phòng trống >0
    $get_list_room_type = get_list_room_type();
    $data['get_list_room_type'] = $get_list_room_type;
    if (empty(get_number_room_cart())) {
        $get_number_room_cart = 0;
    } else {
        $get_number_room_cart = get_number_room_cart();
    }
    $data['get_number_room_cart'] = $get_number_room_cart;
    //===========================================
    //TEST TẠI ĐÂY
//    Kiểm tra ngày nhận hôm nay có bao nhiu phòng trống cho từng loại phòng
    $check_in_now=check_date_now(date("Y-m-d"));
    $data['check_in_now'] = $check_in_now;
    //============================================
    
    //Kiểm tra sự tồn tại nút thêm vào giỏ hàng
    if (isset($_POST['btn-add-roomtype-cart'])) {
        // kiểm tra ngày trả phòng > hơn ngày nhận phòng
        $first_date = strtotime($_POST['checkin_BookRoom']);
        $second_date = strtotime($_POST['checkout_BookRoom']);
        $datediff = $second_date - $first_date;
        //Số ngày ở
        $num_day = floor(($datediff / (60 * 60 * 24)) + 1);
        if ($num_day <= 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Ngày trả phòng không hợp lệ, vui lòng chọn lại')";
            echo "</script>";
        } else {
            //Kiểm tra loại phòng đó đã đặt chưa,nếu rồi alert
            if (check_num_room_type($_POST['roomType'])) {
                echo "<script type='text/javascript'>";
                echo "alert('Loại phòng này đã được đặt, vui lòng vô giỏ hàng để cập nhật')";
                echo "</script>";
            } else {
                $data_add_cart = array(
                    'id_roomtype' => $_POST['roomType'],
                    'number_room' => $_POST['count_room'],
                    'check_in' => $_POST['checkin_BookRoom'],
                    'check_out' => $_POST['checkout_BookRoom'],
                    'number_adults'=>$_POST['adults_BookRoom'],
                    'number_childrens'=>$_POST['childrens_BookRoom']
                );
                add_cart($data_add_cart);
                redirect('?mod=book_room');
            }
        }
    }
    load_view('index', $data);
}

//trang giỏ hàng
function cartAction() {
    //lấy tổng số phòng đặt bỏ vào giỏ hàng
    if (empty(get_number_room_cart())) {
        $get_number_room_cart = 0;
    } else {
        $get_number_room_cart = get_number_room_cart();
    }
    $data['get_number_room_cart'] = $get_number_room_cart;

    // Lấy thông tin giỏ hàng và loại phòng
    $get_info_cart = get_info_cart();
    $data['get_info_cart'] = $get_info_cart;
    //Xử lý xóa
    if (isset($_GET['del-cart-room-type-id'])) {
        $cart_roomtype_id = $_GET['del-cart-room-type-id'];
        delete_cart_room_type_id($cart_roomtype_id);

        redirect('?mod=book_room&action=cart');
    }
    //cập nhật
    if (isset($_POST['save-update-cart-id'])) {
        update_cartAction();
    }
    load_view('cart', $data);
}

//Cập nhật lại giỏ hàng theo id
function update_cartAction() {
    if (isset($_POST['save-update-cart-id'])) {
        //Lấy danh sách loại phòng mà số phòng trống >0
        $get_list_room_type = get_list_room_type_id($_POST['cartId']);
        $num_room = $get_list_room_type['count_room'];
//        echo $num_room;
//        show_array($get_list_room_type);
        if ($_POST['cartNumber'] <= $num_room) {
            // kiểm tra ngày trả phòng > hơn ngày nhận phòng
            $first_date = strtotime($_POST['receiveddate_BookRoom']);
            $second_date = strtotime($_POST['paydate_BookRoom']);
            $datediff = $second_date - $first_date;
            //Số ngày ở
            $num_day = floor(($datediff / (60 * 60 * 24)) + 1);
            if ($num_day <= 0) {
                echo "<script type='text/javascript'>";
                echo "alert('Ngày trả phòng không hợp lệ, vui lòng chọn lại')";
                echo "</script>";
            } else {
                $id_roomtype = $_POST['cartId'];
                $data_cart = array(
                    'number_room' => $_POST['cartNumber'],
                    'check_in' => $_POST['receiveddate_BookRoom'],
                    'check_out' => $_POST['paydate_BookRoom'],
                    'number_adults' => $_POST['adults_BookRoom'],
                    'number_childrens' => $_POST['childrens_BookRoom'],
                );
                update_info_cart_id($data_cart, $id_roomtype);
                redirect("?mod=book_room&action=cart");
            }
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Số lượng phòng còn lại không đủ để bạn đặt. Xin lỗi vì sự bất tiện này.')";
            echo "</script>";
        }
    }
    if (isset($_POST['id'])) {
        //echo $_POST['id'];
        $cart_id = get_info_cart_id($_POST['id']);
        $result = array(
            'id_roomtype' => $cart_id['id_roomtype'],
            'check_in' => $cart_id['check_in'],
            'check_out' => $cart_id['check_out'],
            'number_room' => $cart_id['number_room'],
            'number_adults'=>$cart_id['number_adults'],
            'number_childrens'=>$cart_id['number_childrens']
        );
        echo json_encode($result);
    }
}
