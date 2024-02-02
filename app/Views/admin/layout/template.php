<!DOCTYPE html>
<html lang="zxx">
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>epsxpay.com</title>
<link rel="icon" href="assets/img/logo.png" type="image/png">

<link rel="stylesheet" href="assets/css/bootstrap1.min.css" />
<link rel="stylesheet" href="assets/vendors/themefy_icon/themify-icons.css" />
<link rel="stylesheet" href="assets/vendors/swiper_slider/css/swiper.min.css" />
<link rel="stylesheet" href="assets/vendors/select2/css/select2.min.css" />
<link rel="stylesheet" href="assets/vendors/niceselect/css/nice-select.css" />
<link rel="stylesheet" href="assets/vendors/owl_carousel/css/owl.carousel.css" />
<link rel="stylesheet" href="assets/vendors/gijgo/gijgo.min.css" />
<link rel="stylesheet" href="assets/vendors/font_awesome/css/all.min.css" />
<link rel="stylesheet" href="assets/vendors/tagsinput/tagsinput.css" />
<link rel="stylesheet" href="assets/vendors/datatable/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="assets/vendors/datatable/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="assets/vendors/datatable/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="assets/vendors/text_editor/summernote-bs4.css" />
<link rel="stylesheet" href="assets/vendors/morris/morris.css">
<link rel="stylesheet" href="assets/vendors/material_icon/material-icons.css" />
<link rel="stylesheet" href="assets/css/metisMenu.css">
<link rel="stylesheet" href="assets/css/style1.css" />
<link rel="stylesheet" href="assets/css/colors/default.css" id="colorSkinCSS">
</head>
<body class="crm_body_bg">

<nav class="sidebar">
    <div class="logox d-flex justify-content-between"></div>
    <ul id="sidebar_menu">
        <li class="side_menu_title"><span>Dashboard</span></li>
        <li class="mm-active">
            <!-- <a class="has-arrow" href="#" aria-expanded="false">
                <span>Dashboard</span>
            </a> -->
            <ul>
                <!-- <li><a href="<?=base_url('/')?>">Report</a></li> -->
                <li><a href="<?=base_url('/kpi')?>">KPI</a></li>
            </ul>
        </li>
    </ul>
</nav>

<section class="main_content dashboard_part">
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <!-- <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area">
                        <div class="search_inner">
                            <form action="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search here...">
                                </div>
                                <button type="submit"> <img src="img/icon/icon_search.svg" alt> </button>
                            </form>
                        </div>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li><a href="#"> <img src="img/icon/bell.svg" alt> </a></li>
                            <li><a href="#"> <img src="img/icon/msg.svg" alt> </a></li>
                        </div>

                        <div class="profile_info">
                            <img src="img/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <p>Neurologist </p>
                                <h5>Dr. Robar Smith</h5>
                                <div class="profile_info_details">
                                    <a href="#">My Profile <i class="ti-user"></i></a>
                                    <a href="#">Settings <i class="ti-settings"></i></a>
                                    <a href="#">Log Out <i class="ti-shift-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <?php $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <!-- <div class="footer_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</section>



<script src="assets/js/jquery1-3.4.1.min.js"></script>
<script src="assets/js/popper1.min.js"></script>
<script src="assets/js/bootstrap1.min.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/vendors/count_up/jquery.waypoints.min.js"></script>
<script src="assets/vendors/chartlist/Chart.min.js"></script>
<script src="assets/vendors/count_up/jquery.counterup.min.js"></script>
<script src="assets/vendors/swiper_slider/js/swiper.min.js"></script>
<script src="assets/vendors/niceselect/js/jquery.nice-select.min.js"></script>
<script src="assets/vendors/owl_carousel/js/owl.carousel.min.js"></script>
<script src="assets/vendors/gijgo/gijgo.min.js"></script>
<script src="assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="assets/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="assets/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="assets/vendors/datatable/js/jszip.min.js"></script>
<script src="assets/vendors/datatable/js/pdfmake.min.js"></script>
<script src="assets/vendors/datatable/js/vfs_fonts.js"></script>
<script src="assets/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="assets/vendors/datatable/js/buttons.print.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/vendors/progressbar/jquery.barfiller.js"></script>
<script src="assets/vendors/tagsinput/tagsinput.js"></script>
<script src="assets/vendors/text_editor/summernote-bs4.js"></script>
<script src="assets/vendors/apex_chart/apexcharts.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/vendors/apex_chart/bar_active_1.js"></script>
<script src="assets/vendors/apex_chart/apex_chart_list.js"></script>

<script>
    $(function() {
        function getData() {
            $.ajax({
                type: "POST",
                url: "http://36.88.42.95:1523/api/eps/getKpis",
                processData: false,
                contentType: 'application/json',
                crossDomain: true,
                data: JSON.stringify({page: 1, view: 10}),
                header: {
                    "content-type": "text/plain;charset=UTF-8",
                    "accept": "application/json",
                    "Access-Control-Allow-Origin":"*"
                },
                success: function (data) {
                    console.log('data = ', data)
                }
            });
        };
        getData()
    })
</script>

</body>
</html>