<?php

function get_list_room_type(){
    //Lấy 1 mảng trong database
    $result= db_fetch_array("SELECT roomtype.id,roomtype.name,COUNT(room.id)as count_room FROM `room`,`roomtype` WHERE room.typeCode=roomtype.id and state='0' GROUP BY room.typeCode");
    return $result;
}

