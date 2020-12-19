
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="index.html"><i class="fa fa-tachometer"></i><span>Trang chủ</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i><span>Quản lý phòng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?mod=room&controller=roomtype&action=list_room_type">Danh sách loại phòng</a></li>
                    <li><a href="?mod=room&controller=room&action=list_room">Danh sách phòng</a></li>
                </ul>
            </li>
            <li><a href="?mod=customer&controller=customer&action=list_customer"><i class="fa fa-users"></i><span>Quản lý khách hàng</span></a></li>
            <!--QUẢN LÝ ĐẶT PHÒNG-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i><span>Quản lý đặt phòng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?mod=book_room&controller=book_room">Đặt phòng</a></li>
                    <li><a href="?mod=room&controller=room&action=list_room">Danh sách phòng</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>