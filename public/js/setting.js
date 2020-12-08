$(document).ready(function (){
    $("button[name='roomtype_update_price_all']").click(function () {
        $("#roomtype_price[disabled='']").removeAttr("disabled");
        //$("#roomtype_price").attr("enable","");
    });
});

// xử lý js roomtype_detail
var abc=0;
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