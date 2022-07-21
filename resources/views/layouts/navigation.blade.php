@php
    $departments = \App\Models\Department::all();
@endphp

<nav class="ccc-nav">
    <ul>
        <li><a href="#">Control Panel<i class="fa-solid fa-chevron-down"></i></a>
            <ul>
                <li class="short"><a href="/departments">Departments</a></li><br>
                <li class="short"><a href="/programs">Programs</a></li><br>
                <li class="short"><a href="/areas">Areas</a></li><br>
                <li class="short"><a href="/templates/1/compliance">Templates</a></li><br>
            </ul>
        </li>
        <li><a href="#">Area<i class="fa-solid fa-chevron-down"></i></a>
            <ul>
                @foreach ($departments as $department)
                    <li><a href="/department/{{$department->shortname}}">{{$department->longname}}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="#">User Setting</a></li>
        <li><a href="{{ url('/account-settings') }}">Account Setting<i class="fa-solid fa-chevron-down"></i></a>
            <ul>
                <li class="short">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
