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
            <h1>Phòng</h1>
            <small>Danh sách sắp trả phòng</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content content-wp">
        <div class="row">
            <div class="col-sm-12">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover text-center">
                        <thead>
                            <tr class="info">
                                <th class="col-md-1">STT</th>
                                <th class="col-md-2">Tên khách hàng</th>
                                <th class="col-md-5">Liên hệ</th>
                                <th class="col-md-2">Số phòng</th>
                                <th class="col-md-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             if (!empty($list_customer_today_checkout)) {
                                $t = 0;
                                foreach ($list_customer_today_checkout as $customer_checkout) {
                                    $t++;
                            ?>
                            <tr>
                                <td><?php echo $t; ?></td>
                                <td><?php echo $customer_checkout['name']; ?></td>
                                <td style="text-align:left"><?php echo "{$customer_checkout['email']} & {$customer_checkout['phone']}"; ?></td>
                                <td><button type="button" name="info_room" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#customer1" info-bookrom-id="<?php echo $customer_checkout['id']; ?>"><?php echo $customer_checkout['number_room']; ?></button></td>
                                <td>
                                    <button type="button" name="send_mail" class="btn btn-add btn-sm" email-customer="<?php echo $customer_checkout['email']; ?>" fullname-customer="<?php echo $customer_checkout['name']; ?>">Send mail</button>
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
        <!-- xem chi tiết các phòng sắp trả -->
        <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog w-dialog">
                <div class="modal-content" style="width: 500px; margin: 0px auto;">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-hotel m-r-5"></i> Danh sách phòng khách hàng đặt</h3>
                    </div>
                    <div class="modal-body">
                    <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover text-center">
                        <thead>
                            <tr class="info">
                                <th class="col-md-1">STT</th>
                                <th class="col-md-2">Tên Phòng</th>
                            </tr>
                        </thead>
                        <tbody  id="test_table">
                            
                        </tbody>
                    </table>
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
    </section>
    <!-- /.content -->
</div>
<?php
get_footer();
?>