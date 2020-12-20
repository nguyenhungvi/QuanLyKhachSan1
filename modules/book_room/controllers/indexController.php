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
    

    //Xử lý ajax them dữ liệu vào cart
    if (isset($_POST['id'], $_POST['count_room'])) {
        $data_add_cart = array(
            'id_roomtype' => $_POST['id'],
            'number_room' => $_POST['count_room']
        );
        add_cart($data_add_cart);
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
    $get_info_cart=get_info_cart();
    $data['get_info_cart'] = $get_info_cart;
    //Xử lý ajax them dữ liệu vào cart
    if (isset($_GET['del-cart-room-type-id'])) {
        $cart_roomtype_id=$_GET['del-cart-room-type-id'];
        delete_cart_room_type_id($cart_roomtype_id);
        
        redirect('?mod=book_room&action=cart');
    }
    load_view('cart',$data);
}
