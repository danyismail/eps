<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>epsxpay.com</title>
    <link rel="icon" href="assets/img/logo.png" type="image/png">

    <link rel="stylesheet" href=<?=base_url('assets/css/bootstrap1.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/themefy_icon/themify-icons.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/swiper_slider/css/swiper.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/select2/css/select2.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/niceselect/css/nice-select.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/owl_carousel/css/owl.carousel.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/gijgo/gijgo.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/font_awesome/css/all.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/tagsinput/tagsinput.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/datatable/css/jquery.dataTables.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/datatable/css/responsive.dataTables.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/datatable/css/buttons.dataTables.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/text_editor/summernote-bs4.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/morris/morris.css')?>>
    <link rel="stylesheet" href=<?=base_url('assets/vendors/material_icon/material-icons.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/css/metisMenu.css')?>>
    <link rel="stylesheet" href=<?=base_url('assets/css/style1.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/css/colors/default.css')?>>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    .pagination {
        list-style-type: none;
        padding: 10px 0;
        display: inline-flex;
        justify-content: space-between;
        box-sizing: border-box;
    }

    .pagination li {
        box-sizing: border-box;
        padding-right: 10px;
    }

    .pagination li a {
        box-sizing: border-box;
        background-color: #e2e6e6;
        padding: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        color: #616872;
        border-radius: 4px;
    }

    .pagination li a:hover {
        background-color: #d4dada;
    }

    .pagination .next a,
    .pagination .prev a {
        text-transform: uppercase;
        font-size: 12px;
    }

    .pagination .currentpage a {
        background-color: #518acb;
        color: #fff;
    }

    .pagination .currentpage a:hover {
        background-color: #518acb;
    }

    .active-single {
        color: #2daab8 !important;
    }
    </style>
</head>

<body class="crm_body_bg">

    <nav class="sidebar">
        <div class="logox d-flex justify-content-between"></div>
        <?php $pathArray = array("", "kpi"); ?>
        <ul id="sidebar_menu">
            <li class="side_menu_title"><span>Dashboard [testing]</span></li>
            <li><a class="d-flex <?=array_search(uri_string(), $pathArray) ? 'active-single' : ''?>" href="<?=base_url('/kpi')?>"><i class="far fa-circle m-0"></i> KPI</a></li>
            <li><a class="d-flex <?=(uri_string() === 'ceksaldo') ? 'active-single' : ''?>" href="<?=base_url('/ceksaldo')?>"><i class="far fa-circle m-0"></i> Saldo Supplier</a>
            </li>
            <li><a class="d-flex <?=(uri_string() === 'penjualan/periode') ? 'active-single' : ''?>" href="<?=base_url('/penjualan/periode')?>"><i class="far fa-circle m-0"></i>
                    Penjualan</a></li>
            <li><a class="d-flex <?=(uri_string() === 'penjualan') ? 'active-single' : ''?>" href="<?=base_url('/penjualan')?>"><i class="far fa-circle m-0"></i> Penjualan Hari
                    Ini</a></li>
            <li><a class="d-flex" href="<?=base_url('/supplier')?>"><i class="far fa-circle m-0"></i>Finance</a></li>
            <li><a class="d-flex <?=(uri_string() === 'sn/ra/list') ? 'active-single' : ''?>" href="<?=base_url('/sn/ra/list')?>"><i class="far fa-circle m-0"></i> Check SN</a>
            <li><a class="d-flex <?=(uri_string() === 'reseller/ra/laba') ? 'active-single' : ''?>" href="<?=base_url('/reseller/ra/laba')?>"><i class="far fa-circle m-0"></i> Laba
                    Reseller</a></li>
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
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <?php if (isset($breadcrumb)) {?>
                            <?php foreach($breadcrumb as $key => $row): ?>
                            <li class="breadcrumb-item <?=$row['active'] ? 'active text-secondary' : ''?>"
                                <?=$row['active'] ? 'aria-current="page"' : ''?>>
                                <?php
                                    if($row['active']) {
                                        echo $row['label'];
                                    } else {
                                        echo '<a href="'.$row['url'].'" class="text-info">'.$row['label'].'</a>';
                                    }
                                ?>
                            </li>
                            <?php endforeach ?>
                            <?php } ?>
                        </ol>
                    </nav>
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



    <script src=<?=base_url('assets/js/jquery1-3.4.1.min.js')?>></script>
    <script src=<?=base_url('assets/js/popper1.min.js')?>></script>
    <script src=<?=base_url('assets/js/bootstrap1.min.js')?>></script>
    <script src=<?=base_url('assets/js/metisMenu.js')?>></script>
    <script src=<?=base_url('assets/vendors/count_up/jquery.waypoints.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/chartlist/Chart.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/count_up/jquery.counterup.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/swiper_slider/js/swiper.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/niceselect/js/jquery.nice-select.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/owl_carousel/js/owl.carousel.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/gijgo/gijgo.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/jquery.dataTables.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/dataTables.responsive.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/dataTables.buttons.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/buttons.flash.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/jszip.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/pdfmake.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/vfs_fonts.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/buttons.html5.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/datatable/js/buttons.print.min.js')?>></script>
    <script src=<?=base_url('assets/js/chart.min.js')?>></script>
    <script src=<?=base_url('assets/vendors/progressbar/jquery.barfiller.js')?>></script>
    <script src=<?=base_url('assets/vendors/tagsinput/tagsinput.js')?>></script>
    <script src=<?=base_url('assets/vendors/text_editor/summernote-bs4.js')?>></script>
    <script src=<?=base_url('assets/vendors/apex_chart/apexcharts.js')?>></script>
    <script src=<?=base_url('assets/js/custom.js')?>></script>
    <script src=<?=base_url('assets/vendors/apex_chart/bar_active_1.js')?>></script>
    <script src=<?=base_url('assets/vendors/apex_chart/apex_chart_list.js')?>></script>
</body>

</html>