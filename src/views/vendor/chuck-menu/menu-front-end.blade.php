@if(isset($menus))
<ul class="navbar-nav ml-auto">
    @foreach($menus as $m)
        @if($m->depth == 0)
            <li class="nav-item{{ $menus->where('depth', 1)->where('parent', $m->id)->count() > 0 ? ' dropdown' : '' }}">
                <a href="{{ \LaravelLocalization::localizeURL($m->link) }}" class="nav-link{{ $menus->where('depth', 1)->where('parent', $m->id)->count() > 0 ? ' dropdown-toggle' : '' }}" {{ $menus->where('depth', 1)->where('parent', $m->id)->count() > 0 ? 'data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"' : '' }}>
                    {{ $m->label }} {!! $menus->where('depth', 1)->where('parent', $m->id)->count() > 0 ? '<span class="caret"></span>' : '' !!}
                </a>
                @foreach($menus->where('depth', 1)->where('parent', $m->id) as $subm)
                    @if($loop->first)
                    <ul class="dropdown-menu">
                    @endif
                        <li class="{{ $menus->where('depth', 2)->where('parent', $subm->id)->count() > 0 ? 'dropdown dropdown-submenu' : '' }}">
                            <a href="{{ \LaravelLocalization::localizeURL($subm->link) }}" class="{{ $menus->where('depth', 2)->where('parent', $subm->id)->count() > 0 ? 'dropdown-toggle' : '' }}" {{ $menus->where('depth', 2)->where('parent', $subm->id)->count() > 0 ? 'data-toggle="dropdown"' : '' }}>{{ $subm->label }}</a>
                            @foreach($menus->where('depth', 2)->where('parent', $subm->id) as $subsubm)
                            @if($loop->first)
                            <ul class="dropdown-menu">
                            @endif
                                <li><a href="{{ \LaravelLocalization::localizeURL($subsubm->link) }}">{{ $subsubm->label }}</a></li>
                            @if($loop->last)
                            </ul>
                            @endif
                            @endforeach
                        </li>
                    @if($loop->last)
                    </ul>
                    @endif
                @endforeach
            </li>
        @endif
    @endforeach
</ul>
@endif