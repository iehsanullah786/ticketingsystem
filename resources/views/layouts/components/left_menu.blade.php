<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">

      <img src="{{ asset('img/avatars/logo.png') }}" style="width: 50px; height: auto;">

  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @role('admin')
        <li class="menu-item {{ request()->is('admin/dashboard*') ? ' active' : '' }}">
          <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-dashboard"></i>
            <div data-i18n="Dashboard">Dashboard</div>
          </a>
        </li>

        <!-- Admins -->
        <li class="menu-item {{ request()->is('admin/users*') ? ' active' : '' }}">
          <a href="{{ route('users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-user"></i>
            <div data-i18n="Users">Users</div>
          </a>
        </li>

        <!-- Priorities -->
        <li class="menu-item {{ request()->is('admin/priorities*') ? ' active' : '' }}">
          <a href="{{ route('priorities.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-alert-circle"></i>
            <div data-i18n="Priorities">Priorities</div>
          </a>
        </li>

        <!-- Statuses -->
        <li class="menu-item {{ request()->is('admin/statuses*') ? ' active' : '' }}">
          <a href="{{ route('statuses.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-tag"></i>
            <div data-i18n="Statuses">Statuses</div>
          </a>
        </li>

        <!-- Canned Replies -->
        {{-- <li class="menu-item {{ request()->is('admin/canned-replies*') ? ' active' : '' }}">
          <a href="{{ route('canned-replies.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-message-circle"></i>
            <div data-i18n="Canned Replies">Canned Replies</div>
          </a>
        </li> --}}

        <!-- Roles -->
        <li class="menu-item {{ request()->is('admin/roles*') ? ' active' : '' }}">
          <a href="{{ route('roles.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-user-circle"></i>
            <div data-i18n="Roles">Roles</div>
          </a>
        </li>

        <!-- Tickets -->
        <li class="menu-item {{ request()->is('admin/tickets*') ? ' active' : '' }}">
          <a href="{{ route('tickets.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-ticket"></i>
            <div data-i18n="Tickets">Tickets</div>
          </a>
        </li>
        @endrole

        @role('customer')
        <!-- Tickets -->
        <li class="menu-item {{ request()->is('customer/tickets*') ? ' active' : '' }}">
          <a href="{{ route('customer.ticket.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-ticket"></i>
            <div data-i18n="Tickets">Tickets</div>
          </a>
        </li>
        @endrole

        @role('agent')
        <!-- Tickets -->
        <li class="menu-item {{ request()->is('agent/tickets*') ? ' active' : '' }}">
          <a href="{{ route('agent.ticket.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-ticket"></i>
            <div data-i18n="Tickets">Tickets</div>
          </a>
        </li>
        @endrole
  </ul>
</aside>
