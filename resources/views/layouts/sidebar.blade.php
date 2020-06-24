<div class="nav-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/">
          <i class="material-icons">dashboard</i>
          <span>Blog Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">
          <i class="material-icons">person</i>
          <span>User Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/logout">
          <i class="material-icons text-danger">logout</i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
</div>