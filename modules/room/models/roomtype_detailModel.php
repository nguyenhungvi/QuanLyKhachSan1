<?php

function get_roomtypedetail_id($id) {
    $result = db_fetch_row("SELECT * FROM `roomdetail` WHERE `room_code`={$id}");
    return $result;
}

function get_roomtypedetail_img_id($id) {
    $result = db_fetch_array("SELECT * FROM `roomdetail_img` WHERE `room_code`={$id}");
    return $result;
}

function insert_info_room_type_detail_image($data){
    db_insert('roomdetail_img', $data);
}

function get_num_row($table,$where){
    $result=db_num_rows("SELECT * FROM {$table} $where ");
    return $result;
}

function insert_info_room_type_detail($data){
    db_insert('roomdetail', $data);
}

function update_room_type_detail($data,$id){
    db_update('roomdetail', $data,"`room_code`={$id}");
}

function delete_room_type_detail_id($id){
    db_delete('roomdetail_img', "`id`={$id}");
}