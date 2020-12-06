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
                        <button type="button" name="roomtype_add" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer3" room-id=""><i class="fa fa-plus"></i> Thêm phòng</button>
                        <button type="button" name="roomtype_update_price_all" class="btn btn-add btn-sm" data-toggle="modal" room-id=""><i class="fa fa-pencil-square-o"></i> Cập nhật giá phòng</button>
                    </div>
                </div>
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
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
                                <div class="col-md-12">
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <img class="card-img-top" src="http://placehold.it/300x300" alt="">
                                        <input type="file" name="roomtypeImage" value="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <img class="card-img-top" src="http://placehold.it/300x300" alt="">
                                        <input type="file" name="roomtypeImage" value="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <img class="card-img-top" src="http://placehold.it/300x300" alt="">
                                        <input type="file" name="roomtypeImage" value="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <img class="card-img-top" src="http://placehold.it/300x300" alt="">
                                        <input type="file" name="roomtypeImage" value="">
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

