<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
          <a href="" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('dashboard') }}">General Dashboard</a></li>
          </ul>
        </li>
        <li class="menu-header">Starter</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Artikel</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('article') }}">List Artikel</a></li>
            @if (auth()->user()->role == 1)
            <li><a class="nav-link" href="{{ url('article/restore') }}">List Artikel Dihapus</a></li>
            @endif
          </ul>
        </li>
        @if (auth()->user()->role == 1)
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kategori</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url('categories') }}">List Kategori</a></li>
            </ul>
          </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Tags</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('tag') }}">List Tags</a></li>
          </ul>
        </li>
        @endif
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Users</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('users') }}">List Users</a></li>
          </ul>
        </li>
        
  </div>