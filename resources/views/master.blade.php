@include('administration.layouts.header')
<div class="wrapper">


    @include('administration.layouts.nav')

    @include('administration.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    
  </div>
  
  @include('administration.layouts.footer')