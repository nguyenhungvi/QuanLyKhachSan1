$(document).ready(function () {
    $("button[name='roomtype_update_price_all']").click(function () {
        $("#roomtype_price[disabled='']").removeAttr("disabled");
        //$("#roomtype_price").attr("enable","");
    });
});

// xử lý js roomtype_detail
$(document).ready(function () {
    $('#add_file_img').click(function () {
        $('#tamthoi').before($('<li/>', {
            id: 'filedli',
            class: 'col-md-4'
        }).fadeIn('slow').append($("<input/>", {
            name: 'roomtypedetail_img[]',
            type: 'file'
        }), $("<br/><br/>")));
    });
});

// lấy id của hình ảnh muốn xóa đưa vô value của roomtypedetail_img_Id trong #custome2
$(document).ready(function () {
    $("button[name='roomtypedetail_img_Delete']").click(function () {
        var id = $(this).attr('del-room-type-detail-img-id');
        $("input[name='roomtypedetail_img_Id']").val(id);

    });
});

// lấy count_room của select dc chọn 
$(document).ready(function () {
    $("#roomType_select").change(function () {
        var id = $("#roomType_select option:selected").attr('value');
        var count_room = $("#roomType_select option:selected").attr('count_room');
        //console.log(id);
        $("input[name='count_room']").attr('max', count_room);
    });
});


//Chọn ngày tháng năm
$('#received-date').datepicker({
    uiLibrary: 'bootstrap4',
    dateFormat: "yy-mm-dd"
});

$('#pay-date').datepicker({
    uiLibrary: 'bootstrap4',
    dateFormat: "yy-mm-dd"
});

//Lấy giá trị ngày nhận, ngày trả
//$(document).ready(function () {
//    $("#pay-date").change(function () {
//        var received_date = $("#received-date").val();
//        var pay_date = $("#pay-date").val();
////        $("#received-date").val(received_date);
//        var date1 = new Date(received_date);
//        var date2 = new Date(pay_date);
//        var oneDay = 24 * 60 * 60 * 1000;
//        var diffDays = Math.round(Math.abs(((date1 - date2) / oneDay)) + 1);
//        var tong_tien_trong_1_ngay = $("#tong_tien_1_ngay").val();
//        var tong_tien_trong_n_ngay = tong_tien_trong_1_ngay * parseInt(diffDays, 10);
//        $("#tong_ngayss").text(diffDays);
//        $("#tong_ngay").text(diffDays);
//        $("#tong_tien_n_ngay").text(tong_tien_trong_n_ngay !== 0 ? tong_tien_trong_n_ngay : 0);
//        console.log(pay_date);
//    });
//});


//THỐNG KÊ
//window.onload = function () {
//    var ad=$("input[name='thongke_DoanhThu']").attr('hihi');
//    console.log(ad);
//    var chart = new CanvasJS.Chart("chartContainer", {
//        animationEnabled: true,
//        exportEnabled: true,
//        theme: "light1", // "light1", "light2", "dark1", "dark2"
//        title: {
//            text: "Simple Column Chart with Index Labels"
//        },
//        axisY: {
//            includeZero: true
//        },
//        data: [{
//            type: "column", //change type to bar, line, area, pie, etc
//            //indexLabel: "{y}", //Shows y value on all Data Points
//            indexLabelFontColor: "#5A5757",
//            indexLabelPlacement: "outside",
//            dataPoints: ad
//        }]
//    });
//    chart.render();
//
//    var chart11 = new CanvasJS.Chart("chartContainer1", {
//        animationEnabled: true,
//        exportEnabled: true,
//        title: {
//            text: "Average Expense Per Day  in Thai Baht"
//        },
//        subtitles: [{
//                text: "Currency Used: Thai Baht (฿)"
//            }],
//        data: [{
//                type: "pie",
//                showInLegend: "true",
//                legendText: "{label}",
//                indexLabelFontSize: 16,
//                indexLabel: "{label} - #percent%",
//                yValueFormatString: "฿#,##0",
//                dataPoints: "<?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>"
//            }]
//    });
//    chart11.render();
//}
