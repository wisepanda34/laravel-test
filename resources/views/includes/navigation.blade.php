<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about.index')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('teams.index')}}">Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('cars.index')}}">Cars</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('laptops.index')}}">Laptops</a>
        </li>
        

        @can('viewAny',  auth()->user())
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.posts.index') }}">Admin</a>
        </li>
        @endcan
      </ul>
      {{-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> --}}
    </div>
  </div>
</nav>

