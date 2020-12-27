<?php

function get_list_detail_bookroom_booking_code($booking_code){
    $result=db_fetch_array("SELECT detailbook.id, `booking_code`, `room_type_id`, detailbook.price, `number_room`, `date_set`, roomtype.name, check_in,check_out,number_adults, number_childrens"
            . " FROM `detailbook`,`roomtype`"
            . " WHERE detailbook.booking_code={$booking_code} and detailbook.room_type_id=roomtype.id");
    return $result;
}

function update_info_detail_bookroom($data,$id){
    db_update('detailbook', $data,"`id`={$id}");
}

//lấy bookroom theo id
function get_bookroom($id){
    $result=db_fetch_row("SELECT * FROM `bookroom`");
    return $result;
}

//lấy tổng tiền 1 ngày theo hóa đơn
function get_sum_money_one_day($id){
    $result= db_fetch_row("SELECT SUM(price*number_room) AS Sum_money FROM `detailbook` WHERE booking_code={$id}");
    return $result;
}

function update_info_bill($data,$id){
    db_update('bookroom', $data,"`id`={$id}");
}

