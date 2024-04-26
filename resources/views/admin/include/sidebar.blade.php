 <!-- Sidebar -->
 <div class="sidebar" id="sidebar">
   <div class="sidebar-inner slimscroll">
     <div id="sidebar-menu" class="sidebar-menu">       
      {{-- <nav class="greedys sidebar-horizantal">
        <ul class="list-inline-item list-unstyled links">
          <li class="menu-title"> 
            <span>Main</span>
          </li>
          <li class="submenu">
            <a href="{{url('/')}}"><i class="la la-dashboard"></i> <span>Dashboard</span> </span></a>                 
          </li>
          <li class="submenu">
            <a href="{{url('user')}}" class="noti-dot"><i class="la la-user"></i> <span>  User </span></a>               
          </li>               
        </ul>
        <button class="viewmoremenu">More Menu</button>
          <ul class="hidden-links hidden">
            <li class="submenu">
              <a href="#">
                  <i class="la la-dropbox"></i>
                  <span> CMS </span> 
                  <span class="menu-arrow"></span>
              </a>
          <ul>
          <li>
            <a href="#"> Setting </a>
          </li>
        </ul>
          </li>  
        </ul>
      </nav> --}}
      @foreach ($verticalMenuData[0]->menu as $menu)
        @php
              if(is_array($menu->permission)){
                $permissions = implode("', '", $menu->permission);
                $permissionCondition = eval("return auth()->user()->hasAnyPermission('".$permissions."');");
              } else {
                $permissionCondition = eval("return auth()->user()->can('".$menu->permission."');");
              }
        @endphp
        @if($permissionCondition)
        <ul class="sidebar-vertical">
            <li class="submenu">
              <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}">
                <i class="{{ $menu->icon }}"></i>
                <span > {{ isset($menu->name) ? __($menu->name) : '' }}</span>
                @if(!isset($menu->url))
                    <span class="menu-arrow"></span>
                @endif
              </a>
              @isset($menu->submenu)
                @include('admin.include.submenu',['menu' => $menu->submenu])
              @endisset
            </li>
        </ul>
        @endif
      @endforeach
     </div>
   </div>
 </div>
 <!-- /sidebar-vertical->

{{-- sidebar menu   --}}


