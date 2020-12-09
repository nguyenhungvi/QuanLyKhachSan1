$(document).ready(function (){
    $("button[name='roomtype_update_price_all']").click(function () {
        $("#roomtype_price[disabled='']").removeAttr("disabled");
        //$("#roomtype_price").attr("enable","");
    });
});

// xử lý js roomtype_detail
$(document).ready(function(){
   $('#add_file_img').click(function(){
       $('#tamthoi').before($('<li/>',{
           id: 'filedli',
           class:'col-md-4'
       }).fadeIn('slow').append($("<input/>",{
           name: 'roomtypedetail_img[]',
           type: 'file'
       }),$("<br/><br/>")));
   }) ;
});

// lấy id của hình ảnh muốn xóa đưa vô value của roomtypedetail_img_Id trong #custome2
$(document).ready(function () {

    $("button[name='roomtypedetail_img_Delete']").click(function () {
        var id = $(this).attr('del-room-type-detail-img-id');
        $("input[name='roomtypedetail_img_Id']").val(id);
        
    });
});