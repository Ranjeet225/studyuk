<ul class="menu-sub ">
  @if (isset($menu))
    @foreach ($menu as $submenu)
        @if(isset($submenu->name))
          @if(auth()->user()->can($submenu->permission))
            <li class="menu-item ">
                <a href="{{ isset($submenu->url) ? url($submenu->url) : 'javascript:void(0)' }}"
                    class="{{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($submenu->target)
                    and !empty($submenu->target)) target="_blank" @endif >
                    @if (isset($submenu->icon))
                    <i class="{{ $submenu->icon }}"></i>
                    @endif
                        <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
                </a>
                {{-- submenu --}}
                @if (isset($submenu->submenu))
                  @include('layouts.sections.menu.submenu',['menu' => $submenu->submenu])
                @endif
            </li>
          @endif
        @else
            {{ '' }}
        @endif
    @endforeach
  @endif
</ul>
