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
//===============================================================================
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
//===============================================================================

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
                $("select[name='roomtype_up_pricediscount']").val(data.price_discount);
                $("input[name='roomtype_up_datestart']").val(data.date_start);
                $("input[name='roomtype_up_dateend']").val(data.date_end);
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
//===============================================================================


//ajax giảm giá loại phòng
$(document).ready(function () {
    $("button[name='roomtype_discount']").click(function () {
        var id = 1;
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=room&controller=roomtype&action=add_price_discount', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("select[name='roomtype_pricediscount']").val(data.price_discount);
                $("input[name='roomtype_datestart']").val(data.date_start);
                $("input[name='roomtype_dateend']").val(data.date_end);
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
//===============================================================================

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
//===============================================================================

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
//===============================================================================

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
//===============================================================================
//ajax Cart
$(document).ready(function () {
    $("button[name='cartUpdate']").click(function () {
        var id = $(this).attr('update-cart-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=book_room&action=update_cart', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='cartId']").val(data.id_roomtype);
                $("input[name='cartNumber']").val(data.number_room);
                $("input[name='receiveddate_BookRoom']").val(data.check_in);
                $("input[name='paydate_BookRoom']").val(data.check_out);
                $("input[name='adults_BookRoom']").val(data.number_adults);
                $("input[name='childrens_BookRoom']").val(data.number_childrens);
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});

//================================================================================
//ajax Bill
$(document).ready(function () {
    $("button[name='billUpdate']").click(function () {
        var id = $(this).attr('update-bill-id');
        var data = {id: id};
        var billState;
        console.log(id);
        $.ajax({
            url: '?mod=bill&action=update', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='billId']").val(data.id);
                $("p[name='billName']").text(data.name);
                $("p[name='billTotal']").text(data.total);
                billState = data.state;
                $("#billState>option[value='" + billState + "']").attr('selected', 'selected');
                $("#billState>option[value!='" + billState + "']").removeAttr('selected');
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
//            error: function (data) {
//                console.log("AJAX ERROR:", data);
//            }
        });
    });
});
//==============================================================================
//ajax Detail_Bill
$(document).ready(function () {
    $("button[name='detailbillUpdate']").click(function () {
        var id = $(this).attr('update-detailbill-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=bill&controller=detail_bookroom&action=update_detailbill', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='detailbillId']").val(data.id);
                $("input[name='detailbillNumberRoom']").val(data.number_room);
                $("input[name='detailbillCheckIn']").val(data.check_in);
                $("input[name='detailbillCheckOut']").val(data.check_out);
                $("input[name='detailbill_Adults']").val(data.number_adults);
                $("input[name='detailbill_Childrens']").val(data.number_childrens);
                $("input[name='detailbillNumberRoom']").attr('max', data.number_room_empty);
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
//            error: function (data) {
//                console.log("AJAX ERROR:", data);
//            }
        });
    });
});
//======================================================================================
// Sản phẩm
//ajax update room
$(document).ready(function () {
    $("button[name='productUpdate']").click(function () {
        var id = $(this).attr('product-id');
        var data = {id: id};
        //console.log(id);
        $.ajax({
            url: '?mod=product&action=update_product', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='productId']").val(data.id);
                $("input[name='productName']").val(data.name_product);
                $("input[name='productPrice']").val(data.price);
                $("input[name='productNumber']").val(data.number);
                $("input[name='productUnit']").val(data.unit);
//                console.log(roomState);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });


});

//===============================================================================
// SLIDE
//ajax update Slide
$(document).ready(function () {
    $("button[name='slideUpdate']").click(function () {
        var id = $(this).attr('slide_up-id');
        var data = { id: id };
        console.log(id);
        $.ajax({
            url: '?mod=slide&controller=index&action=update_slide', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                console.log(data);
                $("input[name='slide_up_id']").val(data.id_slide);
                $("input[name='slide_del_id']").val(data.id_slide);
                $("input[name='slide_up_datestart']").val(data.date_start);
                $("input[name='slide_up_dateend']").val(data.date_end);
                
            },
            // error: function (xhr, ajaxOptions, thrownError) {
            //     alert(xhr.status);
            //     alert(thrownError);
            // }
            error: function (data) {
                console.log("AJAX ERROR:", data);
            }
        });
    });
});

//===============================================================================
// SLIDE
//ajax delete Slide
$(document).ready(function () {
    $("button[name='slideDelete']").click(function () {
        var id = $(this).attr('del-slide-id');
        var data = { id: id };
        console.log(id);
        $.ajax({
            url: '?mod=slide&controller=index&action=delete_slide', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                console.log(data);
                $("input[name='slide_del_id']").val(data.id_slide);
                
            },
            // error: function (xhr, ajaxOptions, thrownError) {
            //     alert(xhr.status);
            //     alert(thrownError);
            // }
            error: function (data) {
                console.log("AJAX ERROR:", data);
            }
        });
    });
});


    
    
var time = new Date().getTime();
$(document.body).bind("mousemove keypress", function(e) {
    time = new Date().getTime();
});
console.log(time);
var today = new Date();
var time1 = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

function refresh() {
    if(time1 == "11:59:59") {
        //window.location.reload(true);
        var data = {id: 2};
        $.ajax({
            url: '?mod=room&controller=room&action=list_room_checkout', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                console.log(data);
                let a=confirm("Có "+data.number_room+" phòng sắp đến giờ trả phòng! \n Bạn có muốn thông báo đến khách hàng không?");
                if(a){
                    window.location.replace("http://localhost/QuanLyKhachSan1/?mod=room&controller=room&action=room_checkout");
                }
                //console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });

    }
        
    else {
        today = new Date();
        time1 = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        setTimeout(refresh, 10);
        //console.log(time1);
    }
        
}

setTimeout(refresh, 10);

//===============================================================================
// room_checkout
//Xem danh sách phòng sắp trả
$(document).ready(function () {
    $("button[name='info_room']").click(function () {
        var id_book_room = $(this).attr('info-bookrom-id');
        var data = { id_book_room: id_book_room };
        //console.log(id);
        $.ajax({
            url: '?mod=room&controller=room&action=list_room_checkout', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                //console.log(data.number_room);
                let room_number=data.number_room;
                let count_room_number=room_number.length;
                let html;
                for(let idx=0;idx<count_room_number;idx++){
                    html=html+"<tr><td>"+idx+"</td><td>"+room_number[idx].roomNumber+"</td></tr>";
                }
                
                $("#test_table").html(html);
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});

//===============================================================================
// room_checkout
// Gửi mail cho khách hàng
$(document).ready(function () {
    $("button[name='send_mail']").click(function () {
        var address_email = $(this).attr('email-customer');
        var fullname_email = $(this).attr('fullname-customer');
        var data = { address_email: address_email, fullname_email:fullname_email};
        console.log(data);
        $.ajax({
            url: '?mod=room&controller=room&action=list_room_checkout', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
            //dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                alert(data.alert);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});
