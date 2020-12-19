<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('book_room');
}

function indexAction() {
    $get_list_room_type=get_list_room_type();
    $data['get_list_room_type']=$get_list_room_type;
    load_view('book_room',$data);
}

