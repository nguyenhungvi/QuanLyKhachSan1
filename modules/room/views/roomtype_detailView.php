<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-home"></i>
        </div>
        <div class="header-title">
            <h1>Chi tiết phòng</h1>
            <small>Danh sách loại phòng</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content content-wp">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group">
                    <div class="buttonexport" id="buttonlist"> 
                        <button type="button" name="roomtypedetail_update" class="btn btn-add btn-sm" data-toggle="modal" room-id=""><i class="fa fa-pencil-square-o"></i> Cập nhật chi tiết phòng</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <?php
//                            show_array($roomtypedetail);
//                            show_array($roomtypedetail_img);
                            ?>
                            <fieldset>

                                <!-- Số phòng-->
                                <div class="col-md-4 form-group">
                                    <input type="hidden" name="roomtypedetailAcre" value=""/>
                                    <label class="control-label">Diện Tích:</label>
                                    <input type="text" name="roomtypeName" placeholder="" value="<?php echo $roomtypedetail['dientich'] ?>" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Hướng phòng:</label>
                                    <input type="text" name="roomtypedetailDirection" placeholder="" value="<?php echo $roomtypedetail['huongphong'] ?>" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Giường:</label>
                                    <input type="number" min="1" name="roomtypedetailBed" placeholder="" value="<?php echo $roomtypedetail['giuong'] ?>" class="form-control">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="control-label">Hình ảnh:</label>
                                    <ul>
                                        <?php
                                        if (!empty($roomtypedetail_img)) {
                                            foreach ($roomtypedetail_img as $img) {
                                                ?>
                                                <li class="col-md-4"><img class="roomtypedetail_image" src="http://localhost/Backend/DoAn/QuanLyKhachSan1/public/images/room/<?php echo $img['image']; ?>"/> </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="control-label">Thêm hình ảnh:</label>
                                    <ul>
                                        <div id="tamthoi"></div>
                                    </ul>
                                </div>
                                <div class="col-md-6 form-group user-form-group text-center">
                                    <input type="button" name="add_file_img" id="add_file_img" class="btn btn-warning btn-sm" value="Thêm file mới" style="width: 50%;"/>
                                </div>
                                <div class="col-md-6 form-group user-form-group text-center">
                                    <input type="submit" name="save-update-room-type-id" class="btn btn-add btn-sm" value="Save" style="width: 50%;"/>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="clearfix"></div>
    <!-- /.content -->
</div>
<?php
get_footer();
?>

