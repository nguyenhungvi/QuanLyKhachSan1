<?php
get_header();
get_sidebar();
?>
<!--<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" width="100px" height="auto" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Item One</a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
    </div>
</div>-->
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
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                    <div class="buttonexport" id="buttonlist"> 
                        <button type="button" name="roomtypedetail_update" class="btn btn-add btn-sm" data-toggle="modal" room-id=""><i class="fa fa-pencil-square-o"></i> Cập nhật chi tiết phòng</button>
                    </div>
                </div>
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <fieldset>

                                <!-- Số phòng-->
                                <div class="col-md-4 form-group">
                                    <input type="hidden" name="roomtypedetailAcre" value=""/>
                                    <label class="control-label">Diện Tích:</label>
                                    <input type="text" name="roomtypeName" placeholder="" value="" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Hướng phòng:</label>
                                    <input type="text" name="roomtypedetailDirection" placeholder="" value="" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Giường:</label>
                                    <input type="number" min="1" name="roomtypedetailBed" placeholder="" value="1" class="form-control">
                                </div>
                                <div class="col-md-12 form-group user-form-group text-center">
                                    <input type="submit" name="save-update-room-type-id" class="btn btn-add btn-sm" value="Save" style="width: 50%;"/>
                                    <div class="">

                                    </div>
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

