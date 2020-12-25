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
            <small>Thông tin hóa đơn</small>
        </div>
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
                                <th class="col-md-2">Tên khách hàng</th>
                                <th class="col-md-2">Ngày nhận phòng</th>
                                <th class="col-md-2">Ngày trả phòng</th>
                                <th class="col-md-2">Tổng tiền</th>
                                <th class="col-md-2">Trạng thái</th>
                                <th class="col-md-1">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_bookroom)) {
                                $t = $start;
                                //global $room_id;
                                foreach ($list_bookroom as $bookroom) {
                                    $t++;
                                    ?>
                                    <tr>
                                        <td><?php echo $t; ?></td>
                                        <td><?php echo $bookroom['cus_code']; ?></td>
                                        <td><?php echo $bookroom['received_date']; ?></td>
                                        <td><?php echo $bookroom['pay_date']; ?></td>
                                        <td><?php echo $bookroom['total']; ?></td>
                                        <td><span class="<?php echo color_state_Bill($bookroom['state']); ?>"><?php echo state_Bill($bookroom['state']); ?></span></td>
                                        <td>
                                            <button type="button" name="billUpdate" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1" update-customer-id="<?php echo $bookroom['id']; ?>"><i class="fa fa-pencil"></i></button>
                                        </td>
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
                                            <input type="text" name="billName" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="hidden" name="billId" value=""/>
                                            <label class="control-label">Ngày nhận phòng:</label>
                                            <input type="text" name="billReceived_date" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Ngày trả phòng</label>
                                            <input type="text" name="billPay_date" placeholder="" value="" class="form-control">
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
    <?php
    echo $get_pagging;
    ?>
    <div class="clearfix"></div>
    <!-- /.content -->
</div>
<?php
get_footer();
?>