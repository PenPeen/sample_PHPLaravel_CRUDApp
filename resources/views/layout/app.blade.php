<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/js/app.js'])
</head>

<body>
  <div class="px-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid px-5">
        <a class="navbar-brand fw-bold" href="{{route('product')}}">Product App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('product.create')}}">Create</a>
            </li>
          </ul>
        </div>
        <div class="px-5">
          <form class="d-flex" method="GET" action="{{route('product')}}">
            <input class="form-control me-2" name="search_word" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <div class="container">
    <main>
      <h1 class="my-3">@yield('title')</h1>
      @yield('content')
    </main>
  </div>

  <script src="{{ asset('/js/product.js') }}"></script>
</body>

</html>