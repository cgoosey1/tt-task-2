<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <span class="fs-4">
            <img src="https://toucantech.com/uploads/default/customization/Hello_logo_final_(3).svg" height="50px">
        </span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link {{ Request::is('members/*') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Members
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item  {{ Request::routeIs('members.create') ? 'active' : '' }}" href="/members/create">
                    Create
                </a></li>
                <li><a class="dropdown-item  {{ Request::routeIs('members.csv') ? 'active' : '' }}" href="/members/csv">
                    CSV
                </a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link {{ Request::is('schools*') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Schools
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ Request::routeIs('schools.index') ? 'active' : '' }}" href="/schools/">
                    Schools
                </a></li>
                <li><a class="dropdown-item {{ Request::routeIs('schools.report') ? 'active' : '' }}" href="/schools/report">
                    School Members Report
                </a></li>
                <li><hr class="dropdown-divider"></li>
                @foreach (\App\Models\School::all() as $schoolMenu)
                    <li>
                        @if (Request::routeIs('schools.show') && isset($school) && $school->id == $schoolMenu->id)
                            <a class="dropdown-item active" href="/schools/{{ $schoolMenu->id }}">
                        @else
                            <a class="dropdown-item" href="/schools/{{ $schoolMenu->id }}">
                        @endif
                        {{ $schoolMenu->name }}
                    </a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</header>


