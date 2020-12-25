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
                <small>Đặt phòng</small>
            </div>
            <?php
            //echo  date("Y-m-d");
            ?>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="panel-body">
                <form method="POST">
                    <div class="col-sm-7">
                        <h3 class="title-book">Thông tin khách hàng</h3>
                        <div class="detail">
                            <div class="field-wl">
                                <label class="lbl-book">Họ và tên</label>
                                <input type="text" name="name_BookRoom" class="input-book"/>
                            </div>
                            <div class="field-wr">
                                <label class="lbl-book">CMND</label>
                                <input type="number" name="cmnd_BookRoom" class="input-book"/>
                            </div>
                            <div class="field-wl">
                                <label class="lbl-book">Số điện thoại</label>
                                <input type="text" name="phone_BookRoom" class="input-book"/>
                            </div>
                            <div class="field-wr">
                                <label class="lbl-book">Email</label>
                                <input type="email" name="email_BookRoom" class="input-book"/>
                            </div>
                            <div class="field-wl">
                                <label class="lbl-book">Số người lớn</label>
                                <input type="number" name="adults_BookRoom" class="input-book"/>
                            </div>
                            <div class="field-wr">
                                <label class="lbl-book">Số trẻ em</label>
                                <input type="number" name="children_BookRoom" class="input-book"/>
                            </div>
                            <div class="">
                                <label class="lbl-book">Địa chỉ</label>
                                <!--<input type="text" class="input-book"/>-->
                                <textarea class="input-book" name="address_BookRoom" style="min-height:130px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <h3  class="title-book">Thông tin đặt phòng</h2>
                            <div class="detail">
                                <div class="field-wl">
                                    <label class="lbl-book">Ngày nhận phòng</label>
                                    <div class=" input-group date form_date">
                                        <input type="text" id='received-date' name="receiveddate_BookRoom"  class="form-control years" /><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                    </div>
                                </div>
                                <div class="field-wr">
                                    <label class="lbl-book">Ngày trả phòng</label>
                                    <div class=" input-group date form_date">
                                        <input type="text" id='pay-date' name="paydate_BookRoom" class="form-control years"/><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                    </div>
                                </div>
                                <?php
                                if (!empty($get_info_cart)) {
//                                    show_array($get_info_cart);
                                    ?>
                                    <table class="shop-table">
                                        <thead>
                                            <tr>
                                                <td>Loại phòng</td>
                                                <td>Tổng<td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tong_ngay = 0;
                                            $tong_tien_1_ngay = 0;
                                            foreach ($get_info_cart as $info_cart) {
                                                $tong_ngay = $tong_ngay + $info_cart['number_room'];
                                                $tong_tien_1_ngay = $tong_tien_1_ngay + $info_cart['total_sum'];
                                                ?>
                                                <tr>
                                                    <td><span><?php echo $info_cart['name']; ?></span><strong> x<span><?php echo $info_cart['number_room']; ?> </span></strong></td>
                                                    <td><?php echo $info_cart['total_sum']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            //$tong_tien_n_ngay=$tong_tien_1_ngay*$tong_ngay;
                                            ?>
                                        <input type="hidden" id="tong_tien_1_ngay" value="<?php echo $tong_tien_1_ngay; ?>"/>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><span>Tổng tiền <span id="tong_ngayss">0</span> ngày:</span></td>
                                            </tr>
                                            <tr>
                                                <td><span><?php echo $tong_tien_1_ngay; ?></span><span> x </span><span id="tong_ngay">0</span></td>
                                                <td><span id="tong_tien_n_ngay">0</span> </td>
                                            </tr>
                                            <tr>

                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="place-order-wp clearfix">
                                        <input type="submit" value="Đặt phòng" name="btn-book-room"/>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php
get_footer();
?>

