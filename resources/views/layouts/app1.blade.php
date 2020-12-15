<!DOCTYPE html>
<html>

<head>
  @include('includes.head')
</head>

<body>
  <!-- Sidenav -->
  @include('includes.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('includes.nav')
        <!-- Header -->
        <!-- Header -->
        @include('includes.header')
    <div class="container-fluid mt--6">
      <!-- Page content -->
      
        <div class="row justify-content-center">
          <div class=" col ">
            <div class="card">
              
              @yield('content')
            </div>
          </div>
        </div>
         
      @include('includes.footer')
    </div>
  </div>
  
  @yield('js')

  @include('includes.script')
</body>

</html>
