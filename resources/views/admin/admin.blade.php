<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Administration</title>
    <link rel="stylesheet" href=" {{ asset('assets/css/base.css')}}">
</head>
<body>
  @php 
 $route = request()->route()->getName();

  @endphp
    <nav class="navbar navbar-expand-lg bg-dark " data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/admin/filiere">GED-GEC</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('admin.department.index')}}">Home</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.department.index')}}" @class(['nav-link',
                 'active'=>str_contains($route,'department')])>Départements</a>
              </li>
              <li class="nav-item">
                <a  href="{{ route('admin.service.index')}}"  @class(['nav-link',
                'active'=>str_contains($route,'service')])>Services</a>
              </li>
             
              <li class="nav-item">
                <a  href="{{ route('admin.category.index')}}"    @class(['nav-link',
                'active'=>str_contains($route,'category')])>Catégories</a>
              </li>
              
            </ul>

          </div>
        </div>
      </nav>

      <div class="container">
        @if (session('success'))
              <div class="alert alert-success">
                {{ session('success')}}
              </div>
        @endif
        @yield('content')
      </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>