<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?=base_url("assets-new/css/styles.css")?>" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <script src=<?=base_url('assets/js/jquery1-3.4.1.min.js')?>></script>
        <script src="<?=base_url("assets-new/js/scripts.js")?>"></script>
        <script src="https://use.fontawesome.com/releases/v6.5.2/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?=base_url("assets-new/js/datatables-simple-demo.js")?>"></script>
        <style>
            body {
                font-size: 14px;
                font-family:"Calibri", sans-serif;
            }
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
            .active-single, .nav-link:hover {
                color: #2daab8 !important;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 active-single" href="<?=base_url()?>"><b>EPS Finance</b></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <div>
                <?php $session = session(); echo $session->get('data')['username']?>
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="<?=base_url('/logout')?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <?php 
                        $arrSupplierMenu = array("", "supplier", "supplier/add");
                        $arrListMenu = array("", "deposit/add", "deposit/cek_pending", "deposit/data_transaksi", "deposit/cancel"); 
                    ?>
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Finance</div>
                            <a class="nav-link <?=(array_search(uri_string(), $arrSupplierMenu)) ? 'active-single' : ''?>" href="<?=base_url('/supplier')?>">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-circle"></i></div>
                                Supplier
                            </a>
                            <a 
                                class="nav-link <?=array_search(uri_string(), $arrListMenu) ? '' : 'collapsed'?>" 
                                href="#" data-bs-toggle="collapse" 
                                data-bs-target="#collapseLayouts" 
                                aria-expanded="<?=array_search(uri_string(), $arrListMenu) ? 'true' : 'false'?>" 
                                aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-circle"></i></div>
                                Deposit
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fa-solid fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse <?=array_search(uri_string(), $arrListMenu) ? 'show' : ''?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?=(uri_string() === 'deposit/add') ? 'active-single' : ''?>" href="<?=base_url('/deposit/add')?>">Depo SPL</a>
                                    <a class="nav-link <?=(uri_string() === 'deposit/cek_pending') ? 'active-single' : ''?>" href="<?=base_url('/deposit/cek_pending')?>">Cek Pending</a>
                                    <a class="nav-link <?=(uri_string() === 'deposit/data_transaksi') ? 'active-single' : ''?>" href="<?=base_url('/deposit/data_transaksi')?>">Data Transaksi</a>
                                    <a class="nav-link <?=(uri_string() === 'deposit/cancel') ? 'active-single' : ''?>" href="<?=base_url('/deposit/cancel')?>">Cancel Deposit</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php $this->renderSection('content'); ?>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
