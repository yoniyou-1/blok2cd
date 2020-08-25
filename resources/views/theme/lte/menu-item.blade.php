@if ($item["submenu"] == [])
    <li class="{{getMenuActivo($item['url'])}} nav-item ">
        <a href="{{url($item['url'])}} "  class="nav-link {{ request()->is($item['url']) ? 'active' : '' }}" >
          <i class="nav-icon fas {{$item['icon']}}"></i> 
          <p>{{$item["name"]}}</p>
        </a>
    </li>
@else
    <li class="nav-item has-treeview">
        <a href="javascript:;" class="nav-link">
          <i class="nav-icon fas {{$item['icon']}} "></i> 
          <p>
            {{$item["name"]}}
            <i class="right fas fa-angle-left"></i>
          </p>

        </a>
        <ul class="nav nav-treeview ">
            @foreach ($item["submenu"] as $submenu)
                @include("theme.$theme.menu-item", ["item" => $submenu])
            @endforeach
        </ul>
    </li>
@endif 
