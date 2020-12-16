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
            <h1>Khách hàng</h1>
            <small>Danh sách khách hàng</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content content-wp">
        <div class="row">
            <div class="col-sm-12">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                    <div class="buttonexport" id="buttonlist"> 
<!--                        <a class="btn btn-add" href="?mod=room&action=add"> <i class="fa fa-plus"></i> Thêm phòng
                        </a> -->
                        <button type="button" name="roomAdd" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer3" room-id=""><i class="fa fa-plus"></i>Thêm khách hàng</button>
                    </div>
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
                                <th class="col-md-1">Số điện thoại</th>
                                <th class="col-md-3">Địa chỉ</th>
                                <th class="col-md-1">CMND</th>
                                <th class="col-md-2">Email</th>
                                <th class="col-md-1">Trạng thái</th>
                                <th class="col-md-1">Chỉnh sửa</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_customer)) {
                                $t = $start;
                                //global $room_id;
                                foreach ($list_customer as $customers) {
                                    $t++;
                                    ?>
                                    <tr>
                                        <td><?php echo $t; ?></td>
                                        <td><?php echo $customers['name']; ?></td>
                                        <td><?php echo $customers['phone']; ?></td>
                                        <td><?php echo $customers['address']; ?></td>
                                        <td><?php echo $customers['cmnd']; ?></td>
                                        <td><?php echo $customers['email']; ?></td>
                                        <td><?php echo $customers['state']; ?></td>
<!--                                        <td><?php
//                                            if ($room['state'] == 0) {
//                                                echo "<span class='label-warning label label-default'>Còn trống</span>";
//                                            } elseif ($room['state'] == 1) {
//                                                echo "<span class='label-custom label label-default'>Đã đặt</span>";
//                                            }
                                            ?></td>-->
                                        <td>
                                            <button type="button" name="customerUpdate" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1" update-customer-id="<?php echo $customers['cus_code']; ?>"><i class="fa fa-pencil"></i></button>
                                            <button type="button" name="customerDelete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2" del-customer-id="<?php echo $customers['cus_code']; ?>"><i class="fa fa-trash-o"></i> </button>
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
        <!-- add Room -->
        <div class="modal fade" id="customer3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog w-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Thêm khách hàng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <!-- Số phòng-->
                                        <div class="col-md-4 form-group">
<!--                                            <input type="hidden" name="roomId" value=""/>-->
                                            <label class="control-label">Tên khách hàng:</label>
                                            <input type="text" name="customerName" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
<!--                                            <input type="hidden" name="roomId" value=""/>-->
                                            <label class="control-label">Số điện thoại:</label>
                                            <input type="text" name="customerPhone" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
<!--                                            <input type="hidden" name="roomId" value=""/>-->
                                            <label class="control-label">Địa chỉ:</label>
                                            <input type="text" name="customerAddress" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
<!--                                            <input type="hidden" name="roomId" value=""/>-->
                                            <label class="control-label">CMND:</label>
                                            <input type="text" name="customerCMND" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
<!--                                            <input type="h  idden" name="roomId" value=""/>-->
                                            <label class="control-label">Email:</label>
                                            <input type="text" name="customerEmail" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Trạng thái:</label>
                                            <select class="form-control" name="roomState" id="roomState">
                                                <option value="0">Còn trống</option>
                                                <option value="1">Đã đặt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-add-room-id" class="btn btn-add btn-sm" value="Save"/>
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
        <!-- update Room -->
        <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog w-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Cập nhật khách hàng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <!-- Số phòng-->
                                        <div class="col-md-4 form-group">
                                            <input type="hidden" name="customerId" value=""/>
                                            <label class="control-label">Tên khách hàng:</label>
                                            <input type="text" name="customerName" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Số điện thoại:</label>
                                            <input type="text" name="customerPhone" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Địa chỉ</label>
                                            <input type="text" name="customerAddress" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">CMND:</label>
                                            <input type="text" name="customerCMND" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Email:</label>
                                            <input type="text" name="customerEmail" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Trạng thái:</label>
                                            <select class="form-control" name="roomState" id="roomState">
                                                <option value="0">Còn trống</option>
                                                <option value="1">Đã đặt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-update-customer-id" class="btn btn-add btn-sm" value="Save"/>
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
        <!-- Modal -->    
        <!-- delete Room -->
        <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Xóa phòng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <div class="col-md-12 form-group user-form-group">
                                            <label class="control-label">Bạn có chắc chắn muốn xóa phòng: <span id="roomNumber_del"></span></label>
                                            <div class="pull-right">
                                                <input type="hidden" name="roomId" value=""/>
                                                <input type="button" class="btn btn-danger btn-sm"  data-dismiss="modal" value="NO"/>
                                                <input type="submit" name="btn-delete-room" class="btn btn-add btn-sm" value="YES"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
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