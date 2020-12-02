<?php

function get_num_row($label){
    $result=db_num_rows("SELECT * FROM {$label}");
    return $result;
}

function get_list_room($start=0,$num_per_page=6,$where=""){
    if(!empty($where))
        $where="WHERE {$where}";
    $list_rooms = db_fetch_array("SELECT room.id, room.roomNumber,roomtype.name,room.state FROM `room`,`roomtype` {$where} LIMIT {$start},{$num_per_page}");
    return $list_rooms;
}

function get_list_room_type(){
    //Lấy 1 mảng trong database
    $result= db_fetch_array("SELECT * FROM `roomtype`");
    return $result;
}

function get_room_id($id){
    $result= db_fetch_row("SELECT * FROM `room` WHERE `id`={$id}");
    return $result;
}
