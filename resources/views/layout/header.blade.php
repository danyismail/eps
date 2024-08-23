	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Dashboard</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/summernote/summernote-bs4.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="{{url('')}}/assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
			padding: 8px 12px;
			text-decoration: none;
			font-size: 14px;
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
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader flex-column justify-content-center align-items-center">
				<img class="animation__shake" src="{{url('')}}/assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
			</div>

			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
				</ul>

				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('user.logout')}}" onclick="return confirm('Are you sure?')" role="button">
						Logout
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-light-primary elevation-1">
				<!-- Brand Logo -->
				<a href="index3.html" class="brand-link">
					<img src="{{url('')}}/assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">EPS WEB</span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
				<!-- Sidebar Menu -->
					<?php 
						$menu = [
							[
								'label' => 'KPI', 
								'url' => 'kpi',
								'list' => []
							],
							[
								'label' => 'Saldo Supplier', 
								'url' => 'saldo', 
								'list' => []
							],
							[
								'label' => 'Penjualan', 
								'url' => 'penjualan-periode', 
								'list' => []
							],
							[
								'label' => 'Penjualan Hari Ini', 
								'url' => 'penjualan', 
								'list' => []
							],
							[
								'label' => 'Finance', 
								'url' => 'finance', 
								'list' => []
							],
							[
								'label' => 'Check SN', 
								'url' => 'check-sn', 
								'list' => []
							],
							[
								'label' => 'Laba Reseller', 
								'url' => 'laba-reseller', 
								'list' => []
							],
							[
								'label' => 'Laba Harian', 
								'url' => 'laba-harian', 
								'list' => []
							],
							[
								'label' => 'Laba Rugi', 
								'url' => 'laba-rugi', 
								'list' => []
							],
							[
								'label' => 'Sales Hub', 
								'url' => 'sales-hub', 
								'list' => []
							],
							[
								'label' => 'User', 
								'url' => 'user', 
								'list' => []
							],
						];
					?>

					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-header">MAIN MENU</li>
							@foreach($menu as $item)
								@if(count($item['list']) > 0)

								<li class="nav-item menu-open">
									<a href="#" class="nav-link active">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										{{$item['label']}}
										<i class="right fas fa-angle-left"></i>
									</p>
									</a>
									<ul class="nav nav-treeview">
									@foreach($item['list'] as $subItem)
										<li class="nav-item">
										<a href="{{url($subItem['url'])}}" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>{{$subItem['label']}}</p>
										</a>
										</li>
									@endforeach
									</ul>
								</li>

								@else

								<li class="nav-item">
									<a href="{{url($item['url'])}}" class="nav-link <?=Request::segment(1) === $item['url'] ? 'active' : ''?>">
									<i class="nav-icon far fa-circle"></i>
									<p class="text">{{$item['label']}}</p>
									</a>
								</li>
								@endif
							@endforeach
						</ul>
					</nav>
				<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Dashboard</h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard v1</li>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->