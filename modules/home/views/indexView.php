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
            <i class="fa fa-dashboard"></i>
        </div>
        <div class="header-title">
            <h1>CRM Admin Dashboard</h1>
            <small>Very detailed & featured admin.</small>
            <?php
            echo time() - $_SESSION['time_login'];
            echo "hihi";
            echo time();
            echo "hihi";
            echo $_SESSION['time_login'];
            ?>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div id="cardbox1">
                    <div class="statistic-box">
                        <i class="fa fa-user-plus fa-3x"></i>
                        <div class="counter-number pull-right">
                            <span class="count-number">11</span> 
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Active Client</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div id="cardbox2">
                    <div class="statistic-box">
                        <i class="fa fa-user-secret fa-3x"></i>
                        <div class="counter-number pull-right">
                            <span class="count-number">4</span> 
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3>  Active Admin</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div id="cardbox3">
                    <div class="statistic-box">
                        <i class="fa fa-money fa-3x"></i>
                        <div class="counter-number pull-right">
                            <i class="ti ti-money"></i><span class="count-number">965</span> 
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3>  Total Expenses</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div id="cardbox4">
                    <div class="statistic-box">
                        <i class="fa fa-files-o fa-3x"></i>
                        <div class="counter-number pull-right">
                            <span class="count-number">11</span> 
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Running Projects</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Thống kê doanh thu</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!--XỬ LÝ Ở ĐÂY-->
                        <script>
                            window.onload = function () {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    exportEnabled: true,
                                    theme: "light1", // "light1", "light2", "dark1", "dark2"
                                    title: {
                                        text: "Doanh thu theo tháng trong năm <?php echo date("Y"); ?>",
                                        fontSize: 25
                                    },
                                    axisY: {
                                        includeZero: true
                                    },
                                    data: [{
                                            type: "column", //change type to bar, line, area, pie, etc
                                            //indexLabel: "{y}", //Shows y value on all Data Points
                                            indexLabelFontColor: "#5A5757",
                                            indexLabelPlacement: "outside",
                                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                        }]
                                });
                                chart.render();
                            }
                        </script>
                        <input type="hidden" name="thongke_DoanhThu"/>
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <!--KÊT THÚC XỬ LÝ-->
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Loại phòng ưa chuộng</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!--XỬ lý tại đây-->
<!--                        <script>
                            window.onload = function () {

                                var chart11 = new CanvasJS.Chart("chartContainer1", {
                                    animationEnabled: true,
                                    exportEnabled: true,
                                    title: {
                                        text: "Average Expense Per Day  in Thai Baht"
                                    },
                                    subtitles: [{
                                            text: "Currency Used: Thai Baht (฿)"
                                        }],
                                    data: [{
                                            type: "pie",
                                            showInLegend: "true",
                                            legendText: "{label}",
                                            indexLabelFontSize: 16,
                                            indexLabel: "{label} - #percent%",
                                            yValueFormatString: "฿#,##0",
                                            dataPoints: <?php //echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                                        }]
                                });
                                chart11.render();

                            }
                        </script>-->
                        <!--<div id="chartContainer1" style="height: 370px; width: 100%;"></div>-->
                        <!--END XỬ LÝ TẠI ĐÂY-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Pending Works</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="Pendingwork">
                            <span class="label-warning label label-default pull-right">progressing</span>
                            <i class="fa fa-ban"></i>
                            <a href="#">Database tools</a>                          
                            <div class="upworkdate">
                                <p>Jul 25, 2017 for Alimul Alrazy</p>
                            </div>
                        </div>
                        <div class="Pendingwork">
                            <span class="label-success label label-default pull-right">success</span>
                            <i class="fa fa-ban"></i>
                            <a href="#">Cabels</a>                          
                            <div class="upworkdate">
                                <p>Jul 25, 2017 for Alimul</p>
                            </div>
                        </div>
                        <div class="Pendingwork">
                            <span class="label-danger label label-default pull-right">Failed</span>
                            <i class="fa fa-ban"></i>
                            <a href="#">Technologycal tools</a>                          
                            <div class="upworkdate">
                                <p>Feb 25, 2017 for Alrazy</p>
                            </div>
                        </div>
                        <div class="Pendingwork">
                            <span class="label-warning label label-default pull-right">progressing</span>
                            <i class="fa fa-ban"></i>
                            <a href="#">Transaction</a>                          
                            <div class="upworkdate">
                                <p>apr 25, 2017 for Mahfuz</p>
                            </div>
                        </div>
                        <div class="Pendingwork">
                            <span class="label-success label label-default pull-right">success</span>
                            <i class="fa fa-ban"></i>
                            <a href="#">Training tools</a>                          
                            <div class="upworkdate">
                                <p>jun 25, 2017 for Alrazy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Works Deadlines</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="Workslist">
                            <div class="worklistdate">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Task Name</th>
                                            <th>End Deadlines</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="info">
                                            <th scope="row">Alrazy</th>
                                            <td>Feb 25,2017</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jahir</th>
                                            <td>jun 05,2017</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sayeed</th>
                                            <td>Feb 05,2017</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Shipon</th>
                                            <td>jun 25,2017</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Rafi</th>
                                            <td>Jul 15,2017</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Works Announcements</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="Workslist">
                            <div class="worklistdate">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Works Type</th>
                                            <th>Name Of Worker</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="info">
                                            <td>Web Design</td>
                                            <td>Jr. Developer Alrazy</td>
                                        </tr>
                                        <tr>
                                            <td>Networking</td>
                                            <td>Jr. Developer Jahir</td>
                                        </tr>
                                        <tr>
                                            <td>Megento</td>
                                            <td>Jr. Developer Sayeed</td>
                                        </tr>
                                        <tr>
                                            <td>Php,Laravel</td>
                                            <td>Jr. Developer Muhim</td>
                                        </tr>
                                        <tr>
                                            <td>Html,css</td>
                                            <td>Frontend Developer Rafi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Notice Board</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="Workslist">
                            <div class="worklistdate">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Notice</th>
                                            <th>Published By</th>
                                            <th>Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="info">
                                            <td>new notice</td>
                                            <td>Mr. Alrazy</td>
                                            <td>20th April 2017</td>
                                        </tr>
                                        <tr>
                                            <td>Urgent notice</td>
                                            <td>Mr. Alrazy</td>
                                            <td>20th june 2017</td>
                                        </tr>
                                        <tr>
                                            <td>Urgent notice</td>
                                            <td>Mr. Jahir</td>
                                            <td>26th june 2017</td>
                                        </tr>
                                        <tr>
                                            <td>Urgent notice</td>
                                            <td>Mr. leo</td>
                                            <td>3rd june 2017</td>
                                        </tr>
                                        <tr>
                                            <td>Notice</td>
                                            <td>Mr. Karim</td>
                                            <td>3rd July 2017</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Barchart -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>This Year Earnings & Expenses(Bar chart)</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="barChart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <!-- bar chart -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Weekly Earnings & Expenses</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="singelBarChart" height="323"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Google Map</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="google-maps">
                            <iframe src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=15+Springfield+Way,+Hythe,+CT21+5SH&amp;aq=t&amp;sll=52.8382,-2.327815&amp;sspn=8.047465,13.666992&amp;ie=UTF8&amp;hq=&amp;hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&amp;t=m&amp;z=14&amp;ll=51.077429,1.121722&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Calender</h4>
                        </div>
                    </div>
                    <!-- Monthly calender widget -->
                    <div class="panel panel-bd">
                        <div class="panel-body">
                            <div class="monthly_calender">
                                <div class="monthly" id="m_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
get_footer();
?>