<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
    load_model('roomtype_detail');
    load('lib', 'validation');
}

function get_detailAction(){
    $id= $_GET['id'];
    $roomtypedetail=get_roomtypedetail_id($id);
    $roomtypedetail_img=get_roomtypedetail_img_id($id);
    $data['roomtypedetail']=$roomtypedetail;
    $data['roomtypedetail_img']=$roomtypedetail_img;
    load_view('roomtype_detail',$data);
}

