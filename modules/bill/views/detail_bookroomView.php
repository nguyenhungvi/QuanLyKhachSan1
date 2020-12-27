<?php
get_header();
get_sidebar();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Quản lý đặt phòng</h1>
            <small>Thông tin chi tiết hóa đơn</small>
        </div>
        <?php
        //show_array($list_detail_bookroom);
        ?>
    </section>
    <!-- Main content -->
    <section class="content content-wp">
        <div class="row">
            <div class="col-sm-12">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                    <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Xuất dữ liệu</button>
                    <ul class="dropdown-menu exp-drop" role="menu">
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type: 'pdf', pdfFontSize: '7', escape: 'false'});"> 
                                <img src="public/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                        </li>
                    </ul>
                </div>
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover text-center">
                        <thead>
                            <tr class="info">
                                <th class="col-md-1">STT</th>
                                <th class="col-md-3">Loại phòng</th>
                                <th class="col-md-2">Giá phòng</th>
                                <th class="col-md-2">Số lượng phòng</th>
                                <th class="col-md-2">Ngày đặt phòng</th>
                                <th class="col-md-2">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_detail_bookroom)) {
                                $t = 0;
                                //global $room_id;
                                foreach ($list_detail_bookroom as $detail_bookroom) {
                                    $t++;
                                    ?>
                                    <tr>
                                <form method="POST">
                                    <input type="hidden" name="idDetailBookRoom" value="<?php echo $detail_bookroom['id']; ?>" />
                                    <td><?php echo $t; ?></td>
                                    <td><?php echo $detail_bookroom['name']; ?></td>
                                    <td><?php echo $detail_bookroom['price']; ?></td>
                                    <td><input type="number" min="0" value="<?php echo $detail_bookroom['number_room']; ?>" name="numberDetailBookRoom" style="width: 60px;"></td>
                                    <td><?php echo $detail_bookroom['date_set']; ?></td>
                                    <td>
                                        <input type="submit" name="btn-save-update-number-room" class="btn btn-add btn-sm" value="save"/>
                                    </td>
                                </form>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- update Room -->
        <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog w-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Cập nhật hóa đơn</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <!-- Số phòng-->
                                        <div class="col-md-4 form-group">
                                            <!--<input type="hidden" name="customerId" value=""/>-->
                                            <label class="control-label">Tên khách hàng:</label>
                                            <p type="text" name="billName" placeholder="" value="" class="form-control"></p>
                                        </div>
                                        <div class="col-md-4 form-group date form_date">
                                            <input type="hidden" name="billId" value=""/>
                                            <label class="control-label">Ngày nhận phòng:</label>
                                            <!--<input type="text" name="billReceived_date" placeholder="" value="" class="form-control">-->
                                            <input type="datetime" id='received-date' name="receiveddate_BookRoom"  class="form-control years" style="position: relative;" value=""/><i class="fa fa-calendar" style="position: absolute;top: 30px;right: 30px;"></i>
                                        </div>
                                        <div class="col-md-4 form-group date form_date">
                                            <label class="control-label">Ngày trả phòng</label>
                                            <!--<input type="text" name="billPay_date" placeholder="" value="" class="form-control">-->
                                            <input type="datetime" id='pay-date' name="paydate_BookRoom" class="form-control years" style="position: relative;"/><i class="fa fa-calendar" style="position: absolute;top: 30px;right: 30px;"></i>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Tổng tiền:</label>
                                            <p type="text" name="billTotal" placeholder="" value="" class="form-control"></p>
                                        </div>
                                        <!--Trạng thái-->
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Trạng thái:</label>
                                            <select class="form-control" name="billState" id="billState">
                                                <option value="0">Chưa thanh toán</option>
                                                <option value="1">Đã thanh toán</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-update-bill-id" class="btn btn-add btn-sm" value="Save"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!--Thiết kế phân trang-->
    </section>
    <div class="clearfix"></div>
    <!-- /.content -->
</div>
<?php
get_footer();
?>