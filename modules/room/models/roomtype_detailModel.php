<?php

function get_roomtypedetail_id($id){
    $result= db_fetch_row("SELECT * FROM `roomdetail` WHERE `room_code`={$id}");
    return $result;
}
 function get_roomtypedetail_img_id($id){
    $result= db_fetch_array("SELECT * FROM `roomdetail_img` WHERE `room_code`={$id}");
    return $result;
 }
