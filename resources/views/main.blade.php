@include('partials._head')

@include('partials._navbar')

    <!-- Page Content -->
    <div class="container" style="margin-top: 10px">
      @include('partials._messages') 
        
      @yield('content')
    </div>
    <!-- /.container -->
    
@include('partials._footer')

@include('partials._javascript')
