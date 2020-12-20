<?php

function get_list_room_type(){
    //Lấy 1 mảng trong database
    $result= db_fetch_array("SELECT roomtype.id,roomtype.name,COUNT(room.id)as count_room FROM `room`,`roomtype` WHERE room.typeCode=roomtype.id and state='0' GROUP BY room.typeCode");
    return $result;
}

//lấy tổng số phòng hiện có trong giỏ hàng
function get_number_room_cart(){
    $result=db_fetch_row("SELECT SUM(`number_room`) AS sum_number_room FROM cart");
    return $result;
}

//Thêm vào cart
function add_cart($data){
    db_insert('cart', $data);
}

//Thông tin lấy ra trong cart và loại phòng
function get_info_cart(){
    //Lấy 1 mảng trong database
    $result= db_fetch_array("SELECT `id_roomtype`,roomtype.name,roomtype.image, `number_room` , roomtype.price,(roomtype.price*`number_room`) as total_sum FROM `cart`, `roomtype` WHERE cart.id_roomtype=roomtype.id");
    return $result;
}

//Xóa loại phòng trong giỏ hàng
function delete_cart_room_type_id($id){
    db_delete('cart', "`id_roomtype`={$id}");
}