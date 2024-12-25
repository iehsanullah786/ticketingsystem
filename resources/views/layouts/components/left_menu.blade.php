<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
      <img src="{{ asset('img/avatars/logo.png') }}" style="width: 90px; height: auto;">
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard*') ? ' active' : '' }}">
      <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-dashboard"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <!-- Admins -->
    <li class="menu-item {{ request()->is('admins*') ? ' active' : '' }}">
      <a href="{{ route('users.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-user-circle"></i>
        <div data-i18n="Users">Users</div>
      </a>
    </li>

    <!-- priorities -->
    <li class="menu-item {{ request()->is('priorities*') ? ' active' : '' }}">
      <a href="{{ route('priorities.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Priorities">Priorities</div>
      </a>
    </li>

        <!-- statuses -->
        <li class="menu-item {{ request()->is('statuses*') ? ' active' : '' }}">
      <a href="{{ route('statuses.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Statuses">Statuses</div>
      </a>
    </li>

            <!--Canned Replies -->
            <li class="menu-item {{ request()->is('canned-replies*') ? ' active' : '' }}">
      <a href="{{ route('canned-replies.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Canned Replies">Canned Replies</div>
      </a>
    </li>

     <!--Roles-->
     <li class="menu-item {{ request()->is('roles*') ? ' active' : '' }}">
      <a href="{{ route('roles.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Roles">Roles</div>
      </a>
    </li>





  </ul>
</aside>
