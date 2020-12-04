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
            <h1>Loại Phòng</h1>
            <small>Danh sách loại phòng</small>
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
                        <button type="button" name="roomAdd" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer3" room-id=""><i class="fa fa-plus"></i>Thêm phòng</button>
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
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="info">
                                <th>STT</th>
                                <th>Tên loại phòng</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_rooms_type)) {
                                $t = $start;
                                global $room_id;
                                foreach ($list_rooms_type as $room_type) {
                                    $t++;
                                    ?>
                                    <tr>
                                        <td><?php echo $t; ?></td>
                                        <td><?php echo $room_type['name']; ?></td>
                                        <td><img src="public/images/room/<?php echo $room_type['image']; ?>" class="img-thumbnail" alt="User Image" width="100" height="auto"> </td>
                                        <td><?php echo currency_format($room_type['price']); ?></td>
                                        <td>
                                            <button type="button" name="roomtypeUpdate" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1" update-room-type-id="<?php echo $room_type['id']; ?>" title="Cập nhật loại phòng"><i class="fa fa-pencil"></i></button>
                                            <button type="button" name="roomtypeDelete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2" del-room-type-id="<?php echo $room_type['id']; ?>" title="Xóa loại phòng"><i class="fa fa-trash-o"></i> </button>
                                            <button type="button" name="roomtypeDetail" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#customer2" del-room-type-id="<?php echo $room_type['id']; ?>" title="Chi tiết loại phòng"><i class="fa fa-asterisk"></i> </button>
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
                        <h3><i class="fa fa-user m-r-5"></i> Thêm loại phòng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                                    <fieldset>
                                        <!-- Số phòng-->
                                        <div class="col-md-4 form-group">
                                            <!--<input type="hidden" name="roomId" value=""/>-->
                                            <label class="control-label">Tên loại phòng</label>
                                            <input type="text" name="roomtypeName" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Giá loại phòng</label>
                                            <input type="number" name="roomtypePrice" placeholder="" value="" class="form-control">
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Hình ảnh loại phòng:</label>
                                            <!--<input type="file" name="roomtypeImage" value="" class="form-control">-->
                                            <input type="file" name="roomtypeImage" value="">
                                            <?php echo form_error('image'); ?>
                                        </div>
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-add-room-type-id" class="btn btn-add btn-sm" value="Save"/>
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
                        <h3><i class="fa fa-user m-r-5"></i> Cập nhật loại phòng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                                    <fieldset>
                                        <!-- Số phòng-->
                                        <div class="col-md-4 form-group">
                                            <input type="hidden" name="roomtypeId" value=""/>
                                            <label class="control-label">Tên loại phòng:</label>
                                            <input type="text" name="roomtypeName" placeholder="" value="" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Giá loại phòng:</label>
                                            <input type="number" min="0" name="roomtypePrice" placeholder="" value="" class="form-control">
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label class="control-label">Hình ảnh loại phòng:</label>
                                            <!--<input type="file" name="roomtypeImage" value="" class="form-control">-->
                                            <input type="file" name="roomtypeImage" value="">
                                            <?php echo form_error('image'); ?>
                                        </div>
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-update-room-type-id" class="btn btn-add btn-sm" value="Save"/>
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
                                            <label class="control-label">Bạn có chắc chắn muốn xóa loại phòng: <span id="roomtypeName_del"></span></label>
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