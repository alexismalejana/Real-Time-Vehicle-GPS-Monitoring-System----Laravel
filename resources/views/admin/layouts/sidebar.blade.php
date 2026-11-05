@php
  $getSetting = App\Models\Setting::getSetting();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
      @if(!empty($getSetting->logo))
          <img src="{{ asset('uploads/setting/'.$getSetting->logo) }}"
              alt=""
              class="brand-image img-circle elevation-3"
              style="opacity: .8">
      @endif
      @if(!empty($getSetting->app_name))
        <span class="brand-text font-weight-light text-md text-bold">{{ $getSetting->app_name }}</span>
        @else
        <span class="brand-text font-weight-light">Company Name</span>
      @endif
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(!empty(Auth::user()->image))
            <img src="{{ asset('uploads/users/myprofile/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
          @else
            <img src="{{ asset('asset/image/user-white.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }} <br>Role: {{ Auth::user()->role }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.users.list') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.vehicle.list') }}" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Vehicle
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.gpstracker.list') }}" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                GPS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.changepassword.changepassword') }}" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.myprofile.myprofile')  }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.setting.setting') }}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>

  </aside>