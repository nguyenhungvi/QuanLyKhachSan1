<?php
get_header();
get_sidebar();
?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header clearfix">
        <div class="fl-left">
            <div class="header-icon">
                <i class="fa fa-home"></i>
            </div>
            <div class="header-title">
                <h1>Quản lý đặt phòng</h1>
                <small>Thông tin giỏ hàng</small>
            </div>
        </div>
        <!--CART-->
        <div class="fl-right cart-icon">
            <a href="?mod=book_room&action=cart" title="" id="btn-cart">
                <span class="hvr-buzz-out fa fa-cart-plus">
                    <span class="label label-primary num-order-cart"><?php
                        if (empty($get_number_room_cart['sum_number_room'])) {
                            echo 0;
                        }echo $get_number_room_cart['sum_number_room'];
                        ?></span>
                </span>
            </a>
        </div>
        <!--END CART-->

    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content content-wp">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover text-center">
                        <thead>
                            <tr class="info">
                                <th class="col-md-1">STT</th>
                                <th class="col-md-3">Tên loại phòng</th>
                                <th class="col-md-2">Hình ảnh</th>
                                <th class="col-md-1">Giá($)</th>
                                <th class="col-md-2">Số lượng</th>
                                <th class="col-md-2">Thành tiền</th>
                                <th class="col-md-1">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($get_info_cart)) {
                                $t = 0;
                                foreach ($get_info_cart as $info_room) {
                                    $t++;
                                    ?>
                                    <tr>
                                        <td><p><?php echo $t; ?></p></td>
                                        <td><?php echo $info_room['name']; ?></td>
                                        <td><img src="public/images/room/<?php echo $info_room['image']; ?>" class="img-rounded thumb" alt="User Image" width="" height="100"> </td>
        <!--                                        <td><?php //echo currency_format($room_type['price']);           ?></td>-->
                                        <td><input type="text" value="<?php echo number_format($info_room['price']); ?>" disabled="" class="text-center border-price-roomtype"/></td>
                                        <td><?php echo $info_room['number_room']; ?></td>
                                        <td><?php echo $info_room['total_sum']; ?></td>
                                        <td>
                                            <!--<button type="button" name="cart_roomtypeDelete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2" del-cart-room-type-id="<?php //echo $info_room['id_roomtype']; ?>" title="Xóa loại phòng"><i class="fa fa-trash-o"></i> </button>-->
                                            <a href="?mod=book_room&action=cart&del-cart-room-type-id=<?php echo $info_room['id_roomtype']; ?>" name="cart_roomtypeDelete" class="btn btn-danger btn-sm" del-cart-room-type-id="<?php echo $info_room['id_roomtype']; ?>" title="Xóa loại phòng"><i class="fa fa-trash-o"></i> </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--Xác nhận đặt phòng-->
                    <div class="fl-right">
                        <a href="?mod=book_room&controller=book_room&action=cart" style="font-size: 20px;
                           margin-bottom: 25px;"class="btn btn-add btn-sm" title="Xác nhận đặt phòng"><i class="fa fa-pencil"></i>Xác nhân đặt phòng</a>
                    </div>
                    <!--END Xác nhận đặt phòng-->
                </div>
            </div>
        </div>
        <!-- delete Room -->
<!--        <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <label class="control-label">Bạn có chắc chắn muốn xóa loại phòng này ra khỏi giỏ hàng: <span id="roomtypeName_del"></span></label>
                                            <div class="pull-right">
                                                <input type="hidden" name="roomtypeId" value=""/>
                                                <input type="button" class="btn btn-danger btn-sm"  data-dismiss="modal" value="NO"/>
                                                <input type="submit" name="btn-delete-room-type" class="btn btn-add btn-sm" value="YES"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 /.modal-content 
            </div>
             /.modal-dialog 
        </div>-->
<!--END DELETE-->
    </section>
    <!-- /.content -->
</div>
<?php
get_footer();
?>

