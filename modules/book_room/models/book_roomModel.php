<?php

function get_info_cart() {
    //Lấy 1 mảng trong database
    $result = db_fetch_array("SELECT `id_roomtype`,roomtype.name,`number_room`,(DATEDIFF(check_out, check_in)+1)AS number_day , roomtype.price,((roomtype.price*`number_room`)*(DATEDIFF(check_out, check_in)+1)) as total_sum,check_out, check_in,number_adults,number_childrens FROM `cart`, `roomtype` WHERE cart.id_roomtype=roomtype.id");
    return $result;
}

//kiem tra co chung minh nhan dan trong database
function get_num_row($from, $where) {
    $result = db_num_rows("SELECT * FROM {$from} WHERE cmnd={$where}");
    return $result;
}

//thêm khách hàng
function add_customer($data) {
    $result = db_insert('customer', $data);
    return $result;
}

//lấy id customer theo cmnd
function get_id_customer($cmnd) {
    $result = db_fetch_row("SELECT * FROM `customer` WHERE cmnd={$cmnd}");
    return $result;
}

// Thêm book_room
function add_book_room($data) {
    $result = db_insert('bookroom', $data);
    return $result;
}

//Thêm detail book room
function add_detail_book_room($data) {
    db_insert('detailbook', $data);
}

//Xóa tất cả đặt phòng trong giỏ hàng
function detete_all_cart($table) {
    db_delete_all($table);
}

?>