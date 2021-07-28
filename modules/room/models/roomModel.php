<?php

function get_num_row($label) {
    $result = db_num_rows("SELECT * FROM {$label}");
    return $result;
}

function get_list_room($start = 0, $num_per_page = 6, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_rooms = db_fetch_array("SELECT room.id, room.roomNumber,roomtype.name,room.state FROM `room`,`roomtype` {$where} LIMIT {$start},{$num_per_page}");
    return $list_rooms;
}

function get_list_room_type() {
    //Lấy 1 mảng trong database
    $result = db_fetch_array("SELECT * FROM `roomtype`");
    return $result;
}

function get_room_id($id) {
    $result = db_fetch_row("SELECT * FROM `room` WHERE `id`={$id}");
    return $result;
}

function update_info_room_id($data, $id) {
    db_update('room', $data, "`id`={$id}");
}

function delete_room_id($id) {
    db_delete('room', "`id`={$id}");
}

function add_room($data) {
    db_insert('room', $data);
}

//Kiểm tra ngày hôm nay có những phòng nào đc đặt, nếu đặt thì cho phòng đó có trạng thái là đã đặt
function get_list_room_detail_book_room() {
    $result = db_fetch_array("SELECT DISTINCT room.id, room.state
FROM (SELECT detailbook_room.room_id
	FROM `detailbook_room`,`detailbook`
	WHERE detailbook_room.detail_book_id = detailbook.id AND (detailbook.check_in <= CURDATE()) OR (detailbook.check_out >= CURDATE())) AS room_detail_book_room, `room`
WHERE room_detail_book_room.room_id = room.id");
    return $result;
}

function update_room_to_detailbook_room($data,$id){
    db_update('room', $data, "`id`={$id}");
}

//Kiểm tra ngày hôm nay có những phòng nào đc trả, nếu trả thì cho phòng đó có trạng thái là còn trống
function get_list_room_detail_book_room_check_out() {
    $result = db_fetch_array("SELECT DISTINCT room.id, room.state FROM (SELECT detailbook_room.room_id FROM `detailbook_room`,`detailbook` WHERE detailbook_room.detail_book_id = detailbook.id AND (detailbook.check_out < CURDATE() OR detailbook.check_in > CURDATE())) AS room_detail_book_room, `room` WHERE room_detail_book_room.room_id = room.id");
    return $result;
}

// Lấy danh sách phòng có ngày check out ngày hôm nay và trạng thái đã thanh toán
function get_list_room_check_out_today(){
    $result = db_fetch_array("
    SELECT detailbook_room.room_id
    FROM bookroom, detailbook_room, detailbook
    WHERE bookroom.id=detailbook.booking_code AND detailbook.id=detailbook_room.detail_book_id 
        AND bookroom.state=1 AND detailbook.check_out=CURRENT_DATE()");
    return $result;
}

// Cập nhật trạng thái phòng
function update_state_room($data,$id){
    db_update('room', $data, "`id`={$id}");
}

// lấy danh sách ngày hôm nay phòng nào đang ở
function get_list_room_dang_o_today(){
    $result = db_fetch_array("
    SELECT detailbook_room.room_id
    FROM detailbook,detailbook_room 
    WHERE detailbook.id=detailbook_room.detail_book_id AND detailbook.check_in<=CURRENT_DATE() AND CURRENT_DATE()<=detailbook.check_out");
    return $result;
}

// Đếm có bao nhiu phòng hôm nay trả phòng
function get_list_room_checkout(){
    
    $result = db_fetch_row("SELECT COUNT(detailbook_room.room_id) as number_room
    FROM bookroom, detailbook_room, detailbook
    WHERE bookroom.id=detailbook.booking_code AND detailbook.id=detailbook_room.detail_book_id 
        AND detailbook.check_out=CURRENT_DATE()");
    return $result;
}

//Lấy danh sách khách hàng hôm nay cần trả phòng
function get_list_customer_today_checkout(){
    $result = db_fetch_array("
    SELECT customer.cus_code,customer.name,customer.email,customer.phone, book_today.id,book_today.number_room
    FROM customer, (SELECT bookroom.id,bookroom.cus_code,SUM(detailbook.number_room) as number_room
     				FROM bookroom,detailbook
                    WHERE bookroom.id=detailbook.booking_code AND detailbook.check_out=CURRENT_DATE()
                    GROUP BY bookroom.id) as book_today
    WHERE book_today.cus_code=customer.cus_code");
    return $result;
}

// Lấy danh sách phòng hôm nay trả
function get_list_room_check_out($id){
    $result=db_fetch_array("
    SELECT room.roomNumber, detailbook.check_in,detailbook.check_out
    FROM `detailbook_room`,`detailbook`,`room`
    WHERE detailbook.booking_code={$id} AND detailbook_room.detail_book_id=detailbook.id AND detailbook_room.room_id=room.id");
    return $result;
}
