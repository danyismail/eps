<!DOCTYPE html>
<html lang="zxx">
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>epsxpay.com</title>
<link rel="icon" href="assets/img/logo.png" type="image/png">

<!-- <link rel="stylesheet" href=<?=base_url('assets/css/bootstrap1.min.css')?> /> -->
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
    .pagination .next a, .pagination .prev a {
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
</style>
</head>
<body class="crm_body_bg">

<nav class="sidebar">
    <div class="logox d-flex justify-content-between"></div>
    <?php
        $arrSupplierAmz = array("", "finance/supplier/amz", "finance/supplier/amz/add");
        $arrSupplierEps = array("", "finance/supplier/eps", "finance/supplier/eps/add");
        $arrAmazon = array("", "finance/deposit/amz/add", "finance/deposit/amz/cek_pending", "finance/deposit/amz/data_transaksi", "finance/deposit/amz/cancel");
        $arrEps = array("", "finance/deposit/eps/add", "finance/deposit/eps/cek_pending", "finance/deposit/eps/data_transaksi", "finance/deposit/eps/cancel");
    ?>
    <ul id="sidebar_menu">
        <li class="side_menu_title"><span><h2><b>Finance</b></h2></span></li>
        <li class="side_menu_title"><span>Digi Amazone</span></li>
        <li><a class="text-decoration-none" style="<?=(array_search(uri_string(), $arrSupplierAmz)) ? 'color:#2daab8' : ''?>" href="<?=base_url('/finance/supplier/amz')?>">Supplier</a></li>
        <li class="<?=array_search(uri_string(), $arrAmazon) ? 'mm-active' : ''?>">
            <a class="d-flex text-decoration-none" href="#" aria-expanded="false">
                <i class="far fa-circle m-0"></i>
                <span>Deposit</span>
                <i class="fas fa-chevron-right"  style="margin-left: auto;"></i>
            </a>
            <ul>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/amz/add') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/amz/add')?>">Depo SPL</a></li>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/amz/cek_pending') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/amz/cek_pending')?>">Cek Pending</a></li>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/amz/data_transaksi') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/amz/data_transaksi')?>">Data Transaksi</a></li>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/amz/cancel') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/amz/cancel')?>">Cancel Deposit</a></li>
            </ul>
        </li>

        <li class="side_menu_title"><span>Digi Eps</span></li>
        <li><a class="text-decoration-none" style="<?=(array_search(uri_string(), $arrSupplierEps)) ? 'color:#2daab8' : ''?>" href="<?=base_url('/finance/supplier/eps')?>">Supplier</a></li>
        <li class="<?=array_search(uri_string(), $arrEps) ? 'mm-active' : ''?>">
            <a class="d-flex text-decoration-none" href="#" aria-expanded="false">
                <i class="far fa-circle m-0"></i>
                <span>Deposit</span>
                <i class="fas fa-chevron-right"  style="margin-left: auto;"></i>
            </a>
            <ul>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/eps/add') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/eps/add')?>">Depo SPL</a></li>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/eps/cek_pending') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/eps/cek_pending')?>">Cek Pending</a></li>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/eps/data_transaksi') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/eps/data_transaksi')?>">Data Transaksi</a></li>
                <li><a class="text-decoration-none <?=(uri_string() === 'finance/deposit/eps/cancel') ? 'active' : ''?>" href="<?=base_url('/finance/deposit/eps/cancel')?>">Cancel Deposit</a></li>
            </ul>
        </li>
    </ul>
</nav>

<section class="main_content dashboard_part">
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center"></div>
            </div>
        </div>
    </div>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="rowx justify-content-centerx">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php foreach($breadcrumb as $key => $row): ?>
                            <li class="breadcrumb-item <?=$row['active'] ? 'active text-secondary' : ''?>" <?=$row['active'] ? 'aria-current="page"' : ''?>>
                                <?php
                                    if($row['active']) {
                                        echo $row['label'];
                                    } else {
                                        echo '<a href="'.$row['url'].'" class="text-info">'.$row['label'].'</a>';
                                    }
                                ?>
                            </li>
                        <?php endforeach ?>
                    </ol>
                </nav>
            </div>
            <?php $this->renderSection('content'); ?>
        </div>
    </div>
</section>

<!-- <script src=<?=base_url('assets/js/jquery1-3.4.1.min.js')?>></script> -->
<script src=<?=base_url('assets/js/popper1.min.js')?>></script>
<!-- <script src=<?=base_url('assets/js/bootstrap1.min.js')?>></script> -->
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