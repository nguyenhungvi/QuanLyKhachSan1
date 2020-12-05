<?php

function construct() {
//    echo "Dùng chung, load đầu tiên";
    load_model('room');
    load('lib', 'validation');
}

function get_detailAction(){
    $id= $_GET['id'];
}

