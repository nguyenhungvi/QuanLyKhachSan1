<?php
get_header();
get_sidebar();
?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-home"></i>
        </div>
        <div class="header-title">
            <h1>Quản lý đặt phòng</h1>
            <small>Đặt phòng</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-4">
                <div class="panel lobidisable panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Chọn loại phòng</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form>
                            <!--Ngày đặt phòng-->
                            <div class="form-group">
                                <label>Ngày đặt phòng</label>
                                <div class=" input-group date form_date">
                                    <input id='minMaxExample' type="text" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                </div>
                            </div>
                            <!--Ngày trả phòng-->
                            <div class="form-group">
                                <label>Ngày trả phòng</label>
                                <div class=" input-group date form_date">
                                    <input id='minMaxExample' type="text" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                </div>
                            </div>
                            <!--Loại phòng-->
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <!--<input type="text" class="form-control" placeholder="Nhập loại phòng" required>-->
                                <select class="form-control" name="roomType" id="roomType_select">
                                    <?php
                                    foreach ($get_list_room_type as $room_type) {
                                        ?>
                                        <option value="<?php echo $room_type['id']; ?>" count_room="<?php echo $room_type['count_room']; ?>"><?php echo $room_type['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--Số lượng-->
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" name="count_room" min="0" max="" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-add"><i class="fa fa-check"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="panel lobidisable panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Số lượng phòng theo loại phòng</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>Loại phòng</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($get_list_room_type as $room_type) {
                                        ?>
                                        <tr>
                                            <td><?php echo $room_type['name'];?></td>
                                            <td><?php echo $room_type['count_room']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php
get_footer();
?>

