<?php

function get_list_detail_bookroom_booking_code($booking_code){
    $result=db_fetch_array("SELECT detailbook.id, `booking_code`, `room_type_id`, detailbook.price, `number_room`, `date_set`, roomtype.name, check_in,check_out,number_adults, number_childrens,((detailbook.price*`number_room`)*(DATEDIFF(check_out, check_in)+1)) as total"
            . " FROM `detailbook`,`roomtype`"
            . " WHERE detailbook.booking_code={$booking_code} and detailbook.room_type_id=roomtype.id");
    return $result;
}

//update laijdetail book
function update_info_detail_bookroom($data,$id){
    db_update('detailbook', $data,"`id`={$id}");
}


//lấy tổng tiền của tất cả chi tiết hóa đơn theo từng hóa đơn
function get_total_money_detail_book($id){
    $result= db_fetch_row("SELECT SUM(A.total) as total_money FROM (SELECT ((detailbook.price*`number_room`)*(DATEDIFF(check_out, check_in)+1)) as total FROM `detailbook` WHERE booking_code={$id} GROUP BY room_type_id) AS A");
    return $result;
}

function update_info_bill($data,$id){
    db_update('bookroom', $data,"`id`={$id}");
}

//Lấy thông tin detail id
function get_info_detailbook_id($id){
    $result= db_fetch_row("SELECT * FROM `detailbook` WHERE id={$id}");
    return $result;
}

//Lấy số phòng còn trống theo loại phòng
function get_number_room_type_id($id){
    $result= db_fetch_row("SELECT COUNT(room.id)AS Number_room FROM `roomtype`,`room` WHERE roomtype.id=room.typeCode and roomtype.id={$id} and room.state=0 GROUP BY room.typeCode");
    return $result;
}
