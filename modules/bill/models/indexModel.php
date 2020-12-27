<?php

function get_num_row($label){
    $result=db_num_rows("SELECT * FROM {$label}");
    return $result;
}

function get_list_bookroom($start=0,$num_per_page=6,$where=""){
    if(!empty($where))
        $where="WHERE {$where}";
    $list_customer = db_fetch_array("SELECT id,customer.name,customer.cus_code, total, bookroom.state FROM `bookroom`,`customer` {$where} LIMIT {$start},{$num_per_page}");
    return $list_customer;
}

function get_bookroom_id($id){
    $result= db_fetch_row("SELECT id,customer.name,customer.cus_code, total, bookroom.state FROM `bookroom`,`customer` WHERE bookroom.id={$id} and bookroom.cus_code=customer.cus_code");
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

function delete_room_id($id){
    db_delete('room', "`id`={$id}");
}

function add_room($data){
    db_insert('room', $data);
}
