@include('layout.header')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid pb-1">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@include('layout.footer')