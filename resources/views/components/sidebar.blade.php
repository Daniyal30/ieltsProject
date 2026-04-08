<nav class="sidebar__nav">
    <div class="nav-section-label">Main</div>
        @foreach ($sidebars as $sidebar)
        <a href="{{ url($sidebar->route_name) }}"
            class="nav-item {{ request()->is(ltrim($sidebar->route_name, '/')) ? 'active' : '' }}">

            <i class="nav-icon {{ $sidebar->icon }}"></i>
            <span class="nav-label">{{ ucfirst($sidebar->title) }}</span>
        </a>
        @endforeach
</nav>

<div class="sidebar__footer">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="signout-btn">
            <svg class="nav-icon" fill="none" stroke="rgba(255,100,100,.5)" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
            <span class="nav-label">Sign out</span>
        </button>
    </form>
</div>
