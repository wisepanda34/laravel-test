<nav class="mt-2">
  <ul
    class="nav sidebar-menu flex-column"
    data-lte-toggle="treeview"
    role="menu"
    data-accordion="false"
  >
    <li class="nav-header">ADMIN PANEL</li>
    <li class="nav-item">
      <a href="{{route('admin.posts.index')}}" class="nav-link d-flex justify-content-between">
        <p>Posts</p>
        <div class="bg-primary rounded d-flex justify-content-center px-1 fs-6">{{$posts->total()}}</div>  
      </a>
    </li>
  </ul>
</nav>