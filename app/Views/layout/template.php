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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
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

    .active-single,
    .nav-link:hover {
        color: #2daab8 !important;
    }

    .breadcrumb {
        background-color: transparent;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 active-single" href="<?=base_url()?>"><b>EPS</b></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
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
                    <li><a class="dropdown-item" href="<?=base_url('/logout')?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <?php   
                    $pathArray = array("", "kpi");
                    $pathCheckSNArray = array("sn/ra/list", "sn/re/list", "sn/da/list", "sn/de/list");
                    $pathLabaResselerArray = array("reseller/ra/laba", "reseller/re/laba", "reseller/da/laba", "reseller/de/laba");
                    $pathLabaHarianArray = array("reseller/ra/harian", "reseller/re/harian", "reseller/da/harian", "reseller/de/harian");
                    $pathLabaRugiArray = array("reseller/ra/labarugi", "reseller/re/labarugi", "reseller/da/labarugi", "reseller/de/labarugi");

                    $menu = [
                        [
                            'name' => 'KPI', 
                            'url' => 'kpi', 
                            'rolePermission' => ['superadmin'],
                            'active_class' =>  in_array(uri_string(), $pathArray) ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Saldo Supplier', 
                            'url' => 'ceksaldo', 
                            'rolePermission' => ['eps', 'amazone', 'superadmin'],
                            'active_class' =>  (uri_string() === 'ceksaldo') ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Penjualan', 
                            'url' => 'penjualan/periode', 
                            'rolePermission' => ['eps', 'amazone', 'superadmin'],
                            'active_class' =>  (uri_string() === 'penjualan/periode') ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Penjualan Hari Ini', 
                            'url' => 'penjualan', 
                            'rolePermission' => ['eps', 'amazone', 'superadmin'],
                            'active_class' =>  (uri_string() === 'penjualan') ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Finance', 
                            'url' => 'supplier', 
                            'rolePermission' => ['superadmin', 'admin'],
                            'active_class' =>  (uri_string() === 'supplier') ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Check SN', 
                            'url' => '/sn/ra/list', 
                            'rolePermission' => ['eps', 'amazone', 'superadmin'],
                            'active_class' =>  in_array(uri_string(), $pathCheckSNArray) ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Laba Reseller',
                            'url' => 'reseller/ra/laba',
                            'rolePermission' => ['eps', 'amazone', 'superadmin'],
                            'active_class' => in_array(uri_string(), $pathLabaResselerArray) ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Laba Harian',
                            'url' => 'reseller/ra/harian',
                            'rolePermission' => ['eps', 'amazone', 'superadmin'],
                            'active_class' => in_array(uri_string(), $pathLabaHarianArray) ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Laba Rugi',
                            'url' => 'reseller/labarugi',
                            'rolePermission' => ['eps', 'amazone', 'superadmin'],
                            'active_class' => (uri_string() === 'reseller/labarugi') ? 'active-single' : ''
                        ],
                        [
                            'name' => 'Sales Hub',
                            'url' => 'saleshub/total_revenue',
                            'rolePermission' => ['superadmin'],
                            'active_class' => (uri_string() === 'saleshub') ? 'active-single' : ''
                        ],
                        [
                            'name' => 'User',
                            'url' => 'user',
                            'rolePermission' => ['superadmin'],
                            'active_class' => (uri_string() === 'user') ? 'active-single' : ''
                        ]
                    ];
                ?>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <?php 
                            foreach($menu as $item): 
                                if(in_array($session->get('data')['role'], $item['rolePermission'])){
                        ?>
                                <a class="nav-link <?=$item['active_class']?>"
                                    href="<?=base_url('/'.$item['url'])?>">
                                    <div class="sb-nav-link-icon"><i class="fa-regular fa-circle"></i></div>
                                    <?=$item['name']?>
                                </a>
                        <?php 
                                } 
                            endforeach; 
                        ?>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
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
            </main>
        </div>
    </div>
</body>

</html>