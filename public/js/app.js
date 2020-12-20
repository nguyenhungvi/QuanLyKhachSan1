// Phòng
//ajax update room
$(document).ready(function () {
    $("button[name='roomUpdate']").click(function () {
        var id = $(this).attr('room-id');
        var data = {id: id};
        var roomType;
        var roomState;
        //console.log(id);
        $.ajax({
            url: '?mod=room&controller=room&action=update_room', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='roomId']").val(data.id);
                $("input[name='roomNumber']").val(data.roomNuber);
//                CKEDITOR.instances['roomDescription'].setData(data.description);
                roomType = data.typeCode;
                $("#roomType>option[value='" + roomType + "']").attr('selected', 'selected');
                $("#roomType>option[value!='" + roomType + "']").removeAttr('selected');
                roomState = data.state;
                $("#roomState>option[value='" + roomState + "']").attr('selected', 'selected');
                $("#roomState>option[value!='" + roomState + "']").removeAttr('selected');
                console.log(roomState);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });


});

//ajax delete room
$(document).ready(function () {

    $("button[name='roomDelete']").click(function () {
        var id = $(this).attr('del-room-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=room&controller=room&action=update_room', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='roomId']").val(data.id);
                $("#roomNumber_del").html("<strong>" + data.roomNuber + "</strong>");
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

});

//Loại Phòng
//ajax update_loạiphong
$(document).ready(function () {
    $("button[name='roomtypeUpdate']").click(function () {
        var id = $(this).attr('update-room-type-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=room&controller=roomtype&action=update_room_type', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='roomtypeId']").val(data.id);
                $("input[name='roomtypeName']").val(data.name);
                $("input[name='roomtypePrice']").val(data.price);
//                //CKEDITOR.instances['room_type_Description'].setData(data.description);
                console.log(data.price);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });


});

//ajax delete_Loại Phòng
$(document).ready(function () {

    $("button[name='roomtypeDelete']").click(function () {
        var id = $(this).attr('del-room-type-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=room&controller=roomtype&action=update_room_type', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='roomtypeId']").val(data.id);
                $("#roomtypeName_del").html("<strong>" + data.name + "</strong>");
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

});

//Customer
//ajax update_customer
$(document).ready(function () {
    $("button[name='customerUpdate']").click(function () {
        var id = $(this).attr('update-customer-id');
        var data = {id: id};
        var customerState;
        console.log(id);
        $.ajax({
            url: '?mod=customer&controller=customer&action=update_customer', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='customerId']").val(data.cus_code);
                $("input[name='customerName']").val(data.name);
                $("input[name='customerCMND']").val(data.cmnd);
                $("input[name='customerPhone']").val(data.phone);
                $("input[name='customerAddress']").val(data.address);
                $("input[name='customerEmail']").val(data.email);
                customerState = data.state;
                $("#customerState>option[value='" + customerState + "']").attr('selected', 'selected');
                $("#customerState>option[value!='" + customerState + "']").removeAttr('selected');
//                //CKEDITOR.instances['room_type_Description'].setData(data.description);
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });


});


//Cart
//ajax create_roomtype_cart
$(document).ready(function () {
    $("button[name='btn-add-roomtype-cart']").click(function () {
        var id = $("#roomType_select option:selected").attr('value');
        //var count_room = $("#roomType_select option:selected").attr('count_room');
        var count_room=$("input[name='count_room']").val();
        console.log(id, count_room);
        var data = {id: id,count_room: count_room};
        $.ajax({
            url: '?mod=book_room&controller=index&action=index', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            dataType: 'text', //html,text, script
            //dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
//                console.log(data.hihi);
                alert("Bạn đã thêm vào giỏ hàng thành công.");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});

//ajax delete_Loại Phòng_Cart
$(document).ready(function () {

    $("button[name='cart_roomtypeDelete']").click(function () {
        var id = $(this).attr('del-cart-room-type-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=book_room&action=cart', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            dataType: 'text', //html,text, script
            //dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

});