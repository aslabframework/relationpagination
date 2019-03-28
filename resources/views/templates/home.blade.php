<!doctype html>
<html lang="en">
  @include('templates.partials._head')
  <body>
    @include('templates.partials._topNav')
    <div class="container-fluid">
      <div class="row">
        @include('templates.partials._sideNav')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          @yield('content')
        </main>
      </div>
    </div> 
    <footer class="footer">
        <div class="container text-center text-light">
          <span>&copy;Aslab Framework 2019</span>
        </div>
      </footer>
    @include('templates.partials._script')
  </body>
</html>
