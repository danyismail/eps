<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>epsxpay.com</title>
    <link rel="stylesheet" href=<?=base_url('assets/css/bootstrap1.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/vendors/select2/css/select2.min.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/css/style1.css')?> />
    <link rel="stylesheet" href=<?=base_url('assets/css/colors/default.css')?>>
    <link rel="stylesheet" href=<?=base_url('assets/vendors/font_awesome/css/all.min.css')?> />
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
        <?php $arrListMenu = array("", "deposit/add", "deposit/cek_pending", "deposit/data_transaksi", "deposit/cancel"); ?>
        <ul id="sidebar_menu">
            <li class="side_menu_title"><span>Finance</span></li>
            <li><a class="d-flex <?=(uri_string() === 'supplier') ? 'active-single' : ''?>" href="<?=base_url('/supplier')?>"><i class="far fa-circle m-0"></i> Supplier</a></li>
            <li class="<?=array_search(uri_string(), $arrListMenu) ? 'mm-active' : ''?>">
                <a class="d-flex text-decoration-none" href="#" aria-expanded="false">
                    <i class="far fa-circle m-0"></i> <span>Deposit</span>
                    <i class="fas fa-chevron-right" style="margin-left: auto;"></i>
                </a>
                <ul>
                    <li><a class="text-decoration-none <?=(uri_string() === 'deposit/add') ? 'active' : ''?>"
                            href="<?=base_url('/deposit/add')?>">Depo SPL</a></li>
                    <li><a class="text-decoration-none <?=(uri_string() === 'deposit/cek_pending') ? 'active' : ''?>"
                            href="<?=base_url('/deposit/cek_pending')?>">Cek Pending</a></li>
                    <li><a class="text-decoration-none <?=(uri_string() === 'deposit/data_transaksi') ? 'active' : ''?>"
                            href="<?=base_url('/deposit/data_transaksi')?>">Data Transaksi</a></li>
                    <li><a class="text-decoration-none <?=(uri_string() === 'deposit/cancel') ? 'active' : ''?>"
                            href="<?=base_url('/deposit/cancel')?>">Cancel Deposit</a></li>
                </ul>
            </li>
            <li><a class="text-decoration-none d-flex <?=(uri_string() === 'direct') ? 'active-single' : ''?>"
                    href="<?=base_url('/direct')?>"><i class="far fa-circle m-0"></i> Direct Payment</a></li>
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
                        </ol>
                    </nav>
                </div>
                <?php $this->renderSection('content'); ?>
            </div>
        </div>
    </section>

    <script src=<?=base_url('assets/js/jquery1-3.4.1.min.js')?>></script>
    <script src=<?=base_url('assets/js/popper1.min.js')?>></script>
    <script src=<?=base_url('assets/js/bootstrap1.min.js')?>></script>
    <script src=<?=base_url('assets/js/metisMenu.js')?>></script>
    <script src="<?=base_url('assets/vendors/select2/js/select2.min.js')?>"></script>
    <script>
      $("#singleSelect").select2();
    </script>
</body>

</html>