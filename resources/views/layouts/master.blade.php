<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
   <div id="app">
    <!-- Main content -->
    {{-- <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Show content with *.vue router-link -->
          <router-view></router-view>
          
          <vue-progress-bar></vue-progress-bar>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> --}}
    <!-- /.content -->
      @yield('header')
      @yield('content')
      @yield('footer')
   </div>
</body>
</html>
