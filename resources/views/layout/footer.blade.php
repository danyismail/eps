            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- DataTables  & Plugins -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/jszip/jszip.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/moment/moment.min.js"></script>
        <script src="{{url('')}}/assets/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{url('')}}/assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{url('')}}/assets/AdminLTE/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{url('')}}/assets/AdminLTE/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{url('')}}/assets/AdminLTE/dist/js/pages/dashboard.js"></script>
        <script>
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#datatable-1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#datatable-nosearch').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#datatable-nosearch2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        </script>
    </body>
</html>
