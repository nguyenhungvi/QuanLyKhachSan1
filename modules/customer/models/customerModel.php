<?php

function get_num_row($label){
    $result=db_num_rows("SELECT * FROM {$label}");
    return $result;
}

function get_list_room($start=0,$num_per_page=6,$where=""){
    if(!empty($where))
        $where="WHERE {$where}";
    $list_customer = db_fetch_array("SELECT cus_code,name,phone,address,cmnd,email,state FROM `customer` {$where} LIMIT {$start},{$num_per_page}");
    return $list_customer;
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

function update_info_room_id($data,$id){
    db_update('room', $data,"`id`={$id}");
}

function delete_room_id($id){
    db_delete('room', "`id`={$id}");
}

function add_room($data){
    db_insert('room', $data);
}
