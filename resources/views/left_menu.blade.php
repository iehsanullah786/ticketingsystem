<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{route(name: "dashboard")}}" class="app-brand-link">
            <img src="{{asset('img/avatars/logo.png')}}"  style="width: 90px; height: auto;">

            </a>


          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            <li class="menu-item {{ request()->is('admins.index*') ? ' active' : '' }}">
            <a href="{{route(name: "admins.index")}}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Admins">Admins</div>
              </a>
              </li>

              <li class="menu-item {{ request()->is('dashboard*') ? ' active' : '' }}">
            <a href="{{route(name: "dashboard")}}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
              </li>

            <li class="menu-item {{ request()->is('employees*') ? ' active' : '' }}">
              <a href="{{route(name: "employees.index")}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Employees">Employees</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('adjustment-types*') ? ' active' : '' }}">
              <a href="{{route(name: "adjustment-types.index")}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Adjustment Types">Adjustment Types</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('payroll-periods') ? ' active' : '' }}">
              <a href="{{route(name: "payroll-periods.index")}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Payroll Periods">Payroll Periods</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('salary-slips') ? ' active' : '' }}">
              <a href="{{route(name: "salary-slips.index")}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Salary Slips">Salary Slips</div>
              </a>
            </li>



          </ul>
        </aside>
